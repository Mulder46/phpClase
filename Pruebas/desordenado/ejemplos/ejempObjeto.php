<?php
/*
// Atributos protegidos - sólo se puede acceder desde la clase
class Persona2  {
    //Atributos de una clase 
    protected $nombre;
    protected $apellido;

    //Constructor
    public function __construct($nombre,$apellido,){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    // getters - Nombre por convconvención: get + nombre del atributo. 
    public function getNombre(){
        return $this->nombre;

    }

    public function getApellido(){
        return $this->apellido;
    }
    //setters - Nombre por convconvención: set + nombre del 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

}

$persona2 = new Persona2("Elena","Mederos");
echo $persona2->getNombre();
echo " ";
echo $persona2->getApellido();
echo "<br>";
$persona2->setNombre("Ana");
$persona2->setApellido("Martín");
echo $persona2->getNombre();
echo " ";
echo $persona2->getApellido();


?>