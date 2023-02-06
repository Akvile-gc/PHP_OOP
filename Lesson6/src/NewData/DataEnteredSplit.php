<?php

declare(strict_types=1);
namespace Lesson6\NewData;

class DataEnteredSplit
{
    public function explode(string $input):array
    {
        if ($input === '')
            return [];

        $inputItems = explode(',', $input);
        $enteredData = [];

        foreach ($inputItems as $item){
            $unsortedData = explode(':', $item);
            $newData = new DataEntered((int)$unsortedData[0], (int)$unsortedData[1]);
            $enteredData[] = $newData;
        }

    return $enteredData;
    }
}

//$parser = new DataEnteredSplit();
//print_r($parser->explode('1:2,5:3'));