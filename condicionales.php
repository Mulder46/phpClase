<?php
  /*
  IF
    La función date() con el parametro 'D' nos devuelve las tres primeras letras del día de la semana 
    en inglés: Mon, Tue, Wed, Thu, Fri, Sat, Sun. Con este pequeño código $dia_ingles = date('D');
    tendremos el día en la variable $dia_ingles. Mostrar el día en español por pantalla.
    */
$dia_ingles = date('D');

    if ($dia_ingles=="Fri"){
        echo "Viernes";
    }
    else if($dia_ingles=="Mon"){
        echo "lunes";
    }
        
    else if($dia_ingles=="Tue"){
        echo "Martes";
    }
    else if($dia_ingles=="Wed"){
        echo "Miércoles";
        }
    else if($dia_ingles=="Thu"){
        echo "Jueves";
        }
    else if($dia_ingles=="Sat"){
        echo "Sábado";
        }
    else if($dia_ingles=="Sun"){
        echo "Domingo";
        }
    
    /*
    SWITCH
    La función date() con el parametro 'D' nos devuelve las tres primeras letras del día de la semana 
    en inglés: Mon, Tue, Wed, Thu, Fri, Sat, Sun. Con este pequeño código $dia_ingles = date('D');
    tendremos el día en la variable $dia_ingles. Mostrar el día en español por pantalla.
    */

    $dia_ingles = date('D');
    switch($dia_ingles){
        case ("Fri"):
            echo "Viernes";
            break;
        case("Mon"):
            echo "lunes";
            break;
        case("Tue"):
            echo "Martes";
            break;
        case("Wed"):
            echo "Miércoles";
            break;
        case("Thu"):
            echo "Jueves";
            break;
        case("Sat"):
            echo "Sábado";
            break;
        case("Sun"):
            echo "Domingo";
            break;
        
               
    }
/*
Realizar el ejercicio anterior pero 
mostrando el día de la semana de lunes a viernes, 
y para sábado y domingo mostrar el mensaje: Fin de semana.
*/
$dia_ingles = date('D');
switch($dia_ingles){
    case ("Fri"):
        echo "Viernes";
        break;
    case("Mon"):
        echo "lunes";
        break;
    case("Tue"):
        echo "Martes";
        break;
    case("Wed"):
        echo "Miércoles";
        break;
    case("Thu"):
        echo "Jueves";
        break;
    default:
        echo "Fin de semana";
    
           
}

/*
Una tienda online quiere realizar una mejora en el código de su web. Necesita que la web, según el 
importe de la cesta, muestre un mensaje u otro al usuario. En concreto quiere que:

Si la compra es inferior a 30 euros se le muestre un mensaje en negrita diciendo: 'Compra más o 
te cobraremos los abusivos 30 euros de gastos de envío'.
Si la compra es superior a 30 euros pero inferior a 90 deberemos mostrar un número indicando cuanto 
le falta para llegar a 90 euros y tener gastos de envío gratuitos. Ejemplo: '¡¡¡Con solo 33.50€ 
más podrás tener gastos de envío gratis!!!'
Si la compra alcanza los 90€ indicaremos un mensaje en negrita: 'Gastos de envío incluidos'.
*/
$precioCompra=100;
$envioGratis=90;
if($precioCompra<30){
    echo "<b>Compra más o te cobraremos los abusivos 30 euros de gastos de envío</b>";
}else if($precioCompra<90){
    $envioGratis=$envioGratis-$precioCompra;
    echo "¡¡Con solo $envioGratis  más podrás tener gastos de envío gratis!!!";
}else{
    echo "<b>Gastos de envío incluidos</b>";
}

/*
Una tienda online nos ha pedido una mejora para su web. Necesita un tratamiento de la información de la
 cesta de los clientes que cumpla los siguientes requisitos:
Si la compra del cliente es inferior a 19 euros podrán requerir 2 cosas:
Si los productos son de mascotas se mostrará un mensaje: "No se puede realizar el envío".
Si los productos son de ropa se le mostrará el siguiente mensaje: "Los gastos de envío son 9 euros".
Si la compra tiene un importe entre 19 y 40 euros se le indicará el mensaje: "Los gastos de envío son 9 euros".

Si la compra supera los 40 euros deberemos indicar un mensaje de que los portes de envío son gratis.
Si la compra supera los 200 euros deberemos mostrar un mensaje con un código de descuento: CODIGODESC33.
*/
$precioCompra=25;
$tipoCompra="mascota";
if($precioCompra>19){
    if($precioCompra<40){
        echo "Los gastos de envio son 9€";
    }else if($precioCompra<200){
        echo "Todo es gratis para ti";
    }else{
        echo "código de descuento: CODIGODESC33 para toda la vida";
    }
}else if($tipoCompra=="mascota"){
    echo "No se puede realizar";
}else{
    echo "Los gastos de envio son 9€";
}
/*
Debemos realizar un script que indique cual es el mayor de 4 números, es decir, nos pasan cuatro numeros 
enteros y debemos
 mostrar un mensaje con el mayor de los cuatro. Las variables con los cuatro numeros serán $a, $b, $c y $d.
*/
$a = 1;
$b = 8;
$c = 7;
$d = 4;

if ($a>$b and $a>$c and $a>$d) {
    echo $a . "<br>";
}

if ($b>$a and $b>$c and $b>$d) {
    echo $b . "<br>";
}

if ($c>$b and $c>$a and $c>$d) {
    echo $c . "<br>";
}

if ($d>$b and $d>$c and $d>$a) {
    echo $d . "<br>";
}

?>