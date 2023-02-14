<?php

declare(strict_types=1);
namespace Lesson10DI\src\ExistingInventory;
use Lesson10DI\src\Utils\JsonCoder;

class ExistingInventoryGetter
{
    public function __construct(
        private ExistingInventoryReader $existingInventoryReader,
        private JsonCoder $jsonCoder,
        private ExistingInventoryConverter $existingInventoryConverter)
    {
    }

//    /**
//     * @return InventoryItem[]
//     */

    public function getExistingInventory():array
    {
        $existingInventory = $this->existingInventoryReader->readInfo();
        $unsortedInventory = $this->jsonCoder->decodeJson($existingInventory);
        return $this->existingInventoryConverter->convert($unsortedInventory);
    }
}