<?php

declare(strict_types=1);
namespace Lesson6\ExistingInventory;
class ExistingInventoryConverter
{
    public function convert(array $unsortedInventory):array
    {
        $existingInventory = [];

        foreach ($unsortedInventory as $unsortedItem){
            $existingInventory[] = new InventoryItem(
                $unsortedItem['product_id'],
                $unsortedItem['name'],
                $unsortedItem['quantity']
            );
        }
        return $existingInventory;
    }
}