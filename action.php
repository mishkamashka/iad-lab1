<?php
    // start measuring script time
    $begin = microtime();
if (isFormValid()) {
    // init some variables
    $result = "";
    $line = "";
    $x = (string)$_GET['coordinate_x'];
    $y = (string)$_GET['coordinate_y'];
    $radius = (string)$_GET['radius'];
    // complete answer
    $answer = 
    '<div class="row">' 
        . '<div class="cell" data-title="X">' . $x . '</div>' 
        . '<div class="cell" data-title="Y">' . $y . '</div>' 
        . '<div class="cell" data-title="R">' . $radius . '</div>'
        . '<div class="cell" data-title="Result">' . (pointBelongToArea($x, floatval($y), $radius) ? 'success' : 'failure') . '</div>' 
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
$end = microtime();
$time = ($end - $begin) * 100000;
if (isset($time)) {
    echo "<p> Время работы скрипта: " . round($time, 2) . " микросекунд</p>";
}
echo "<p>Текущее время: " . date("G:i:s") . "</p>";
// return answer on page
include 'index.php';

function pointBelongToArea($x, $y, $radius)
{
    return ((($x <= $radius) && ($x >= 0)) && (($y <= $radius/2.0) && ($y >= 0)) ||
        (($x >= -$radius / 2.0) && ($x <= 0) && ($y >= -$radius/2.0) && ($y <= 0) && (pow($x, 2) + pow($y, 2) <= (pow($radius, 2))) ) ||
        (($x >= -$radius) && ($x <= 0) && ($y <= $radius / 2.0) && ($y >= 0) && ($y <= $x + $radius / 2.0)));
}

function isFormValid() {
      if (!isNumeric(y) || y < -3 || y > 5) {
        alert("Значение координаты У должно быть числом в диапазоне [-3..5]");
        return false;
      }
      return true;
  }

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
  