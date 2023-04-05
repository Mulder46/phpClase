<?php
$tiempo_inicial = microtime(true);


$pokemon_json = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=151');
$decoded_json = json_decode($pokemon_json, true); //true array asociado, false clase
$todoPokemon = $decoded_json['results'];

//primero lo guardo en un array, no hace falta pero así practico 
for($i=0;$i<count($todoPokemon);$i++){ //guardo en pokemon el nombre altura peso y su array de habilidades 
    $url=$todoPokemon[$i]["url"]; //cada pkmn con su url
    $url=json_decode(file_get_contents($url), true); //saco el contenido del api de esa URL
    $peso=$url["weight"];  //guardo el peso y altura
    $altura=$url["height"];
    $habilidades=$url["abilities"]; //de ello cojo el array de habilidades habilidad 
    $pokemon[$i][0]=$todoPokemon[$i]["name"]; //en la posición 0 guardo el nombre del pokemon
        for($j=1;$j<=count($habilidades);$j++){ //a cada pokemon le meto sus habilidades en otra dimensión del array   J=1 para que no machaque el 0 que es el nombre
            $pokemon[$i][$j]=$habilidades[$j-1]["ability"]["name"];  //el j-1 para no perder primera habilidad
            $dimensiones[$i][0]=$peso=$url["weight"];
            $dimensiones[$i][1]=$altura=$url["height"];

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
   // mysqli_query($connection, "INSERT INTO pokemon (nombre,altura,peso) values ('$poke',$altura,$peso);");
    for($j=1;$j<=count($habilidades);$j++){ //a cada pokemon le meto sus habilidades en otra dimensión del array   J=1 para que no machaque el 0 que es el nombre
        $habil=$pokemon[$i][$j];
       // mysqli_query($connection, "INSERT INTO habilidades (nombre,fk_pokemon) values ('$habil',$i+1);");
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
$pokeUsuario=mysqli_query($connection, "SELECT nombre, altura FROM pokemon WHERE id=$eleccion;");
var_dump($pokeUsuario);
//con un random elegimos uno



mysqli_close($connection);
?>