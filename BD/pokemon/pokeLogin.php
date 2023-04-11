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
$ip = empty($_SERVER["REMOTE_ADDR"]) ? "Desconocida" : $_SERVER["REMOTE_ADDR"];
echo $ip."<br>";
include "conexion.php";
$fecha=date("Y/m/d");
if(existencia($connection,$usuario)){ //si existe miramos  su contraseña
    $id=0; //inicializamos la id
    if(contrasenha($id,$connection,$usuario,$contrasenha)){
        //crear un insert en el log con el éxito
        
        mysqli_query($connection, "INSERT INTO log(nombre,fecha,conseguido,ip) 
                    VALUES ('$usuario','$fecha',1,'$ip');");
        echo "login bien";
        echo "<form action='PokeJuego.php' method='post'>
            <input name='usuario'type='hidden' value=".$usuario.">
            <input name='id' value=".$id." type='hidden'>
            <input type='submit' value='Jugar' />  
            </form>";
    }else{
        //crear un insert en el log con el fracaso
        mysqli_query($connection, "INSERT INTO log(nombre,fecha,conseguido,ip) 
                    VALUES ('$usuario','$fecha',0,'$ip');");
        echo "Contraseña incorrecta!!!";
    }
}else{
    //crear un insert en el log con el fracaso
    mysqli_query($connection, "INSERT INTO log(nombre,fecha,conseguido,ip) 
    VALUES ('$usuario','$fecha',0,'$ip');");
    echo "Usuario incorrecta!!!";
}



?>