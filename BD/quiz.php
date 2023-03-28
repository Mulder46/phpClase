<?php
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "quiz";
//Abrimos la conexión
$connection = mysqli_connect($hostname , $user , $password);
//Seleccionamos una base de datos dentro del servidor
mysqli_select_db ($connection, $db);
//Ejecuta una consulta en la base de datos
$people_json = file_get_contents('https://opentdb.com/api.php?amount=10');
$decoded_json = json_decode($people_json, true);
//var_dump($decoded_json);
$results = $decoded_json["results"];
for ($i=0;$i<count($results);$i++){
    $pregunta = "'".$decoded_json["results"][$i]["question"]."'";
    
   // echo $pregunta;
    $categoria = "'".$decoded_json["results"][$i]["category"]."'";
    $question_type = "'".$decoded_json["results"][$i]["type"]."'";
    $difficulty = "'".$decoded_json["results"][$i]["type"]."'";
    echo "INSERT INTO questions (content,category,question_type,difficulty) values ($pregunta,$categoria,$question_type,$difficulty);"."<br>";
     mysqli_query($connection, "INSERT INTO questions (content,category,question_type,difficulty) values ($pregunta,$categoria,$question_type,$difficulty);");
    //var_dump($result1);
    $correcta ="'".$decoded_json["results"][$i]["correct_answer"]."'";
     mysqli_query($connection, "INSERT INTO answers (content, correct) values($correcta,true);");
    $incorrectas = $decoded_json["results"][$i]["incorrect_answers"];

    foreach($incorrectas as $incorrecta) {
       // echo "INSERT INTO answers (content, correct) values($incorrecta,'false');";
         mysqli_query($connection, "INSERT INTO answers (content, correct) values('$incorrecta','false');");
    }
}
// Obtener todas las filas de result un array asociativo, numérico, o en ambos

//no son consultas, son inserciones, con lo cual es true.
//$extraido = mysqli_fetch_all($result1, MYSQLI_NUM);
//$extraido1 = mysqli_fetch_all($result2, MYSQLI_NUM);
//$extraido2 = mysqli_fetch_all($result3, MYSQLI_NUM);
//var_dump($extraido);
//var_dump($extraido1);
//var_dump($extraido2);
mysqli_close($connection);




/*$user="root";
$password="";
$nombreBaseDatos="quiz";
    $conexion= mysqli_connect("127.0.0.1",$user,$password);
    mysqli_select_db ($conexion, $nombreBaseDatos);
    $result = mysqli_query($conexion, 'select q.content AS Pregunta,a.content AS respuesta from questions AS q INNER JOIN answers AS a ON a.fk_id_question = q.id'); 
    $result_type=MYSQLI_ASSOC;  //asociastivo. MYSQLI_NUM: solo numerico , o MYSQLI_BOTH: mezcla de los dos.
    $extraido = mysqli_fetch_all($result, $result_type);
    var_dump($extraido);
   for($i=0;$i<count($extraido);$i++){
      //  echo $extraido[$i]["content"];
        echo "<br>";
    }

    mysqli_close($conexion);*/
?>