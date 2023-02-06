<?php
declare(strict_types=1);
namespace Lesson6;

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
        catch (Exception $e){
            $this->logger->logMessage($e->getMessage());
        }
    }
}