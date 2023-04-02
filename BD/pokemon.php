<?php
$tiempo_inicial = microtime(true);


$pokemon_json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=15');
$decoded_json = json_decode($pokemon_json, true); //true array asociado, false clase
$todoPokemon = $decoded_json['results'];

//primero lo guardo en un array, no hace falta pero así practico 
for($i=0;$i<count($todoPokemon);$i++){ //guardo en pokemon el nombre altura peso y su array de habilidades 
    $url=$todoPokemon[$i]["url"]; //cada pkmn con su url
    $url=json_decode(file_get_contents($url), true); //saco el contenido del api de esa URL
    $peso=$url["weight"];  //guardo el peso y altura
    $altura=$url["height"];
    $vida[$i][0]=$url["stats"][0]["base_stat"];
 
    $dimensiones[$i][0]=$peso=$url["weight"];
    $dimensiones[$i][1]=$altura=$url["height"];
    $habilidades=$url["abilities"]; //de ello cojo el array de habilidades habilidad
    $ataques=$url["moves"]; //todo el array de ataques

    // var_dump($ataques);
    //echo "-- <br>";
    $pokemon[$i][0]=$todoPokemon[$i]["name"]; //en la posición 0 guardo el nombre del pokemon
    //guardar habilidades
        for($j=1;$j<=count($habilidades);$j++){ //a cada pokemon le meto sus habilidades en otra dimensión del array   J=1 para que no machaque el 0 que es el nombre
            $pokemon[$i][$j]=$habilidades[$j-1]["ability"]["name"];  //el j-1 para no perder primera habilidad
        }
        //guardar ataques
        for($j=0;$j<count($ataques);$j++){ //   
            $atack[$i][$j][0]=$ataques[$j]["move"]["name"];  //el nomre del ataque
            $atack[$i][$j][1]=$ataques[$j]["move"]["url"];  //la url para ver el daño que hace 
           // var_dump ($atack);
            /*$atack
            array(1) { 
                    [0]=> array(1) { 
                        [0]=> array(2) {
                             [0]=> string(10) "razor-wind" 
                             [1]=> string(34) "https://pokeapi.co/api/v2/move/13/" 
                        } 
                    } 
                } --
             */
            $url=$atack[$i][$j][1];
            echo $url;
            $pokemon_json = file_get_contents($url);
            $decoded_json = json_decode($pokemon_json, true); //true array asociado, false clase
            $atack[$i][$j][2] = $decoded_json['power'];  //en el hueco 2 meto la potencia de ataque
            //var_dump($ataque);
           //var_dump($atack[$i][$j][0]);
            echo "-- <br>";
        }
}
// conexión
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "pokemon";
$connection = mysqli_connect($hostname , $user , $password); 
mysqli_select_db ($connection, $db);
//inserción en la BD 
for($i=0;$i<count($todoPokemon);$i++){
    $poke=$pokemon[$i][0]; //problemas al ponerlo directamente en el insert....pues pa'aca
    $altura=$dimensiones[$i][0];
    $peso=$dimensiones[$i][1];
    $vidaPok=$vida[$i][0];
    mysqli_query($connection, "INSERT INTO pokemon (nombre,altura,peso,vida) values ('$poke',$altura,$peso,$vidaPok);");
    for($j=1;$j<=count($habilidades);$j++){ //a cada pokemon le meto sus habilidades en otra dimensión del array   J=1 para que no machaque el 0 que es el nombre
        $habil=$pokemon[$i][$j];
        $golpe=$atack[$i][$j][0]; //el nombre
        $ataque=$atack[$i][$j][2]; //su potencia
        mysqli_query($connection, "INSERT INTO habilidades (nombre,fk_pokemon) values ('$habil',$i+1);");
        mysqli_query($connection, "INSERT INTO ataques (ataque,fk_pokemon,fuerza) values ('$golpe',$i+1,'$ataque');");
    }
}

$tiempo_final = microtime(true);
$tiempo = $tiempo_final - $tiempo_inicial; //este resultado estará en segundos
echo "El tiempo de ejecución del archivo ha sido de " . $tiempo . " segundos";


/*
***************
********EMPIEZA EL JUEGO
***************
*/$eleccion=5; //esto se recogerá con un formulario
// Pide el pokemon en un formulario
$pokeUsSQL=mysqli_query($connection, "SELECT nombre, altura FROM pokemon WHERE id=$eleccion;");
$result_type=MYSQLI_ASSOC;  //asociastivo. MYSQLI_NUM: solo numerico , o MYSQLI_BOTH: mezcla de los dos.
$pokeUsuario = mysqli_fetch_all($pokeUsSQL, $result_type);
var_dump($pokeUsuario);
//con un random elegimos uno



mysqli_close($connection);
?>