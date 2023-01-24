<?php
class CodeDataService
{
    public function encode(array $todoItems):string {
        return json_encode($todoItems, JSON_PRETTY_PRINT);
    }
    public function decode(string $todoItem):array {
        return json_decode($todoItem, true);
    }
}