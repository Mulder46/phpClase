<?php

$id=mysqli_query($connection, "SELECT id FROM usuarios WHERE usuario='$usuario';");


        $result_type=MYSQLI_ASSOC; //indico que lo quiero como array asociativo
        $id=mysqli_fetch_all($id, $result_type); //saco los datos en forma que indicamos antes
/*
tendríamos un array asociativo, en cada primer [] sería un registro, y en cada 2º [] un campo en este caso estamos viendo el primero usuario (0) 
y si campo id que es uno de los que pusimos en el select
*/
        $id=$id[0]["id"];

//CREAR PASS
        $contrasenha=password_hash($contrasenha, PASSWORD_DEFAULT);
//COMPROBAR PASS
        if (password_verify('rasmuslerdorf', $hash))

// EXIET USUARIO?
        function existencia($connection,$usuario){  //lo primero mirar si existe ya en la BD
            $existe=mysqli_query($connection, "SELECT id,usuario FROM usuarios WHERE usuario='$usuario';");
            return  $existe->num_rows > 0;  
        }
        ?>