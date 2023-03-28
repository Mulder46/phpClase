<?php
$user="root";
$password="";
$nombreBaseDatos="camion";
    $conexion= mysqli_connect("127.0.0.1",$user,$password);
    mysqli_select_db ($conexion, $nombreBaseDatos);
    $result = mysqli_query($conexion, "SELECT * FROM camioneros;"); 
    $result_type=MYSQLI_ASSOC;  //asociastivo. MYSQLI_NUM: solo numerico , o MYSQLI_BOTH: mezcla de los dos.
    $extraido = mysqli_fetch_all($result, $result_type);
    //var_dump($extraido);
    echo $extraido[1]["nombre"];

    mysqli_close($conexion);
?>