<?php

declare(strict_types=1);

class CarRepository
{

    public function getByRegistrationId(string $registrationId): Car
    {
        return new Car();
    }

    public function getAll():array
    {
        return [
//          new Car('ABC123', 'Toyota', 'Yaris', 2005),
//          new Car('ABC000', 'Kia', 'Red', 2020),
//          new Car('ABC123', 'VW', 'Jeta', 2010),
        ];

        //reikia gra=inti viska is failo

    }

}

/*Aprašome repozitoriją CarRepository
Kadangi tai netikra klasė (neturime iš kur nuskaityti duomenų), tai metodai grąžina
objektus Car su jūsų sugalvotais duomenimis.

Metodai:
  getByRegistrationId() - grąžina automobilį pagal registrationId
  getAll() - grąžina visus automobilius