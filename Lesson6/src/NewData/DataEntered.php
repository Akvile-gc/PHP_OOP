<?php

declare(strict_types=1);
namespace Lesson6\src\NewData;
class DataEntered
{
    protected int $id;
    protected int $quantity;
    public function __construct(int $id, int $quantity)
    {
        $this->id = $id;
        $this->quantity = $quantity;
    }

    public function getId():int {
        return $this->id;
    }

    public function getQuantity():int {
        return $this->quantity;
    }
}