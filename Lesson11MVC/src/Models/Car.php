<?php

declare(strict_types=1);

namespace Lesson11MVC\Models;
class Car
{
    public function __construct(
        private string $registrationId,
        private string $manufacturer,
        private string $model,
        private int $year)
    {
    }

    public function getRegistrationId():string
    {
        return $this->registrationId;
    }

    public function getManufacturer():string
    {
        return $this->manufacturer;
    }

    public function getModel():string
    {
        return $this->model;
    }

    public function getYear():int
    {
        return $this->year;
    }
}

/*
1.3
Papildoma Car klasė
Pridėkite privačius parametrus:
  registrationId (string)
  manufacturer (string)
  model (string)
  year (int)

Kadangi parametrai privatūs, duomenims perduoti į išorę aprašykite getter metodus (getRegistrationId, getManufacturer, t.t.)
 */