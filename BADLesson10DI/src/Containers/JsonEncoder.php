<?php

declare(strict_types=1);

namespace Lesson10DI\Containers;

class JsonEncoder
{
    public function encode(array $data): string
    {
        return json_encode($data);
    }
}