<?php
//1st
include '1_rectangle.php';

$rectangle = new Rectangle(1, 3);

//var_dump($rectangle->calculateArea());
//var_dump($rectangle->calculatePerimeter());
//var_dump($rectangle->calculateDiagonal());

include '2_number_calculator.php';

//2nd
$numberCalculator = new NumberCalculator();
//
//echo $numberCalculator->calculateSum() . PHP_EOL; // 0
//$numberCalculator->addNumber(5);
//$numberCalculator->addNumber(7);
//echo $numberCalculator->calculateSum() . PHP_EOL; // 12
//echo $numberCalculator->calculateProduct() . PHP_EOL;
//echo $numberCalculator->calculateAverage() . PHP_EOL;

//4th
require './todo/todoService.php';
require './todo/CodeDataService.php';
require './todo/StoreDataService.php';

$storeDataService = new StoreDataService('./todo/test.txt');
$codeDataService = new CodeDataService();
$todo = new Todo($codeDataService, $storeDataService);
if (count($argv) == 1){
    echo 'Provide one of the options: add, list or complete' . PHP_EOL;
    exit(1);
}

$operation = $argv[1];
if ($operation == 'add'){
    $todoAll = $todo->add('hello');
}

if ($operation == 'list'){
    $todoAll = $todo->list();
    foreach ($todoAll as $id => $todo){
        echo '****' . PHP_EOL;
        echo "id: $id" . PHP_EOL;
        echo $todo['task'] . PHP_EOL;
    }
}
/* ------------------------------------------------------------------------
php -f todoService.php add "nuplauti automobilų" "2022-03-29 15:00"
todo added!
------------------------------------------------------------------------
php -f todoService.php list
****
id: 1
nuplauti automobili
2022-03-29 15:00
------------------------------------------------------------------------
php -f todoService.php add "apsilankymas pas kirpeją" "2022-04-15 12:00"
todo added!
------------------------------------------------------------------------
php -f todoService.php list
****
id: 1
nuplauti automobilų
2022-03-29 15:00
****
id: 2
apsilankymas pas kirpeją
2022-04-15 12:00
------------------------------------------------------------------------
php -f todoService.php complete 1
todo completed!
------------------------------------------------------------------------
*/