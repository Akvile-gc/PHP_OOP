<?php
declare(strict_types=1);
namespace Lesson10DI;

use Lesson10DI\src\Availability\AvailableInventory;
use Lesson10DI\src\Availability\InventoryException;
use Lesson10DI\src\ExistingInventory\ExistingInventoryGetter;
use Lesson10DI\src\Logging\Logger;
use Lesson10DI\src\NewData\DataEnteredSplit;

class ProductAvailabilityApp
{
    public function __construct(
        protected DataEnteredSplit $dataEnteredSplit,
        protected ExistingInventoryGetter $existingInventoryGetter,
        protected AvailableInventory $availableInventory,
        protected Logger $logger
    )
    {}

    public function execute(array $arguments)
    {
        $queries = $this->dataEnteredSplit->explode($arguments[1]);
        $inventory = $this->existingInventoryGetter->getExistingInventory();

        try {
            $this->availableInventory->checkAvailabilityForAll($queries, $inventory);
            $this->logger->logMessage('All products have the requested quantity in stock');
        }
        catch (InventoryException $e){
            $this->logger->logMessage($e->getMessage());
        }
    }
}