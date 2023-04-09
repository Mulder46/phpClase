<?php
include "conexion.php";

/*
Cosas a tener en cuenta para futuro
-OK ataque vs denfensa
-nivel del pokemon para darle un ataque u otro y aumentar el ataque
-tipo fuerte contra otro
-probabilidad de daño
-tener en cuenta los pp
-efectos veneno (añadir a BD)
-probabilidad de crítico (añadir a BD)
-tipos de ataque
- usuarios con contraseña
-a que pokemon has ganado
-cazar pokemons
*/
//FUNCIONES

function elegir(&$nivelUsuario,$usuario,$connection){ //con el id que haya elegido el usuario buscamos sus cosas en la BD
    $mochila=mysqli_query($connection, "SELECT * FROM mochila WHERE fk_usuario=$usuario;"); //buscamos todos los pkmn que tiene este tío
    $result_type=MYSQLI_ASSOC;  //asociastivo. MYSQLI_NUM: solo numerico , o MYSQLI_BOTH: mezcla de los dos.
    $mochila=mysqli_fetch_all($mochila, $result_type);
    //mostramos todos par que elija
    $id=$mochila[0]['fk_pokemon']; //donde tenemos el 0 podríamos el que haya elegido
    $pokeUsSQL=mysqli_query($connection, "SELECT id,nombre,vida,atras,ataque,defensa FROM pokemon WHERE id=$id;");
    $nivelUsuario=$mochila[0]['nivel'];
    
    return mysqli_fetch_all($pokeUsSQL, $result_type);

}

function pokeIA(&$nivelIA,&$idIA,$connection){
    $idIA=rand(1,15); //sorteo de pokemon, desde 1 hasta....los que tengamos
    $result_type=MYSQLI_ASSOC; 
    $pokeIA=mysqli_query($connection, "SELECT nombre, vida,alante,ataque,defensa FROM pokemon WHERE id=$idIA;");
    $nivelIA=rand(1,20);
    return mysqli_fetch_all($pokeIA, $result_type);
}

function asignaAtaque($connection,$pokemon){ //sacamos todos los ataques que tiene ese pokemon
    $result_type=MYSQLI_ASSOC; 
    $poke=mysqli_query($connection, "SELECT ataque,fuerza FROM ataques WHERE fk_pokemon=$pokemon;");
    
    //entre todos los ataques que tiene, devuelvo un array con 4 (dependerá en un futuro del nivel ok)
    return mysqli_fetch_all($poke, $result_type);
}

function eligeAtaque($pokeUsuario){ //pedir el ataque, aquí debe parar el programa hasta que el usuario elija
    echo "Elige ataque: <br>";
    for($i=0;$i<count($pokeUsuario);$i++){
        echo $pokeUsuario[$i]["ataque"]." ".$pokeUsuario[$i]["fuerza"]."<br>";
    }
    $max=count($pokeUsuario)-1;
    $ataque=rand(0,$max); 

    return $pokeUsuario[$ataque]; //devuelvo un array con el nombre de ataque y su daño
}

function ataqueIA($pokeIA){
     $ataque=rand(0,count($pokeIA)-1);//elegir un ataque al azar del array de ataques
    return $pokeIA[$ataque]; //el array de ataque-daño
}

function calculaFuerza($pokemon1,$pokemon2,$ataque,$nivel){
    //ataque * (potencia(tipo *1,5) /100)  -defensaRival/10
    //La Fórmula de Daño. Daño (PS) = {([{(2 * Nv. / 5 + 2) * Ataque * Poder / Defensa} / 50] * 1°Mod. + 2) * STAB * Efec.
    //var_dump($pokemon2);
    //E = Efectividad. Puede tomar los valores de 0, 0.25, 0.5, 1, 2 y 4.
    $efectividad=1;
    $Bonificacion=1; //º,5 si es del mismo tipo, los tipos ya analizaremos en la versión 2.0
    $nivelAtaque=$nivel;
    $ataque=$pokemon1[0]["ataque"];
    $poder=$ataque;
    $varianza=rand(85,100);
    $defensa=$pokemon2[0]["defensa"];
    return round(0.01*$Bonificacion*$efectividad*$varianza*((((0.2*$nivelAtaque+1)*$ataque*$poder)/(25*$defensa))+2));
   
     
}

/*
***************
********EMPIEZA EL JUEGO
***************
*/
//RECOGIDA DE DATOS
//$eleccion=$_GET['pokemon']; //la elección del usuario pasando el id
$usuario=$_POST['usuario']; //recibe el usuario que se loguea
$usuarioID=$_POST['id'];

//SITUACIÓN INICIAL
$idIA=0; //la paso por referencia y así anoto el id que le toca
$nivelIA=0; //empiezo nivel 0 y le asigno otro a la hora de crear el pkmn
$nivelUsuario=0; //empiezo nivel 0 y le asigno otro a la hora de crear el pkmn

$pokeUsuario=elegir($nivelUsuario,$usuarioID,$connection); //llamamos para ver que pkmn tenemos en la mochila
$eleccion=$pokeUsuario[0]['id']; //recogemos la id del pokemon elegido
$pokeIA = pokeIA($nivelIA,$idIA,$connection);
//asignar ataques
$ataqueUsuario=asignaAtaque($connection,$eleccion);
$ataqueIA=asignaAtaque($connection,$idIA+1);

//mostramos la situación inicial
echo "<img src=".$pokeUsuario[0]['atras'].">";
echo 'Tu pokemon es '.$pokeUsuario[0]["nombre"]." y tiene ".$pokeUsuario[0]["vida"]." puntos de vida." ;
echo "<br><br>";
echo "<img src=".$pokeIA[0]['alante'].">";
echo 'Mi pokemon es '.$pokeIA[0]["nombre"]." y tiene ".$pokeIA[0]["vida"]." puntos de vida." ;
echo "<br><br>";


while($pokeUsuario[0]["vida"]>0 && $pokeIA[0]["vida"]>0){ //mientras los dos estén vivos se piden ataques
    //sleep(1);
    $ataque=eligeAtaque($ataqueUsuario); //según el ataque que pida el usuario hace un daño
    $daño=calculaFuerza($pokeUsuario,$pokeIA,$ataque,$nivelUsuario);
    $pokeIA[0]["vida"]-=$daño; //le quitamos a la vida la fórmula
    
    echo "has hecho ".$daño." de daño con ".$ataque['ataque']." y le queda ".$pokeIA[0]['vida']."<br>"; //se dice que ataque usaste, el daño que hizo y lo que le queda
    if($pokeIA[0]["vida"]>0){ //evitar el caso de que un muerto siga antacando
        $ataque=ataqueIA($ataqueIA);
        $daño=calculaFuerza($pokeIA,$pokeUsuario,$ataque,$nivelIA);
        $pokeUsuario[0]["vida"]-=$daño;
        echo "Te hecho ".$daño." de daño con ".$ataque['ataque']." y te queda ".$pokeUsuario[0]["vida"]."<br>";
    }
}


//fin del juego, se informa del ganador
if($pokeUsuario[0]["vida"]>0){
    echo "Has ganado tú! CAMPEÓN";
    mysqli_query($connection, "INSERT INTO vencidos (fk_pokemon,fk_usuario,fecha VALUES ($idIA,$usuarioID,date());");
}else{
    echo "Te han ganado....buuuuh";
}


mysqli_close($connection);
?>