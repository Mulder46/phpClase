<?php
//Ejercicio1 LEER EL PAIS DE LOCALIDAD 8
$people_json = file_get_contents('people.json'); //cargo el people
$decoded_json = json_decode($people_json, true); //true array asociativo false objeto clase std
   
$localidad = $decoded_json['localidad_8']; //guardo el diccionario localidad 8
echo $localidad['País'];


//ejercicio2 AGREGAR
$nuevo=array("Continente"=> "Oceanía","País"=> "Libertalia","Capital"=>"Tierra"); //creo un nuevo campo
//$decoded_json .=[$nuevo];
var_dump($decoded_json);
json_encode($nuevo); //lo guardo en el json
//var_dump($people_json);

//EJERCICIO 3 MODIFICAR LOCALIDAD 4
$localidad = $decoded_json['localidad_4'];
//var_dump($decoded_json);
var_dump($localidad);
//$localidad.=("Habitantes"=>12);
$localidad_9 = array("localidad_9"=>[ 
    "Continente"=>"África",
    "País"=> "Angola",
    "Capital"=> "Luanda"]
);
?>