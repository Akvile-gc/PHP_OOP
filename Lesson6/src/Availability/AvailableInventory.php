<?php

declare(strict_types=1);

namespace Lesson6\Availability;
class AvailableInventory
{
    public function checkAvailability(DataEntered $data, array $inventory):void
    {
        $newId = $data->getId();
        $existingItem = null;

        foreach ($inventory as $item) {
            if ($newId === $item->getId()) {
                $existingItem = $item;
                break;
            }
        }

        if ($existingItem === null) {
            throw new Exception("product \"$newId\" is not in the inventory");
        }

        if ($data->getQuantity() > $existingItem->getQuantity()) {
            $quantity = $existingItem->getQuantity();
            throw new Exception("product \"$newId\" only has \"$quantity\" items in the inventory");
        }

    }
    public function checkAvailabilityForAll(array $queries, array $inventory):void
    {
        foreach ($queries as $query){
            $this->checkAvailability($query, $inventory);
        }
    }
}

