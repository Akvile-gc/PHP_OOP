<?php
declare(strict_types=1);
namespace Lesson10DI\src\ExistingInventory;
class ExistingInventoryReader
{
    public function readInfo():string
    {
        return file_get_contents('./inventory.json');
    }
}