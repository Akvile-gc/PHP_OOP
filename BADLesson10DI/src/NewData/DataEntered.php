<?php

declare(strict_types=1);
namespace Lesson10DI\NewData;
class DataEntered
{
    public function __construct(private int $id, private int $quantity)
    {
    }

    public function getId():int {
        return $this->id;
    }

    public function getQuantity():int {
        return $this->quantity;
    }
}