

<?php

$people_json = file_get_contents('https://opentdb.com/api.php?amount=10');
$decoded_json = json_decode($people_json, true);

$results= $decoded_json["results"];
foreach($results as $result){
    echo $result["question"];
    echo "<br>";
    echo "<strong>" . $result["correct_answer"] . "</strong>";
    echo "<br>";
    foreach($result["incorrect_answers"] as $incorrect){
        echo $incorrect;
        echo "<br>"; 
     }
    echo "<br>";
}

?>