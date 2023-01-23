<?php
//1st
include '1_rectangle.php';

$rectangle = new Rectangle(1, 3);

var_dump($rectangle->calculateArea());
var_dump($rectangle->calculatePerimeter());
var_dump($rectangle->calculateDiagonal());
