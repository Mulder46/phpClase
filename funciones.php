<?php
/* Solicita al usuario tres números enteros e indícale cuál es el menor.
*/
/*$num1=readline("Di un numero");
$num2=readline("Di otro numero");
$num3=readline("Di otro  numero más");*/
echo "<br>";
$num1=2;
$num2=4;
$num3=1;
function menor($num1,$num2,$num3){
    if($num1<$num2){ //si el 1 e menor...puede que sea 1 o el 3
        if($num1<$num3){  //nos quitamos la duda
            echo "$num1 Es el menor";

        }else{ //si no era el 1 pues ea, es el 3
            echo "$num3 Es el menor";
        }
        }elseif($num2<$num3){ //si no es el 1 puede ser el 2 o el 3
            echo "$num2 Es el menor";
        }else{ //pues el 3
            echo "$num3 Es el menor";
        }
    }
  
  menor($num1,$num2,$num3);
/*  Solicita al usuario una frase y una letra y muestra la cantidad de veces que aparece la letra en la frase.
*/
echo "<br>";
function buscaLetra($frase,$letra){
    $cont=0; //empieza a contar desde 0 las veces que está la letra
    $tamanho = strlen($frase);
   // echo $frase;  //probando que le leyó bien
    for($i=0; $i<$tamanho; $i++){  
        if($frase[$i]==$letra){
            $cont++;
        }
    }
    return $cont;
}
$frase="El veloz murciélago hindú comía feliz cardillo y kiwi";
$letra="a";
$cantidad=buscaLetra($frase,$letra);
echo "La letra aparece ";
echo $cantidad;
echo " Veces";


/*Suma o resta (según elija el usuario) dos números reales*/
echo "<br>";
$num1=9;
$num2=6;
//$oper=[0,1];
$OpeUsu=1;
function operacion($num1,$num2,$OpeUsu){
    switch($OpeUsu){
        case 0: //si pidio opción  0 que es lo que le decíamos que era suma
            echo "La suma es: ";
            echo  $num1+$num2;
            break;
        case 1: //el 1 dijimos que era resta
            echo "La resta es: ";
            echo  $num1-$num2;
            break;
        default: //si eligio opción que no era
            echo "Te dije 0 o 1, esta operación no es valida";
        }
}
operacion($num1,$num2,$OpeUsu);

/*Almacena en dos variables datos de validación (usuario y contraseña) correctos 
y permite que el usuario valide (dispone de 3 intentos)*/
echo "<br>";

$usuarioDado="usir"; //usuario dada por usuario
$contrasenhaUsu="pas";//contraseña dada por usuario
function comprobar($usuarioDado,$contrasenhaUsu){
    $usuario="user1";
    $contrasenha="passwd";
    $intentos=3;
    do{
        if($usuario==$usuarioDado && $contrasenha==$contrasenhaUsu){//si acierta
            echo "ole tú";
            break; //enhorabuena y para afuera
        }else{
            $intentos--; //reduce cantidad de intentos
            echo "No coincide<br>"; //avisa que lo hizo mal
        }

    }while($intentos>0); //mientras tenga intentos
}
comprobar($usuarioDado,$contrasenhaUsu);

/*Solicita al usuario una letra, si inserta una a muestra el número 7, si es una b, el 9, si es una c
 el 101 y si no es ninguno de los tres, indícale que se ha equivocado de <letra></letra>*/
 echo "<br>";
 $letra="a";
 function idLetra($letra){
    switch($letra){
        case "a":
            echo 7;
            break;
        case "b":
            echo 9;
            break;
        case "c":
            echo 101;
            break;
        default:
            echo "Te has equivocado";
    }
}
idLetra($letra);

/*Ordena alfabéticamente un array con 7 palabras puedes usar el algoritmo de la burbuja */
echo "<br>";
function ordena(&$cadena){
    $tamanho = count($cadena);  //sabemos cuanto mide la array
    for ($i = 0; $i < $tamanho; $i++) { //recorro todo el array
        for ($j = 0; $j < $tamanho - 1; $j++) {
            if ($cadena[$j] > $cadena[$j + 1]) { //si el siguiente es mayor hacemos cambio
                $temporal = $cadena[$j]; //guardo el valor en una temporal para no perderlo
                $cadena[$j] = $cadena[$j + 1]; //bajo el siguiente a esta posición
                $cadena[$j + 1] = $temporal; //recupero el valor en el siguiente
            }
        }
    }
}
$frutas=["platano","melon","sandia","pera","fruta del dragón"];
ordena($frutas);
$tamanho = count($frutas);
for ($cont = 0; $cont < $tamanho; $cont++) { 
    echo $frutas[$cont];
    echo " ";
}
echo "<br>";


echo "<br><b>Más Funciones</b> <br>";
/* Una función que devuelva el número de cifras de un entero pasado como parámetro.
*/
echo "<br>";
/*
Una función que muestre al usuario una secuencia de * (se debe construir la cadena de uno en uno),
 la cantidad de * se pasará cómo parámetro de la función.
 */
echo "<br>";
$cantidad=5;
function astericos($cant){
    for ($i=0;$i<$cant;$i++){
        echo"*";
    }
}
astericos($cantidad);
 /*
Una función que permita mostrar la secuencia (se debe construir la cadena de uno en uno):
*+_*+_*+_*+_
*/
echo "<br>";

function secuencia(){
    for ($i=0;$i<4;$i++){
        echo"*";
        echo"+";
        echo"-";
    }
}
secuencia();
/*
Una función que permita mostrar un triángulo como el siguiente:
    **
    ***
    ****
    *****
*/
echo "<br>";
echo "<br>";
function triangulo(){
    for($i=2;$i<6;$i++){
        for($j=0;$j<$i;$j++){
        echo "*";
        }
        echo "<br>";
    }
}
triangulo();
/*
Una función que devuelva la diferencia en días entre dos fechas del mismo año (sólo tenemos en cuenta dia y mes).
modificación desde github*/
?>
