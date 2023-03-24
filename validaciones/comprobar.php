<?php

function empiezaMayus($palabra){
    $ok=0;
    if(ord($palabra[0])>=65 && ord($palabra[0])<=90 ){//empieza mayúsc ula
        //echo "a";
        if(todoLetras($palabra)){
        //    echo "entro";
            $ok=1;
        }
    }
    return $ok;
}

 function todoLetras($palabra){
    $error=0;
    $cont=0;
    
    while(!$error && $cont<strlen($palabra)){    
        if(!(ord($palabra[$cont])>=65 && ord($palabra[$cont])<=90 || ord($palabra[$cont])>=97 && ord($palabra[$cont])<=122) ){
            
            //echo "ERROR: ".$palabra;
            $error=1;
            if(ord($palabra[$cont])==32)
                $error=0;
        }
        $cont++;
    }
    //echo $error;
    return !$error;
}
 function todoNumero($cadena){
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
 function contMayus($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena);$i++){
        if(ord($cadena[$i])>=65 && ord($cadena[$i])<=90 ){
            $cont++;
        }
    }
    return $cont;
}
 function contMinus($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena);$i++){
        
       if(ord($cadena[$i])>=97 && ord($cadena[$i])<=122){
        
            $cont++;
       }
    }
    

    return $cont;
}
 function contNum($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena)-1;$i++){
        if(ord($cadena[$i])>=48 && ord($cadena[$i])<=57){
            $cont++;
        }
    }
    
    return $cont;
}
 function contSig($cadena){
    $cont=0;
    for($i=0;$i<strlen($cadena);$i++){
        if(ord($cadena[$i])>=33 && ord($cadena[$i])<=47){
            $cont++;
       }
    }
    return $cont;
}
 function dnieOk($dni){
    $ok=0;
    if(strlen($dni)==9){
        if(todoLetras($dni[8])){
            $nums=substr($dni, 0, -1);
            if(todoNumero($nums)){
                $ok=1;
                
            }
        }
    }
    return $ok;
}

function separarPalabras($palabra){
    $caracteres = preg_split('/,/', $palabra);
    return $caracteres;

}
function setContrasena($contrasena){
    if(strlen($contrasena)>=8 && strlen($contrasena)<=20){
        if(contMayus($contrasena)>0){
            if(contMinus($contrasena)>0){
                if(contNum($contrasena)>1){
                    if(contSig($contrasena)>0){
                        return true;
                    }
                }   
            }
            
        }
    }
}
function setNombre($nombre){
    //nombre: todos los nombres deben empezar por mayúscula
// y el campo no admite número o símbolos, únicamente letra.
    if(empiezaMayus($nombre)){
        if(todoLetras($nombre)){ //si no dio error es que son letras to
            return true;
        }
    }
    return false;
}
$contrasenha=$_GET['password'];
$usuario=$_GET['user'];
//var_dump(setContrasena($contrasenha)); 
//var_dump(setNombre($usuario)); 
if(setContrasena($contrasenha) && setNombre($usuario)){
    echo "Inicio de sesión correcto";
}elseif(!setContrasena($contrasenha)){
    echo "Contraseña: ".$contrasenha." incorrecta";
}else{
    echo "Usuario: ".$usuario." incorrecto";
}
?>