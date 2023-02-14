<?php

$visit_counter = 0;
$visit_history = [];

session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
//    $_SESSION['visit_history'] = $_SERVER['REQUEST_URI'];
    $_SESSION['url'] = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $visit_counter = $_SESSION['count'];
    $visit_history[] = $_SESSION['url'];
//    $visit_history[] = $_SESSION['visit_history'];
}

$encodedVisits = json_encode($visit_history, JSON_PRETTY_PRINT);
file_put_contents('./visits.json', $encodedVisits, FILE_APPEND);

echo $visit_counter;
//print_r($visit_history);


/*
Sukurkite naują sesijos kintamąjį visit_history.
Jame laikomas visų aplankytų svetainės adresų sąrašas (naudokite $_SERVER['REQUEST_URI'])
Sąrašą visuomet atvaizduokite programos išvestyje.
Išbandykite programą aplankydami skirtingus adresus (/test, /test2, /news, t.t.).

Užduotis gali neveikti jeigu nesukonfigūruotas visų adresų nukreipimas į index.php failą

 */