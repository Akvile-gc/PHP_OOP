<?php

declare(strict_types=1);

//spl_autoload_register(function ($className) {
//    $withoutProject = preg_replace('/^Lesson6\\\\/', '', $className);
//    $filePath = str_replace('\\', '/', $withoutProject) . '.php';
//    require $filePath;
//});


require 'vendor/autoload.php';

//spl_autoload_register(function ($className){
//    $classWithoutPrefix=str_replace('Lesson10DI-wrong\\', '', $className);
//    require $classWithoutPrefix.'.php';
//});

use Lesson10DI\Availability\AvailableInventory;
use Lesson10DI\ExistingInventory\ExistingInventoryConverter;
use Lesson10DI\ExistingInventory\ExistingInventoryGetter;
use Lesson10DI\ExistingInventory\ExistingInventoryReader;
use Lesson10DI\Logging\Logger;
use Lesson10DI\NewData\DataEnteredSplit;
use Lesson10DI\ProductAvailabilityApp;
use Lesson10DI\Utils\JsonCoder;

$split = new DataEnteredSplit();

$inventoryReader = new ExistingInventoryReader();
$jsonCoder = new JsonCoder();
$converter = new ExistingInventoryConverter();
$inventoryGetter = new ExistingInventoryGetter($inventoryReader, $jsonCoder, $converter);

$availability = new AvailableInventory();
$logger = new Logger();

$app = new ProductAvailabilityApp($split, $inventoryGetter, $availability, $logger);
$app->execute($argv);

//
//use Lesson10DI-wrong\Containers\Container;
//use Lesson10DI-wrong\Containers\App;
//
//$container = new Container();
//$container->set(
//    JsonEncoder::class,
//    function (Container $container) {
//        return new JsonEncoder();
//    }
//);
//
//$container->set(
//    DataProcessor::class,
//    function (Container $container) {
//
//        return new DataProcessor($container->get(JsonEncoder::class));
//    }
//);
//
//$app = new App($container->get(DataProcessor::class));
//$app->run();

/*
2.1 Parašykite įrankį inventoriaus tikrinimui. Inventorių rasite faile "./inventory.json"
Programa turėtų veikti paduodant jai produkto id ir kiekio poras, atskirtas dvitaškiu. Pačios poros atskirtos kableliais:
Pvz.: php -f 2_inventory_checker.php "1:3,2:2,4:1" - reiškia, kad mes norime patikrinti, ar inventoriuje egzistuoja:
- produktas, kurio id yra 1, o kiekis 3
- produktas, kurio id yra 2, o kiekis 2
- produktas, kurio id yra 4, o kiekis 1
Jeigu paduotas produkto id neegzistuoja, arba nepakanka kiekio, į terminalą išspausdinkite pranešimą:
- product "15" is not in the inventory
- product "5" only has 0 items in the inventory
Pakaks spausdinti tik vieną klaidą apie inventoriaus neatitikimus, net jeigu tikrinami keli nevalidūs produktai.
Šalia klaidos pranešimo spausdinimo taip pat, įrašykite pranešimą apie šį įvykį į log'ą (log.txt)
Log'o įrašo formatas: 2020-01-01 15:15:15 product "15" is not in the inventory
Užduočiai įgyvendinti panaudokite exception'us.
Klasė, tikrinanti inventorių, turi mesti exception'us, o ją kviečiantis kodas - gaudyti. Naudokite savo custom
exception'o klasę (pvz.: InventoryException).
Programos kvietimo pavyzdys:
php -f 2_inventory_checker.php "1:3,2:2,5:1"
product "5" only has 0 items in the inventory
php -f 2_inventory_checker.php "1:3,2:2"
all products have the requested quantity in stock
*/

/*
2.2 Patobulinkite 2.1 užduoties įrankį - pridėkite inputo validatorių (atskira klasė)
Šis validatorius turi užfiksuoti, kad šie inputai nėra validūs:
- "q:3,2:2,5:1"
- "-:3,2:2,5:1"
- "3,2:2,5:1"
Kai užfiksuojamas nevalidus inputas, programa turi į komandinę eilutę išspausdinti šį pranešimą:
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity
Klaidingo inputo atveju į log'ą rašyti pranešimo nereikia.
Svarbu: Abi klasės (inventoriy checkeris ir input validatorius) turi būti kviečiami tame pačiame "try" bloke.
Naudokite savo custom exception'o klasę (pvz.: InputValidationException).
Programos kvietimo pavyzdys:
php -f 2_inventory_checker.php "3,2:2,5:1"
Invalid input "3,2:2,5:1". Format: id:quantity,id:quantity
*/
