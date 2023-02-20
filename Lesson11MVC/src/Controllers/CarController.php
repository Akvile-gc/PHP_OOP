<?php

declare(strict_types=1);

namespace Lesson11MVC\Controllers;

use Lesson11MVC\Repositories\CarRepository;
class CarController
{
    public function __construct(protected CarRepository $carRepository)
    {
    }

    public function list():void
    {
        $carList = $this->carRepository->getAll();
        require "../views/car/list.php";
    }

    public function details(string $registrationId)
    {
        $carDetails = $this->carRepository->getByRegistrationId($registrationId);

        require "../views/car/details.php";


//        if ($registrationId === )
//        $registrationId = $this->carRepository->getByRegistrationId();

    }

}

/*
1.4
Realizuojame pirmąjį kontrolerį
Kontroleris apdoros modelį Car

Sukurkite metodą:
  list() - grąžina visus automobilius iš repozitorijos
  details() - repozitorijai perduoda paieškos pagal registrationId veiksmą

Abu metodai modelio duomenis išsaugo kintamąjame, tuomet su 'require' raktažodžiu iškviečia atitinkamą views/ failą.
view faile kintamasis bus prieinamas tuo pačiu pavadinimu
 */