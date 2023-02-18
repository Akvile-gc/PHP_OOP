<?php

declare(strict_types=1);

namespace Lesson10DI\Availability;
use Lesson10DI\NewData\DataEntered;

class AvailableInventory
{
    public function checkAvailability(DataEntered $dataEntered, array $inventory):void
    {
        $newId = $dataEntered->getId();
        $existingItem = null;

        foreach ($inventory as $item) {
            if ($newId === $item->getId()) {
                $existingItem = $item;
                break;
            }
        }

        if ($existingItem === null) {
            throw new InventoryException("product \"$newId\" is not in the inventory");
        }

        if ($dataEntered->getQuantity() > $existingItem->getQuantity()) {
            $quantity = $existingItem->getQuantity();
            throw new InventoryException("product \"$newId\" only has \"$quantity\" items in the inventory");
        }

    }
    public function checkAvailabilityForAll(array $queries, array $inventory):void
    {
        foreach ($queries as $query){
            $this->checkAvailability($query, $inventory);
        }
    }
}

