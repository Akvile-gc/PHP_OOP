<?php
declare(strict_types=1);
namespace Lesson6;

use Lesson6\Availability\AvailableInventory;
use Lesson6\Availability\InventoryException;
use Lesson6\ExistingInventory\ExistingInventoryGetter;
use Lesson6\Logging\Logger;
use Lesson6\NewData\DataEnteredSplit;

class ProductAvailabilityApp
{
    public function __construct(
        protected DataEnteredSplit $splitData,
        protected ExistingInventoryGetter $getInventory,
        protected AvailableInventory $availability,
        protected Logger $logger
    )
    {}

    public function execute(array $arguments)
    {
        $queries = $this->splitData->explode($arguments[1]);
        $inventory = $this->getInventory->getExistingInventory();

        try {
            $this->availability->checkAvailabilityForAll($queries, $inventory);
            $this->logger->logMessage('All products have the requested quantity in stock');
        }
        catch (InventoryException $e){
            $this->logger->logMessage($e->getMessage());
        }
    }
}