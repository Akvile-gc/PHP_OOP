<?php

declare(strict_types=1);

namespace Lesson10DI\ExistingInventory;

class InventoryItem
{
    public function __construct(protected int $id, protected string $name, protected int $quantity)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
