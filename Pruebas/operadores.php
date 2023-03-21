 <?php
    $a = (false && true);
    $b = (true  || true);
    $c = (false and false);
    $d = (3>5  or $a == $b );
    echo "$a $b $c $d ";
    var_dump($a);
    var_dump($b);
    var_dump($c);
    var_dump($d);
?>