<?php

declare(strict_types=1);

namespace Lesson10DI\Containers;

class App
{
    public function __construct(private DataProcessor $dataProcessor)
    {
    }

    public function run(): void
    {
        $data = ['test'];
        echo $this->dataProcessor->process($data);
    }
}