<?php
function distance(string $strandA, string $strandB): int
{
    $cont=0;
    if(strlen($strandA)!=strlen($strandB) ){
        throw new InvalidArgumentException('Que te fallen ');
    }
    for($i=0;$i<strlen($strandA);$i++){
        if($strandA[$i]!= $strandB[$i]){
            $cont++;
        }
    }
    return $cont;
}
echo distance("aabbc","aabbda");
?>