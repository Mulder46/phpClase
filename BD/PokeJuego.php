<?php
// conexión
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "pokemon";
$connection = mysqli_connect($hostname , $user , $password); 
mysqli_select_db ($connection, $db);
/*
Cosas a tener en cuenta para futuro
- ataque vs denfensa
-nivel del pokemon para darle un ataque u otro y aumentar el ataque
-tipo fuerte contra otro
*/
//FUNCIONES

function elegir($id,$connection){
    $pokeUsSQL=mysqli_query($connection, "SELECT nombre, vida FROM pokemon WHERE id=$id;");
    $result_type=MYSQLI_ASSOC;  //asociastivo. MYSQLI_NUM: solo numerico , o MYSQLI_BOTH: mezcla de los dos.
    return mysqli_fetch_all($pokeUsSQL, $result_type);

}
function pokeIA($connection){
    $idIA=rand(1,151);
    $result_type=MYSQLI_ASSOC; 
    $pokeIA=mysqli_query($connection, "SELECT nombre, vida FROM pokemon WHERE id=$idIA;");
    return mysqli_fetch_all($pokeIA, $result_type);
}
function eligeAtaque($pokeUsuario){
    $daño=0;
    echo "Elige un ataque:";
    //hago el daño sabíendolo en el array dle pokemon y ataque elegido
    return $daño;
}
function ataqueIA($pokeIA){
    $daño=0;
    //un ataque random según los ataques del pokemon
    return $daño;
}
function asignaAtaque($pokemon){
    //entre todos los ataques que tiene, devuelvo un array con 4 (dependerá en un futuro del nivel ok)
    return $ataques;
}
/*
***************
********EMPIEZA EL JUEGO
***************
*/

$eleccion=5; //esto se recogerá con un formulario
//elección de pokemons
$pokeUsuario=elegir($eleccion,$connection);
$pokeIA = pokeIA($connection);
//asignar ataques
$ataqueUsuario=asignaAtaque($pokeUsuario);
$ataqueIA=asignaAtaque($pokeIA);
//var_dump($pokeIA);
echo 'Tu pokemon es '.$pokeUsuario[0]["nombre"]." y tiene ".$pokeUsuario[0]["vida"]." puntos de vida." ;
echo "<br>";
echo 'Mi pokemon es '.$pokeIA[0]["nombre"]." y tiene ".$pokeIA[0]["vida"]." puntos de vida." ;
echo "<br>";
while($pokeUsuario[0]["vida"]>0 && $pokeIA[0]["vida"]>0){ //mientras los dos estén vivos se piden ataques
    $daño=eligeAtaque($pokeUsuario);
    $pokeIA[0]["vida"]-=$daño;
    echo "has hecho $daño de daño y le queda".$pokeIA[0]['vida']."<br>";
    $daño=ataqueIA($pokeIA);
    $pokeUsuario[0]["vida"]-=$daño;
    echo "Te a hecho $daño de daño y te queda".$pokeUsuario[0]["vida"]."<br>";

}





mysqli_close($connection);
?>