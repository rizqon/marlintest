<?php


class Marlin
{
    public $iterationW;

    public function __construct(){
        $this->iterationW = 0;
    }

    public function run($num) {
        for($i = 1; $i <= $num; $i++){
            
            if($this->iterationW == 5){
                break;
            }

            if( $this->modulo(3, $i) AND $this->modulo(5, $i) ){
            
                echo "{$i} ==> ". $this->writeAll();
            
            }elseif( $this->modulo(3, $i) ){

                if($this->iterationW <= 2){
                    echo "{$i} == >". $this->writeMarlin();
                }else{
                    echo "{$i} (reverse) ==> ". $this->writeBooking();
                }
            
            }elseif( $this->modulo(5, $i)  ){
            
                if($this->iterationW <= 2){
                    echo "{$i} ==> ". $this->writeBooking();
                }else{
                    echo "{$i} (reverse) ==> ". $this->writeMarlin();
                }
            
            }else{

                // echo "{$i} ==> ". "Null\n";

            }
        }
    }

    public function modulo($modulo, $iteration){
        return $iteration % $modulo == 0;
    }

    public function writeMarlin(){
        return "Marlin\n";
    }

    public function writeBooking(){
        return "Booking\n";
    }

    public function writeAll() {
        
        $this->iterationW +=1;

        return "Marlin Booking\n";
    }
}


$marlin = new Marlin;

$marlin->run(100);