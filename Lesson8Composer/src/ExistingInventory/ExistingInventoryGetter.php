<?php

declare(strict_types=1);

namespace Lesson8Composer\ExistingInventory;

use Lesson8Composer\Utils\JsonCoder;

class ExistingInventoryGetter
{
    protected ExistingInventoryReader $reader;
    protected JsonCoder $coder;
    protected ExistingInventoryConverter $converter;

    public function __construct(ExistingInventoryReader $reader, JsonCoder $coder, ExistingInventoryConverter $converter)
    {
        $this->reader = $reader;
        $this->coder = $coder;
        $this->converter = $converter;
    }

//    /**
//     * @return InventoryItem[]
//     */

    public function getExistingInventory(): array
    {
        $existingInventory = $this->reader->readInfo();
        $unsortedInventory = $this->coder->decodeJson($existingInventory);
        return $this->converter->convert($unsortedInventory);
    }
}
