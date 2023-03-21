<?php
/*
class Persona
{
    public $nombre = "Virginia";
    public $apellido ="García";
    public function mensaje(){
        print "Hola " . $this->nombre;
    }
}
class Alumno extends Persona {
    public $curso = "PHP y Laravel";
}

$alumno = new Alumno();
var_dump($alumno);
*/
class Persona
{
    public $nombre = "Virginia";
    public $apellido ="García";
    public function mensaje(){
        print "Hola " . $this->nombre;
    }
}
class Alumno extends Persona {
    public $curso = "PHP y Laravel";
    public function mensaje(){
        print "Estas matriculado " . $this->nombre;
    }
}
$persona= new Persona();
$alumno= new Alumno();
$persona->mensaje();
$alumno->mensaje();
?>