<?php
/*
class Persona {
    public $nombre = "";
    public $apellido = "";
    public $fechaNacimiento = "";
}
$usuario = new Persona();
$usuario->nombre = "Brat";
$usuario->apellido = "Pit";
json_encode($usuario);
// Devuelve: {"nombre": "Brat", "apellido": "Pit"}
$usuario->fechaNacimiento = new DateTime();
json_encode($usuario);
var_dump(json_encode($usuario));

$people_info = [
    "customers" => [
        ["name" => "Andrew", "score" => 62.5],
        ["name" => "Adam", "score" => 65.0],
        ["name" => "Sajal", "score" => 72.2],
        ["name" => "Monty", "score" => 57.8]
    ]
];
echo json_encode($people_info);
*/
$string = '{"nombre": "Leonardo", "apellido": "DiCaprio"}';
$resultadoF = json_decode($string,false);
$resultadoT = json_decode($string,true);
var_dump($resultadoF);
echo '<br>';
var_dump($resultadoT);
?>