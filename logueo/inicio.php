<?php
function buscaUsuario($connection,$email){
    $user=mysqli_query($connection,"SELECT nombre,contrasenha
            FROM usuarios
            WHERE email='$email'");
//var_dump($user);
            $result_type=MYSQLI_ASSOC; //indico que lo quiero como array asociativo
            $usuarios=mysqli_fetch_all($user, $result_type); //saco los datos en forma que indicamos antes
    return $usuarios;
}
function probarContrasenha($usuario,$contrasenha){
   // var_dump($usuario);
    $contrasenha=$contrasenha;
    $hash=$usuario[0]["contrasenha"];
    return password_verify($contrasenha, $hash);
}
// conexión
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "logueo";
$connection = mysqli_connect($hostname , $user , $password); 
mysqli_select_db ($connection, $db);


    $email=$_POST['email']; 
    $contrasenha=$_POST['contrasenha'];
    $usuario=buscaUsuario($connection,$email);
    if(!$usuario){
        echo "No existe usuario";
    }else{
        if(probarContrasenha($usuario,$contrasenha)){
            echo "Login Correcto.";
        }else
            echo "Contraseña Incorrecto";
    }

?>