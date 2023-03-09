<?php

/*Crea una clase Persona con los siguientes atributos: nombre, apellidos y edad.
-Crea su constructor y get y set.
-Crear las siguientes funciones: – mayorEdad: indica si es o no mayor de edad. 
– nombreCompleto: devuelve el nombre mas apellidos
*/
echo "<br>";
class Persona {
    public $nombre;
    public $apellido;
    public $edad;
    //Constructor
    public function __construct($nombre,$apellido,$edad){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->edad=$edad;
    }
//getters
    public function getNombre(){
        return $this->nombre;

    }

    public function getApellido(){
        return $this->apellido;

    }

    public function getEdad(){
        return $this->edad;

    }
//setters
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }
    public function mayorEdad(){
        if($this->edad>=18){
            return "SI es mayor";
        }else{
            return "No es mayor";
        }
    }
    public function nombreCompleto(){
        return $this->nombre . $this->apellido;
    }

}
$persona=new Persona("David","León",10);
//$persona->setNombre("Divad");
echo $persona->getNombre();
echo "<br>";
echo $persona->nombreCompleto();
echo "<br>";
echo $persona->mayorEdad();

/*
Realiza con POO un programa que permita pintar en un alert 
(la salida en el alert se debe ejecutar al pinchar en un botón en el HTML)
 lo siguiente:
 Dimensión 1: 4
Dimensión 2: 10

    ++++
   ++++++
  ++++++++
 ++++++++++
  ++++++++
   ++++++
    ++++
*/
echo "<br>";

/*
Crea una clase llamada Cuenta que tendrá los siguientes atributos: titular y 
cantidad (puede tener decimales). Crea sus métodos get, set para cada atributo y
 los siguiente métodos:
ingresar: se ingresa una cantidad a la cuenta. Si la cantidad introducida 
es negativa, no se hará nada.
retirar: se retira una cantidad a la cuenta. Si restando la cantidad 
actual a la que nos pasan es negativa, la cantidad de la cuenta pasa a ser 0.
*/
echo "<br>";

/*
Crea una clase llamada Password que siga las siguientes condiciones:
Que tenga los atributos longitud y contraseña . Por defecto, la longitud sera de 8.
Los métodos que implementa serán:
esFuerte(): devuelve un booleano si es fuerte o no, para que sea fuerte debe 
tener mas de 2 mayúsculas, mas de 1 minúscula y mas de 5 números.
generarPassword(): genera la contraseña del objeto con la longitud que tenga.
Método get para contraseña y longitud.
Método set para longitud.
*/
echo "<br>";


?>