<?php
class StoreDataService {
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }
    public function putData(string $content): string
    {
        return file_put_contents($this->fileName, $content, FILE_APPEND);
    }
    public function getData(): string
    {
        return file_get_contents($this->fileName);
    }
}

//$service = new StoreDataService('./test.txt');
//$service->putData('testing');
//var_dump($service->getData());