<?php

declare(strict_types=1);
namespace Lesson8Composer\ExistingInventory;
class InventoryItem
{
    protected int $id;
    protected string $name;
    protected int $quantity;

    public function __construct(int $id, string $name, int $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getQuantity():int
    {
        return $this->quantity;
    }
}