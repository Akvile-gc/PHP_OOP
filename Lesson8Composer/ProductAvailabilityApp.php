<?php
declare(strict_types=1);
namespace Lesson8Composer;

use Lesson8Composer\src\Availability\AvailableInventory;
use Lesson8Composer\src\Availability\InventoryException;
use Lesson8Composer\src\ExistingInventory\ExistingInventoryGetter;
use Lesson8Composer\src\Logging\Logger;
use Lesson8Composer\src\NewData\DataEnteredSplit;

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