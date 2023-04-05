<?php
function buscaMail($connection,$mail){
    $mails=mysqli_query($connection,"SELECT email FROM usuarios");
    $result_type=MYSQLI_ASSOC; //indico que lo quiero como array asociativo
    $mails=mysqli_fetch_all($mails, $result_type); //saco los datos en forma que indicamos antes
    //var_dump($mails);
    $encontrado=false;
    $i=0;
    while(!$encontrado && $i<count($mails)){
        if($mail==$mails[$i]["email"]){
            $encontrado=true;
        }
        $i++;
    }
    return $encontrado;
}
function agregarUsuario($connection,$nombre,$apellido,$mail,$contrasenha){
    return mysqli_query($connection,"INSERT INTO usuarios(nombre,apellidos,email,contrasenha) VALUES ('$nombre','$apellido','$mail','$contrasenha')"); 
}

    $nombre=$_POST['nombre']; 
    $apellido=$_POST['apellido']; 
    $mail=$_POST['mail']; 
    $contrasenha=$_POST['contrasenha']; 
    $contrasenha=password_hash($contrasenha, PASSWORD_DEFAULT);

    // conexión
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "logueo";
$connection = mysqli_connect($hostname , $user , $password); 
mysqli_select_db ($connection, $db);
if(buscaMail($connection,$mail)){
    echo "El mail ya existe";
}else{
    if(agregarUsuario($connection,$nombre,$apellido,$mail,$contrasenha)){
        echo "agregado correctamente.";
    }else
        echo "baaah, no pude.";
}

?>
<form action="formulario.html" method="post">
    <button type="submit">Atras</button>
</form>