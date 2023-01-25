<?php

declare(strict_types=1);

//include 'CodeDataService.php';
//include 'StoreDataService.php';
class Todo
{
    private CodeDataService $codeDataService;
    private StoreDataService $storeDataService;
    public function __construct(CodeDataService $codeDataService, StoreDataService $storeDataService)
    {
        $this->storeDataService = $storeDataService;
        $this->codeDataService = $codeDataService;
    }

    public function add(string $todoItem):void {
        $getData = $this->storeDataService->getData();
        $decode = $this->codeDataService->decode($getData);
        $decode[] = $todoItem;
        $encode = $this->codeDataService->encode($decode);
        $this->storeDataService->putData($encode);
    }

    public function list():array
    {
        $getData = $this->storeDataService->getData();
        $decode = $this->codeDataService->decode($getData);
        return $decode;
    }

    public function complete(int $id):void
    {
        $getData = $this->storeDataService->getData();
        $decode = $this->codeDataService->decode($getData);
        $decode[$id]->done = true;
        $encode = $this->codeDataService->encode($decode);
        $this->storeDataService->putData($encode);
    }

}

/*
Sukurkite paprastą todo aplikaciją. Naudokite objektinį programavimą. Aplikacija turi turėti 3 funkcijas:
- add - pridėti naują todo
- list - atvaizduoti visus todo
- complete - pažymėti kažkurį todo kaip padarytą. Padarytus todo galima arba trinti, arba pridėti požymį "completed"
Aplikacijos kvietimo pavyzdžiai:
------------------------------------------------------------------------
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