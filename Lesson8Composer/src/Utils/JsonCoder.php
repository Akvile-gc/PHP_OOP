<?php

declare(strict_types=1);

namespace Lesson8Composer\Utils;

class JsonCoder
{
    public function decodeJson(string $input): array
    {
        return json_decode($input, true);
    }

    public function encodeJson(string $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}
