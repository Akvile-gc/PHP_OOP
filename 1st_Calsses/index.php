<?php
//1st
include '1_rectangle.php';

$rectangle = new Rectangle(1, 3);

var_dump($rectangle->calculateArea());
var_dump($rectangle->calculatePerimeter());
var_dump($rectangle->calculateDiagonal());

include '2_number_calculator.php';

//2nd
$numberCalculator = new NumberCalculator();

echo $numberCalculator->calculateSum() . PHP_EOL; // 0
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(7);
echo $numberCalculator->calculateSum() . PHP_EOL; // 12
echo $numberCalculator->calculateProduct() . PHP_EOL;
echo $numberCalculator->calculateAverage() . PHP_EOL;
