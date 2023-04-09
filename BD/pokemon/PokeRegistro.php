<?php

$usuario=$_GET['usuario'];
$contrasenha=$_GET['password'];
$inicial=$_GET['pokemon'];
echo $usuario.$contrasenha.$inicial; 
include "conexion.php";

function existencia($connection,$usuario){  //lo primero mirar si existe ya en la BD
    $existe=mysqli_query($connection, "SELECT id,usuario FROM usuarios WHERE usuario='$usuario';");
    return  $existe->num_rows > 0;  
}
function agregar($connection,$usuario,$contrasenha,$inicial){
    $contrasenha=password_hash($contrasenha, PASSWORD_DEFAULT);
    $valido1=mysqli_query($connection, "INSERT INTO usuarios(usuario,contrasenha) VALUES ('$usuario','$contrasenha');"); //si no existe agregamos el usuario
    if($valido1){ //si se creo bien el usuario sacamos su id y agregamos su pkmn
        $id=mysqli_query($connection, "SELECT id FROM usuarios WHERE usuario='$usuario';");
        $result_type=MYSQLI_ASSOC; //indico que lo quiero como array asociativo
        $id=mysqli_fetch_all($id, $result_type); //saco los datos en forma que indicamos antes
        $id=$id[0]["id"];
        $nivel=rand(1,20);
        $experiencia=$nivel*12;
        $date=date('Y/m/d');
        $valido2=mysqli_query($connection, "INSERT INTO mochila(fk_pokemon,fk_usuario,nivel,experiencia,fecha) 
                            VALUES ($inicial,$id,$nivel,$experiencia,'$date');");
    }
    if($valido2){
        echo "agregado con éxito.";
    }else{
        echo "ERROR GRAVE DE GRAVEDAD.";
    }

}


if(!existencia($connection,$usuario)){
    agregar($connection,$usuario,$contrasenha,$inicial);
}else{
    echo "Nombre de usuario ya en uso.";
}


echo "<form action='registrar.php'>
<input type='submit' value='Volver' />
  </form>"
?>