<?php 
namespace App;

class ToanHoc {
   public function sum($a,$b){
       $c = $a + $b;
        return $c;
    // return 0;
   }

   public function minus($a,$b){
    $c = $a - $b;
     return $c;
}   

public function core($a,$b){
    $c = $a * $b;
     return $c;
}   
}