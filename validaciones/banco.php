

<?php

class Usuario {
    protected $nombre="error";
    protected $apellido="error";
    protected $direccion="error";
    protected $email="error";
    protected $confirmacion="error";
    protected $dni="error";
    protected $contrasena="error";
    
public function empiezaMayus($palabra){
    $ok=0;
    if(ord($palabra[0])>=65 && ord($palabra[0])<=90 ){//empieza mayúsc ula
        //echo "a";
        if(self::todoLetras($palabra)){
        //    echo "entro";
            $ok=1;
        }
    }
    return $ok;
}

public function todoLetras($palabra){
    $error=0;
    $cont=0;
    
    while(!$error && $cont<strlen($palabra)){    
        if(!(ord($palabra[0])>=65 && ord($palabra[0])<=90 || ord($palabra[0])>=97 && ord($palabra[0])<=122) ){
            echo "ERROR: ".$palabra;
            $error=1;
        }
        $cont++;
    }
    //echo $error;
    return !$error;
}
public function todoNumero($cadena){
    $error=0;
    $i=0;
    while(!$error && $i<strlen($cadena)){
        if(ord($cadena[$i])>=48 && ord($cadena[$i])<=57){
            $i++;
            
        }else{
            $error=1;
           echo  "Error en DNI";
        }
    }
    return !$error;
}
public function contMayus($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena);$i++){
        if(ord($cadena[$i])>=65 && ord($cadena[$i])<=90 ){
            $cont++;
        }
    }
    return $cont;
}
public function contMinus($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena);$i++){
        
       if(ord($cadena[$i])>=97 && ord($cadena[$i])<=122){
        
            $cont++;
       }
    }
    

    return $cont;
}
public function contNum($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena)-1;$i++){
        if(ord($cadena[$i])>=48 && ord($cadena[$i])<=57){
            $cont++;
        }
    }
    
    return $cont;
}
public function contSig($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena);$i++){
        if(ord($cadena[$i])>=33 && ord($cadena[$i])<=47){
            $cont++;
       }
    }
    return $cont;
}
public function dnieOk($dni){
    $ok=0;
    if(strlen($dni)==9){
        if(self::todoLetras($dni[8])){
            $nums=substr($dni, 0, -1);
            if(self::todoNumero($nums)){
                $ok=1;
                
            }
        }
    }
    return $ok;
}
public function separarPalabras($palabra){
    $caracteres = preg_split('/,/', $palabra);
    return $caracteres;

}
public function calleBien($calle){
    $ok=0;
    $arrayCalle=self::separarPalabras($calle);
    //dirección (con CP): el formato es tipo vía/nombre vía, número, resto de datos, código postal, población y país (se parados por comas).
    if(count($arrayCalle)==6){      
        if(self::todoLetras($arrayCalle[0])){//calle con letras?
            if(self::todoNumero($arrayCalle[1])){//numero?
                if(self::todoLetras($arrayCalle[2])){
                    if(strlen($arrayCalle[3])==5 && self::todoNumero($arrayCalle[3])){ //pensando en cp español
                        if(self::todoLetras($arrayCalle[4]) && self::empiezaMayus($arrayCalle[4])){ //poalbacion
                            if(self::todoLetras($arrayCalle[5]) && self::empiezaMayus($arrayCalle[5])){//Pais
                                $ok=1;
                            }
                        }

                    }
                }
            
            }
        }
        return $ok;
    }

}


public function __construct($nombre="error",$apellido="error",$direccion="error",$email="error",$confirmacion="error",$dni="error",$contrasena="error"){
//nombre: todos los nombres deben empezar por mayúscula
// y el campo no admite número o símbolos, únicamente letra.
    if(self::empiezaMayus($nombre)){
        if(self::todoLetras($nombre)){ //si no dio error es que son letras to
            $this->nombre = $nombre;
        }
    }
        //apellidos: todos los apellidos deben empezar por mayúsculas 
        //y el campo no admite números o símbolos.
        if(self::empiezaMayus($apellido)){
            if(self::todoLetras($apellido)){ //si no dio error es que son letras to
                $this->apellido = $apellido;
            }
        }
        //formato tipo via /nombree via, nº , resto de datos, cp, poblacion y país (separados por ,)
        if(self::calleBien($direccion)){
            $this->direccion = $direccion;
        }
        //e mail y confirmación sean igual
        if($email==$confirmacion){
            $this->email = $email;
        }
        //$this->confirmacion = $confirmacion;
        //DNI valido 9caracteres (8numeros 1 letra)
        if(self::dnieOk($dni)){
            $this->dni=$dni;
        }
        /* 8 caracteres max 20 
        al menos:
        1 mayus 
        1 min 
        2 numero
        1 signo*/
        
        if(strlen($contrasena)>=8 && strlen($contrasena)<=20){
            if(self::contMayus($contrasena)>0){
                if(self::contMinus($contrasena)>0){
                    if(self::contNum($cadena>1)){
                        if(self::contSig($cadena)>0){
                            $this->contrasena = $contrasena;
                        }
                    }   
                }
                
            }
        }
    } //fin CONSTRUCT


    /*
    *
    *
    *
    * GETTERS
    *
    **
    */
    public function getNombre(){
        
        return $this->nombre;

    }
    
    public function getApellido(){
        return $this->apellido;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getEmail(){
        return $this->email;
    }
    /*
    public function getConfirmacion(){
        return $this->confirmacion;
    }*/
    
    public function getDni(){
        return $this->dni;
    }
    public function getContrasena(){
        return $this->contrasena;
    }
    /*
    *
    *
    *SETTERS
    *
    *
    */
    public function setNombre($nombre){
        //nombre: todos los nombres deben empezar por mayúscula
// y el campo no admite número o símbolos, únicamente letra.
        if(self::empiezaMayus($nombre)){
            if(self::todoLetras($nombre)){ //si no dio error es que son letras to
                $this->nombre = $nombre;
            }
        }
    }

    public function setApellido($apellido){
        if(self::empiezaMayus($apellido)){
            if(self::todoLetras($apellido)){ //si no dio error es que son letras to
                $this->apellido = $apellido;
            }
        }
    }
    
    public function setDireccion($direccion){
        if(self::calleBien($direccion)){
            $this->direccion = $direccion;
        }
    }
    public function setEmail($email){
        $this->email = $email;
    }
    /*public function setConfirmacion($confirmacion){
        $this->confirmacion = $confirmacion;
    }*/
    public function setDni($dni){
        if(self::dnieOk($dni)){
            $this->dni=$dni;
        }
    }
    public function setContrasena($contrasena){
        if(strlen($contrasena)>=8 && strlen($contrasena)<=20){
            if(self::contMayus($contrasena)>0){
                if(self::contMinus($contrasena)>0){
                    if(self::contNum($contrasena)>1){
                        if(self::contSig($contrasena)>0){
                            $this->contrasena = $contrasena;
                        }
                    }   
                }
                
            }
        }
    }


} 

$contrasenha=$_GET['password'];
$usuario=$_GET['user'];
echo $contrasenha." ".$usuario;
/*
$usuario = new Usuario("Alan","Brito","calle falsa 123","quientepreguntoxd@gmail","quientepreguntoxj@gmail","1723723p","yopregunte");
echo "nombre: ".$usuario->getNombre();
echo "<br>";
echo "Apellido: ".$usuario->getApellido();
echo "<br>";
echo "Direccion: ".$usuario->getDireccion();
echo "<br>";
echo "Correo Electrónico: ".$usuario->getEmail();
echo "<br>";
//echo $usuario->getConfirmacion();
echo "DNI: ".$usuario->getDni();
echo "<br>";
echo "Contraseña: ".$usuario->getContrasena();
echo "<br>";
$usuario->setNombre("David");
$usuario->setApellido("León");
$usuario->setDireccion("verdadera,123,toda,11207,Libertalia,Oceania");
$usuario->setEmail("pues@si.es");
//$usuario->setConfirmacion("pues@no.es");
$usuario->setDni("15765324T");
$usuario->setContrasena("AmU987hp!");
echo "<br>";
//$usuario->setConfirmacion("contrase");
echo "nombre: ".$usuario->getNombre();
echo "<br>";
echo "Apellido: ".$usuario->getApellido();
echo "<br>";
echo "Direccion: ".$usuario->getDireccion();
echo "<br>";
echo "Correo Electrónico: ".$usuario->getEmail();
echo "<br>";
//echo $usuario->getConfirmacion();
echo "DNI: ".$usuario->getDni();
echo "<br>";
echo "Contraseña: ".$usuario->getContrasena();
echo "<br>";
*/

?>
