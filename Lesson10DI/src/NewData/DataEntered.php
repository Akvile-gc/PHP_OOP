<?php

declare(strict_types=1);

namespace Lesson10DI\NewData;

class DataEntered
{
    public function __construct(protected int $id, protected int $quantity)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
