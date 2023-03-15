<?php
function mezclar_respuestas ($correct,$incorrects){
    array_push ($incorrects,"<b>".$correct."</b>"); //en el array de incorrectas guardamos la correcta con el formato negrita  
    shuffle ($incorrects); //la "barajamos"
    return $incorrects;     
}
//carga y decodificación de archivo
$people_json = file_get_contents('https://opentdb.com/api.php?amount=10');
$decoded_json = json_decode($people_json, true);
//selección de la parte que nos interesa
$results = $decoded_json['results'];

for ($i=0; $i < count($results); $i++) { 
    echo $results[$i]["question"]; //imprimimos las preguntas
    echo "<br>";
    echo "<br>";
    $respuestas= mezclar_respuestas ($results[$i]["correct_answer"],$results[$i]["incorrect_answers"]);//mezclamos todas las respuestas y la guardamos en un array
    foreach($respuestas as $respuesta){//recorremos todo el array imprimiendo cada respueta en una línea
        echo $respuesta;
        echo "<br>";
    }
    echo "<br>";
}
?>