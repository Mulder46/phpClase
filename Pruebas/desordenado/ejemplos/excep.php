<?php
/*
try{
        f();
    }catch(Exception $e) {
        echo $e->getMessage();
    }finally{
        echo 'El finally se ejecuta sí o sí';
    }
    
    $miLado = -3;
    function areaCuadrado($lado){
        if ($lado < 0){
            // Lanzamos una excepción
            throw new Exception ('Debes insertar un número positivo');
        } else {
            return $lado * $lado;
        }
    }
    areaCuadrado($miLado);*/

    class ConfigFileNotFoundException extends Exception {}
    try {
        echo  0/0;

    } catch (Exception $e) {
        echo $e->getMessage();
        die();
}
    ?>