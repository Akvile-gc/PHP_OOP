<?php

declare(strict_types=1);
namespace Lesson8Composer\src\NewData;

class DataEnteredSplit
{
    public function explode(string $input):array
    {
        if ($input == '')
            return [];

        $inputItems = explode(',', $input);
        $enteredData = [];

        foreach ($inputItems as $item){
            $unsortedData = explode(':', $item);
            $id = (int)$unsortedData[0];
            $quantity = (int)$unsortedData[1];
            $newData = new DataEntered($id, $quantity);
            $enteredData[] = $newData;
        }

    return $enteredData;
    }
}

//$parser = new DataEnteredSplit();
//print_r($parser->explode('1:2,5:3'));