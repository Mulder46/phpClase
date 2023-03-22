<?php
function dibujar($dim1,$dim2){
    $tempDim1= $dim1;
    for($i=1;$i<=$dim1;$i++){
        echo pintarfilas($tempDim1,$dim2);
        echo "<br>";
        $tempDim1+=2;
    }
    for($i=$dim1-1;$i>0;$i--){
        echo pintarfilas($tempDim1,$dim2);
        echo "<br>";
        $tempDim1-=2;
    }
}
    
function pintarEspacios($dim1){
    return "___";
 }

function pintarCruces($dim1){
    return "++++";
}
    
function pintarfilas($dim1,$dim2){
    // $numEspacios = ($dim2-$dim1)/2;
    return pintarEspacios($dim1) . pintarCruces($dim1) . pintarEspacios($dim1);
} 

dibujar(4,10);
?>