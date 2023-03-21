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
 class Cuenta{
    public $titular;
    public $cantidad;

    /**
     * Get the value of titular
     */ 
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set the value of titular
     *
     * @return  self
     */ 
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
    public function ingresar($cantidad){
        if($cantidad>0){
            $this->setCantidad($this->cantidad+$cantidad);
            echo "<br>Has ingresado:";
            echo $cantidad;
            echo "<br>";
        }
    }
    public function retirar($cantidad){
        $this->setCantidad($this->cantidad-$cantidad);
        echo "<br>Has retirado:";
            echo $cantidad;
            echo "<br>";
        if($this->getCantidad()<0){
            $this->setCantidad(0);
        }
        
    }
    public function __construct($nombre,$cantidad){
        $this->setCantidad($cantidad);
        $this->setTitular($nombre);
}
 }
$cuenta=new Cuenta("David",2000);
echo "Tienes: ";
echo $cuenta->getCantidad();
echo "<br>";
 $cuenta->ingresar(1300);
echo "y ahora tienes: ";
echo $cuenta->getCantidad();
echo "<br>";
$cuenta->retirar(300);
echo "y ahora tienes: ";
echo $cuenta->getCantidad();
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
class Password{
    public $longitud;
    public $contrasenha;
    public function esFuerte(){ //devuelve un booleano si es fuerte o no, para que sea fuerte debe  tener mas de 2 mayúsculas, mas de 1 minúscula y mas de 5 números.
             $mayus=0;
             $minus=0;
             $nums=0;
            for($i=0;i<$this->getLongitud();$i++){
               // if($this->contrasenha[i]<)
            }
    }
    public function generarPassword(){ //genera la contraseña del objeto con la longitud que tenga. 
        $caracter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        for($i=0;$i<$this->getLongitud();$i++){
            
            $this->contrasenha.= $caracter[rand(0, 61)]; //random de posición desde el 0 al 61 que son los 62 que tengo guardados
        }
    }
    public function __construct($pass,$longitud=8){
        $this->longitud=$longitud;
        $this->contrasenha=$pass;
    }

    /**
     * Get the value of longitud
     */ 
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Get the value of contraenha
     */ 
    public function getContrasenha()
    {
        return $this->contrasenha;
    }

    /**
     * Set the value of longitud
     *
     * @return  self
     */ 
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }
}
$usuario = new Password("todo",5);
echo $usuario->getContrasenha();
echo "<br>";
echo $usuario->getLongitud();
$usuario->generarPassword();
echo $usuario->contrasenha;
?>