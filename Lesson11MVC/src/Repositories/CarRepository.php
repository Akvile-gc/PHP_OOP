<?php

declare(strict_types=1);

class CarRepository
{
    public function __construct(protected Car $car, )
    {
    }

    public function getByRegistrationId(string $registrationId): Car
    {
        return new Car();
    }

    public function getAll():array
    {


        return [

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