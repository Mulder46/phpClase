<?php
function sorteo($alumnos){
    shuffle($alumnos);
    return $alumnos;
}
$alumnos=["Rut","David","Gerardo","Adán","Joaquín","Jose","Eze","Efraín","Isaac","Michael","Dani","Alejandro"];
$sorteados= sorteo($alumnos);
$pos=1;
foreach($sorteados as $alumno){
    echo "el turno $pos es para: ";
    echo $alumno;
    echo "<br>";
    $pos++;
}


?>