<?php

declare(strict_types=1);

use Lesson11MVC\Containers\DIContainer;

class Router
{
    public function __construct(protected \Lesson11MVC\Framework\DIContainer $DIContainer)
    {
    }

    public function process(string $path, string $method)
    {
        $carController = $this->DIContainer->get(CarController::class);

        if($path === '/list' && $method === 'GET'){
            $carController->list();
        } elseif ($path === '/details' && $method === 'GET') {
            $carController->details();
        }
    }
}

/*Realizuojame Router klasę.
Pridėkite metodą:
  process() - nuskaito užklausos URL, metodą (GET/POST/etc.) ir siunčiamus duomenis (pradžioje įgyvendinsime tik GET užklausas be duomenų).
    Toliau pagal adresą ir metodą nusprendžia kurį kontrolerį naudoti ir iškviečia kontrolerio atitinkamą metodą.

Router klasė per konstruktorių reikalauja DIContainer objekto
Kontroleris turi būti kuriamas ne savarankiškai su 'new' raktažodžiu, o gaunamas iš DIContainer