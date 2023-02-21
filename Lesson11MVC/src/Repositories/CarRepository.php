<?php

declare(strict_types=1);

namespace Lesson11MVC\Repositories;

use Lesson11MVC\Models\Car;
class CarRepository
{
//    public function __construct(protected Car $car, )
//    {
//    }

//    public function getByRegistrationId(string $registrationId): Car
//    {
//        return new Car();
//    }

    public function getAll():array
    {
        return [
            new Car('0', 'Toyota', 'Yaris', 2002),
            new Car('1', 'Kia', 'Red', 2020),
            new Car('2', 'VW', 'Jeta', 2015),
        ];
    }
}

/*
1.5
Aprašome repozitoriją CarRepository
Kadangi tai netikra klasė (neturime iš kur nuskaityti duomenų), tai metodai grąžina
objektus Car su jūsų sugalvotais duomenimis.

Metodai:
  getByRegistrationId() - grąžina automobilį pagal registrationId
  getAll() - grąžina visus automobilius
 */