<?php
declare(strict_types=1);
namespace Lesson10DI\Utils;
class JsonCoder
{
    public function decodeJson(string $input):array {
        return json_decode($input, true);
    }
}