<?php
declare(strict_types=1);
namespace Lesson8Composer\src\ExistingInventory;
class ExistingInventoryReader
{
    public function readInfo():string
    {
        return file_get_contents('./inventory.json');
    }
}