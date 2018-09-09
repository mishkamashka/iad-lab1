<?php
    // start measuring script time
    $begin = microtime(1);
if (isFormValid() && isset($_GET['coordinate_x']) && isset($_GET['radius'])) {
    // init some variables
    $result = "";
    $line = "";
    $point = new Point((string)$_GET['coordinate_x'], floatval((string)$_GET['coordinate_y']));
    $radius = (string)$_GET['radius'];

    // complete answer
        $answer = 
    '<div class="row">' 
        . '<div class="cell" data-title="X">' . $point->x . '</div>' 
        . '<div class="cell" data-title="Y">' . $point->y . '</div>' 
        . '<div class="cell" data-title="R">' . $radius . '</div>'
        . '<div class="cell" data-title="Result">' . ($point->isBelongToArea($radius) ? 'success' : 'failure') . '</div>' 
    . '</div>';

    // open file and write answers
    $file = fopen("answers", "a+");
    fwrite($file, $answer);
    fclose($file);
    $file = fopen("answers", "r");
    $answer = "";
    while (($line = fgets($file)) !== false) {
        $answer .= $line;
    }
} else {
    $file = fopen("answers", "r");
    $errorMsg = "Значения выходят за диапазон";
    $answer = "";
    while (($line = fgets($file)) !== false) {
        $answer .= $line;
    }
}
   // end time measuring
$end = microtime(1);
$time = ($end - $begin) * 100000;

// return answer on page
include 'index.php';

class Point{
    var $x;
    var $y;

    function __construct($x, $y){
        $this->x=$x;
        $this->y=$y;
    }

    function isBelongToArea($radius){
        return ((($this->x <= $radius) && ($this->x >= 0)) && (($this->y <= $radius/2.0) && ($this->y >= 0)) ||
        (($this->x >= -$radius / 2.0) && ($this->x <= 0) && ($this->y >= -$radius/2.0) && ($this->y <= 0) && (pow($this->x, 2) + pow($this->y, 2) <= (pow($radius, 2))) ) ||
        (($this->x >= -$radius) && ($this->x <= 0) && ($this->y <= $radius / 2.0) && ($this->y >= 0) && ($this->y <= $this->x + $radius / 2.0)));
    }
}

function isFormValid() {
    $y = (string)$_GET['coordinate_y'];  
    if (isset($y) && !is_numeric($y) || $y < -3 || $y > 5) {
        return false;
      }
      return true;
}
  