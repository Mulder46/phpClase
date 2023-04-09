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
    
//o array multidimensional, o una variable para cada stat
    $vida[$i][0]=$url["stats"][0]["base_stat"];
    $ataqueArray[$i]=$url["stats"][1]["base_stat"];
    $defensaArray[$i]=$url["stats"][2]["base_stat"];
    $aEspecialArray[$i]=$url["stats"][3]["base_stat"];
    $dEspecialArray[$i]=$url["stats"][4]["base_stat"];
    $velocidadArray[$i]=$url["stats"][5]["base_stat"];
    $atrasArray[$i]=$url["sprites"]["back_default"];
    $alanteArray[$i]=$url["sprites"]["front_shiny"];
    $tipo1Array[$i]=$url["types"][0]["type"]["name"];
   // $tipo2Array[$i]=$url["types"][1]["type"]["name"];

 
    $dimensiones[$i][0]=$peso=$url["weight"];
    $dimensiones[$i][1]=$altura=$url["height"];
    $habilidades=$url["abilities"]; //de ello cojo el array de habilidades habilidad
    $ataques=$url["moves"]; //todo el array de ataques

    $pokemon[$i][0]=$todoPokemon[$i]["name"]; //en la posición 0 guardo el nombre del pokemon
    //guardar habilidades
        for($j=1;$j<=count($habilidades);$j++){ //a cada pokemon le meto sus habilidades en otra dimensión del array   J=1 para que no machaque el 0 que es el nombre
            $pokemon[$i][$j]=$habilidades[$j-1]["ability"]["name"];  //el j-1 para no perder primera habilidad
        }
        //guardar ataques
        for($j=0;$j<count($ataques);$j++){  
            //atack 0 = Nombre del ataque 1 potencia 2 los pp 3 probabilidad 4 tipo 5 nivel de aprender
            $url=$ataques[$j]["move"]["url"];  //la url para ver el daño que hace 
            $atack[$i][$j][5] = $ataques[$j]["version_group_details"][0]['level_learned_at'];  //a que nivel lo aprende?

            $pokemon_json = file_get_contents($url);
            $decoded_json = json_decode($pokemon_json, true); //true array asociado, false clase
  
            $atack[$i][$j][3] = $decoded_json['accuracy']; //probabiliad de golpear
            $atack[$i][$j][2] = $decoded_json['pp']; //los pp son la cantidad de veces que puede hacer ese ataque
            $atack[$i][$j][1] = $decoded_json['power'];  //en el hueco 2 meto la potencia de ataque i=pokemon j=ataque? 0=nombre 1=daño
            $atack[$i][$j][0] = $decoded_json['name']; //primero en inglés por si falla alguna del español
            $atack[$i][$j][0] = $decoded_json['names'][5]["name"]; //nombre de ataque en español (5)

            $atack[$i][$j][4] = $decoded_json['type']["url"]; //el tipo, cojo la url para tenerlo en español
            $pokemon_json = file_get_contents($atack[$i][$j][4]);
            $decoded_json = json_decode($pokemon_json, true); //true array asociado, false clase
            $atack[$i][$j][4] = $decoded_json['names'][5]['name']; //tenemos el tipo en español (5)
        }
}


// conexión
include "conexion.php";
// $hostname = "localhost:3306";
// $user = "root";
// $password = "";
// $db = "pokemon";
// $connection = mysqli_connect($hostname , $user , $password); 
// mysqli_select_db ($connection, $db);


//inserción en la BD 
 
for($i=0;$i<count($todoPokemon);$i++){
    $poke=$pokemon[$i][0]; //problemas al ponerlo directamente en el insert....pues pa'aca
    $altura=$dimensiones[$i][0];
    $peso=$dimensiones[$i][1];
    $vidaPok=$vida[$i][0];

    $ataque=$ataqueArray[$i];
    $defensa=$defensaArray[$i];
    $aEspecial=$aEspecialArray[$i];
    $dEspecial=$dEspecialArray[$i];
    $velocidad=$velocidadArray[$i];
    $atras=$atrasArray[$i];
    $alante=$alanteArray[$i];
    $tipo1=$tipo1Array[$i];
    //$tipo2=$tipo2Array[$i];
    $tipo2="prueba";

    mysqli_query($connection, "INSERT INTO pokemon (nombre,altura,peso,vida,atras,alante,ataque,defensa,aEspecial,dEspecial,velocidad,tipo1,tipo2) 
                                VALUES ('$poke',$altura,$peso,$vidaPok,'$atras','$alante',$ataque,$defensa,$aEspecial,$dEspecial,$velocidad,'$tipo1','$tipo2');");

 for($j=0;$j<count($atack);$j++){ //a cada pokemon le meto sus habilidades en otra dimensión del array       
        
        $golpe=$atack[$i][$j][0]; //el nombre problemas en 5¿?
        if($ataque=$atack[$i][$j][1]){//por si el ataque es 0
            $ataque=$atack[$i][$j][1]; //en el 5?
        }else{
                $ataque=0;
            } 
        //echo "Es ataque ".$ataque;
        $pp=$atack[$i][$j][2]; //los pp de ese ataque
        if($probable=$atack[$i][$j][3]){
            $probable=$atack[$i][$j][3]; //lA PROBABILIDAD de ese ataque!!!!!!
        }else{
                $probable=0;
            }
        
        //echo "Es probable ".$probable;
        $tipoAtaque=$atack[$i][$j][4]; //pues el tipo
        $nivelNecesario=$atack[$i][$j][5];
        $fk=$i+1; //pues na, daba problemas poner +1 en el insert
        echo "<br>"."INSERT INTO ataques (ataque,fk_pokemon,fuerza,pp,probabilidad,tipo) 
        values ('$golpe',$fk,'$ataque',$pp,$probable,'$tipoAtaque');";

    //    mysqli_query($connection, "INSERT INTO habilidades (nombre,fk_pokemon) values ('$habil',$i+1);");
        mysqli_query($connection, "INSERT INTO ataques (ataque,fk_pokemon,fuerza,pp,probabilidad,tipo,nivelNecesario) 
                    values ('$golpe',$fk,'$ataque',$pp,$probable,'$tipoAtaque',$nivelNecesario);");
    }
}

$tiempo_final = microtime(true);
$tiempo = $tiempo_final - $tiempo_inicial; //este resultado estará en segundos
echo "El tiempo de ejecución del archivo ha sido de " . $tiempo . " segundos";


mysqli_close($connection);
?>