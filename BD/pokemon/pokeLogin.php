<?php
$usuario=$_GET['usuario'];
$contrasenha=$_GET['password'];

function existencia($connection,$usuario){  //lo primero mirar si existe ya en la BD
    $existe=mysqli_query($connection, "SELECT id,usuario FROM usuarios WHERE usuario='$usuario';");
    return  $existe->num_rows > 0;  
}

function contrasenha(&$id,$connection,$usuario,$contrasenha){
    $hash=mysqli_query($connection, "SELECT id,contrasenha FROM usuarios WHERE usuario='$usuario';");
    $result_type=MYSQLI_ASSOC; //indico que lo quiero como array asociativo
    $pass=mysqli_fetch_all($hash, $result_type); //saco los datos en forma que indicamos antes
    $hash=$pass[0]["contrasenha"];
    $id=$pass[0]["id"]; //le pasamos la id para facilitar a la parte de pokeJuego
    return password_verify($contrasenha, $hash);
}
include "conexion.php";

if(existencia($connection,$usuario)){ //si existe miramos  su contraseña
    $id=0; //inicializamos la id
    if(contrasenha($id,$connection,$usuario,$contrasenha)){
        echo "login bien";
        echo "<form action='PokeJuego.php' method='post'>
            <input name='usuario' value=".$usuario.">
            <input name='id' value=".$id.">
            <input type='submit' value='Jugar' />  
            </form>";
    }else{
        echo "Usuario o contraseña incorrecta!!!";
    }
}



?>