<?php
class Rombo {
    //Atributos
    protected $dimension1;
    protected $dimension2;
    //Constructor
    public function __construct($dimension1,$dimension2){
        $this->dimension1 = $dimension1;
        $this->dimension2 = $dimension2;
    }
    public function dibujar(){
        $auxiliar= $this->dimension1;
        for($i=2;$i<=$this->dimension1;$i++){
            self::pintarfilas($auxiliar);
            echo "<br>";
            $auxiliar+=2;
            
        }
        for($i=1;$i<=$this->dimension1;$i++){
            self::pintarfilas($auxiliar);
            echo "<br>";
            $auxiliar-=2;
            
        }
        
    }
    public function espacios($dim1){
        $espacios=($this->dimension2-$dim1)/2;
        for($i=0;$i<$espacios;$i++){
            echo " ";
        }
    }
    
    public function cruces($cruz){
        for($i=0;$i<$cruz;$i++){
            echo "+";
        }
    }

    public function pintarfilas($dimension1){
        self::espacios($dimension1);
        self::cruces($dimension1);
        return $dimension1;

    }
}
$rombo=new Rombo(4,10);
echo "<center>";
$rombo->dibujar();
echo "</center>";

?>