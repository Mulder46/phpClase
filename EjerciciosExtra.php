<?php

//1 Escribe una función que muestre por pantalla los 100 primeros números separados por «,».
function cuentaCien1(){
    for($i=0;$i<=100;$i++){ //
        echo $i.",";
    }
    //echo $i;
}
cuentaCien1();
echo "<br>";

//2 Escribe una función que muestre los 100 primeros números separados por «,» pero que al último número no se le muestre la «,».
function cuentaCien(){
    for($i=0;$i<100;$i++){ //aquí hasta el 99 con la , y al salir ya imprime el 100
        echo $i.",";
    }
    echo $i;
}
cuentaCien();
echo "<br>";
//3 Escribe una función que busque un elemento en un array. Si lo encuentra devuelva true.
function buscarEnArray($array,$palabra){
    foreach($array as $dato){
        //echo $dato;
        if($dato==$palabra){
            
            return true; //si lo encuentra devuelve true y se acaba la función
        }
        
    }
    return false;  //si acabó el bucle sin pasar por el if devolvemos false
}
$palabras=["saurom","Saratoga","warcry","Avalanch"];
$palabra="Saratoga";
//var_dump($palabras);
var_dump(buscarEnArray($palabras,$palabra));
echo "<br>";

//4 Escribe una función que muestre por pantalla la tabla de multiplicar del número que se pasa cómo parámetro.
function multiplica($mult){
    for($i=1;$i<=10;$i++){
        echo $i."X".$mult."=".$i*$mult."<br>";
    }
}
multiplica(5);
echo "<br>";
//5 Escribe una función que devuelva si un número es primo o no.
function esPrimo($primo){
    for ($i = 2; $i < $numero; $i++) {
        if (($numero % $i) == 0) {     // No es primo                 
            return false;   
        }
    }
    return true; //si no entra al if es que es primo
 }
echo "<br>";
//6 Escribe una función que calcule y devuelva el área de un cuadrado.
function areaCuadrado($lado){
    return $lado*=$lado;
}
echo areaCuadrado(5);
echo "<br>";
//7 Escribe una función que calcule y devuelva el área de un rectángulo.
function areaRectangulo($base,$altura){
    return $base*=$altura;
}
echo areaRectangulo(5,3);
echo "<br>";
//8 Escribe una función que calcule y devuelva el área de un triángulo.
function areaTriangulo($base,$altura){
    return $base*$altura/2;
}
echo areaTriangulo(5,9);
echo "<br>";
//9 Escribe una función que calcule y devuelva el área de un trapecio.
function areaTrapecio($h,$a,$b){
    return $h*(($a+$b)/2);
}
echo areaTrapecio(4,6,3);  //debe ser 18
echo "<br>";
//10 Escribe una función que intercambie el valor de dos variables.
function intercambio(&$primera,&$segunda){
    $auxiliar=$primera;
    $primera=$segunda;
    $segunda=$auxiliar;
}
$una=1;
$dos=2;
intercambio($una,$dos);
echo "Primera ".$una." segunda ".$dos;
echo "<br>";
//11 Escribe una función llamada dado que devuelve un número entre el 1 y el 6. PISTA: la función predefinida rand devuelve números aleatorios entre el rango de valores que le pases como parámetro.
function dado(){
    return rand(1,6);

}
echo dado();
echo "<br>";
//12 Escribe una función que reciba una frase o palabra y la devuelva al revés.
function reves($frase){
    $reversa=""; //la formo en otra variable
    for($i=strlen($frase)-1;$i>=0;$i--){ //un bucle que vaya desde el final (-1 por que empieza en 0) hasta 0 incluido
        $reversa.=$frase[$i];
    }
    return $reversa;
}
echo reves("el veloz murcielago");
echo "<br>";
//13 Escribe una función que devuelve verdadero o falso dependiendo de si una frase que pasamos por parámetro es un palíndromo. PISTA: Palíndromo es una palabra o frase que se lee igual en un sentido que en otro. Por ejemplo: Dábale arroz a la zorra el abad.
function palindromo($frase){
    if($frase==reves($frase)){
        return true;
    }
    return false;
}
var_dump(palindromo("saravaras"));
var_dump(palindromo("este no lo es"));
echo "<br>";
//14 Hallar el menor de dos números enteros positivos sin utilizar condicionales y operadores ternarios. Suponer que los números no son iguales.
function menor($numero1,$numero2){
    return abs($numero2*($numero1/$numero2)+$numero1*($numero2/$numero1))/(($numero1/$numero2)+($numero2/$numero1)); 
}
echo menor(2,8);
echo "<br>";
//15 Escribe una función que determine si dos números son iguales sin usar condicionales ni el operador termiario.
function iguales($numero1,$numero2){
    return $numero1==$numero2;
}
var_dump(iguales(2,2));
var_dump(iguales(2,6));
echo "<br>";
/*16 Una empresa de alquiler de coches necesita saber cuanto combustible debe tener para llenar los depósitos de todos sus vehículos. La flota consta de 
32 turismos, 
11 todoterrenos, 
10 caravanas y 
5 furgonetas. Sabiendo que la capacidad de depósito de cada vehículo es la siguiente:
Turismos: 40 
Todoterronos:60 
Caravanas: 120 
Furgonetas: 60 
 Calcula la cantidad total de combustible necesaria. Intenta no usar una única función. Usa todas las que consideres necesarias.
*/
$capacidad=["turismo"=>40,"todoterrenos"=>60,"caravanas"=>120,"furgonetas"=>60];
function gastoTurismo($capacidades,$cantidad){
    return $capacidades["turismo"]*$cantidad;
}
function gastoTodoterrenos($capacidades,$cantidad){
    return $capacidades["todoterrenos"]*$cantidad;
}
function gastoCaravanas($capacidades,$cantidad){
    return $capacidades["caravanas"]*$cantidad;
}
function gastoFurgonetas($capacidades,$cantidad){
    return $capacidades["furgonetas"]*$cantidad;
}
function gastoTotal($capacidades,$cantidadTu,$cantidadTo,$cantidadCa,$cantidadFu){
    return gastoTurismo($capacidades,$cantidadTu)+gastoTodoterrenos($capacidades,$cantidadTo)+gastoCaravanas($capacidades,$cantidadCa)+gastoFurgonetas($capacidades,$cantidadFu);
}
echo gastoTotal($capacidad,32,11,10,60);
echo "<br>";
/*17 Crea mínimo 3 array asociativos donde en cada uno de ellos se guarde la información de tres estudiantes:
nombre.
apellido.
año de matriculación (los años impartidos: 2021, 2022 y 2023)
curso (La oferta de cursos son: Desarrollo Web, Marketing y Ciberseguridad).*/
$ana=["Nombre"=>"Ana","anho"=>2023,"curso"=>"Ciberseguridad"];
$david=["Nombre"=>"David","anho"=>2022,"curso"=>"Desarrollo Web"];
$antonio=["Nombre"=>"Antonio","anho"=>2021,"curso"=>"Marketing"];

// 18 Crea un array "estudiantes" cuyos elementos sean los tres arrays asociativos del ejercicio anterior.
$estudiantes=[$ana,$david,$antonio];

//19 Crea una función que te muestre por pantalla la información de los estudiantes guardados en el array del ejercicio anterior.
function mostrarEstudiantes($lista){
    
    for($i=0;$i<count($lista);$i++){
        echo "Estudiante: ".$lista[$i]["Nombre"]."<br>";
        echo "Curso: ".$lista[$i]["curso"]."<br>";
        echo "Año: ".$lista[$i]["anho"]."<br>";
        echo "<br>";

    }
}
echo mostrarEstudiantes($estudiantes);
echo "<br>";
//20 Crea una función que sólo muestre la información de los estudiantes (del ejercicio 18) que estén matriculados en el curso de Desarrollo Web.
function soloWeb($lista){
    for($i=0;$i<count($lista);$i++){
        if($lista[$i]["curso"]=="Desarrollo Web"){
        echo "Estudiante: ".$lista[$i]["Nombre"]."<br>";
        
        echo "Año: ".$lista[$i]["anho"]."<br>";
        echo "<br>";
        }

    }
}

echo "Desarrollo web:";
echo "<br>";
soloWeb($estudiantes);
echo "<br>";
//21 Crea una función que sólo muestre la información de los estudiantes (del ejercicio 18) que estén matriculados en el 2023.

function solo2023($lista){
    for($i=0;$i<count($lista);$i++){
        if($lista[$i]["anho"]==2023){
        echo "Estudiante: ".$lista[$i]["Nombre"]."<br>";
        
        echo "Año: ".$lista[$i]["curso"]."<br>";
        echo "<br>";
        }

    }
}

echo "2003:";
echo "<br>";
solo2023($estudiantes);
echo "<br>";
//22 Carmen hace todas las semanas la misma compra, y por ello y para facilitarle la vida le ha pedido a su hijo que le haga un pequeño programa que 
//le indique que productos de la lista debe comprar, para ello. PISTA: crea una array asociativo que se llame lista de la compra, cuya clave (key) sea 
//el nombre del producto y valor (value) true o false dependiendo si es necesario comprarlo o no. Por ejemplo: "huevos" => true. Esto quiere decir que sería necesario comprar huevos.
$listaCompra=["huevos"=>true,"Pollo"=>false,"arroz"=>false,"gazpacho"=>true,"zurrapa de lomo"=>true];
function listaComprar($lista){
    $valores=array_values($lista);
    $claves=array_keys($lista);
    for($i=0;$i<count($lista);$i++){ 
        if($valores[$i]){
            
            echo "Compra: ".$claves[$i]."<br>";
        }
    }
}
listaComprar($listaCompra);
//var_dump( array_values($listaCompra));
//var_dump (sha1("codigo"));

echo "<br>";
//23 Crea una función que devuelva los productos de la lista de la compra que hace falta comprar del ejercicio anterior.

echo "<br>";
//24 Crea una función que devuelva los productos de la lista de la compra que NO hace falta comprar del ejercicio anterior.
$listaCompra=["huevos"=>true,"Pollo"=>false,"arroz"=>false,"gazpacho"=>true,"zurrapa de lomo"=>true];
function listaNoComprar($lista){
    $valores=array_values($lista);
    $claves=array_keys($lista);
    for($i=0;$i<count($lista);$i++){ 
        if(!$valores[$i]){
            
            echo "No comprar: ".$claves[$i]."<br>";
        }
    }
}
listaNoComprar($listaCompra);
echo "<br>";
/*25 Añade nuevos los siguientes productos a la lista de la compra y muestrála lista por pantalla:

fresas
calabacín
jamón
aguacate
*/


//26 Carmen se ha hecho vegetariana y quiere eliminar todos los productos cárnicos de su lista para ello crea una función con la que puedas eliminar productos de la lista de la compra.


echo "<br>";
?>