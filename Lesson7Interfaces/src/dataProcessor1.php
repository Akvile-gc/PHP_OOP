<?php
declare(strict_types=1);

$categories = [
    'fruits' => [
        'type' => 'category',
        'items' => [
            'apple' => [
                'count' => 5,
                'price' => 0.15,
            ],
            'pear' => [
                'count' => 5,
                'price' => 0.15,
            ],
        ],
    ],
    'vegetables' => [
        'type' => 'category',
        'items' => [
            'carrot' => [
                'count' => 100,
                'price' => 0.01,
            ],
            'tomato' => [
                'count' => 45,
                'price' => 0.5,
            ],
        ],
    ],
    'seafood' => [
        'type' => 'category',
        'items' => [
            'seabass' => [
                'count' => 15,
                'price' => 5.5,
            ],
        ],
    ],
    'alcohol' => [
        'type' => 'category',
        'items' => [
            'beer_bottle' => [
                'count' => 22,
                'price' => 1.3,
            ],
            'wine_bottle' => [
                'count' => 4,
                'price' => 8,
            ],
        ],
    ],
    'milk' => [
        'type' => 'category',
        'items' => [
            'cheese' => [
                'count' => 1,
                'price' => 4.5,
            ],
            'yoghurt' => [
                'count' => 13,
                'price' => 0.99,
            ],
        ],
    ],
    'bread' => [
        'type' => 'category',
        'items' => [
            'brown_bread' => [
                'count' => 11,
                'price' => 2.1,
            ],
            'white_bread' => [
                'count' => 110,
                'price' => 1.3,
            ],
        ],
    ],
];

interface DataEncoderInterface
{
    public function encode(array $format): string;
}
class JsonEncoder implements DataEncoderInterface {
    public function encode(array $data): string
    {
        // TODO: Implement encode() method.
            return json_encode($data, JSON_PRETTY_PRINT);
    }
}

class CvsEncoder implements DataEncoderInterface{
    public function encode(array $format): string
    {
        // TODO: Implement encode() method.
        $result = 'Type,Items'.PHP_EOL;
        foreach ($format as $item) {
            $result .= $item['type'] . ',';
            $result .= count($item['items']) . ',';
            $result .= PHP_EOL;
        }
        return $result;
    }
}

interface DataOutputHandlerInterface
{
    public function output(string $data): void;
}

class TerminalOutputHandler implements DataOutputHandlerInterface {
    public function output(string $data): void {
        echo $data.PHP_EOL;
    }
}

class FileOutputHandler implements DataOutputHandlerInterface
{
    public function output(string $data): void
    {
        file_put_contents("./processedData.txt", $data, FILE_APPEND);
    }
}

class DataProcessor
{
    public function __construct(private array $data)
        {
            $this->data = $data;
        }

    public function process(DataEncoderInterface $encoder, DataOutputHandlerInterface $outputWriter): void{
        $result = $encoder->encode($this->data);
        $outputWriter->output($result);
    }
}

$jsonEncoder = new JsonEncoder();
$csvEncoder = new CvsEncoder();

$terminalWriter = new TerminalOutputHandler();
$fileWriter = new FileOutputHandler();

$dataProcessor = new DataProcessor($categories);
//$dataProcessor->process($jsonEncoder, $fileWriter);
//$dataProcessor->process($jsonEncoder, $terminalWriter);
$dataProcessor->process($csvEncoder, $fileWriter);
$dataProcessor->process($csvEncoder, $terminalWriter);


//1st
//class DataProcessor
//
//    public function __construct(private array $data)
//    {
//    }
//    public function process(string $format, string $output): void
//    {
//        if ($format === 'json'){
//            $result = json_encode($this->data, JSON_PRETTY_PRINT);
//        } elseif ($format === 'cvs'){
//            $result = 'Type,Items'.PHP_EOL;
//            foreach ($this->data as $item){
//                $result .= $item['type'] . '.';
//                $result .= count($item['items']) . '.';
//                $result .= PHP_EOL;
//            }
//        }
//
//         if ($output === 'file'){
//             file_put_contents("./processedData.$format", $result);
//         } elseif ($output === 'terminal'){
//             echo $result .PHP_EOL;
//         }

//        if ($format === 'json'){
//            $jsonSerializedData = json_encode($this->data, JSON_PRETTY_PRINT);
//            if ($output === 'file'){
//                file_put_contents('./processedData.json', $jsonSerializedData);
//            } elseif ($output === 'terminal'){
//                echo $jsonSerializedData;
//            }
//        } elseif ($format === 'xml'){
//            $xmlSerializedData = xmlrpc_encode($this->data);
//            if ($output === 'file'){
//                file_put_contents('./processedData.xml', $xmlSerializedData);
//            } elseif ($output === 'terminal'){
//                echo $xmlSerializedData;
//            }
//        }
//    }
//}


//if ($format === 'xml'){
//$xmlSerializedData = xmlrpc_encode($this->data);
//if ($output === 'file'){
//    file_put_contents('./processedData.xml', $xmlSerializedData);
//} elseif ($output === 'terminal'){
//    print_r($xmlSerializedData);
//}
//$dataProcessor = new DataProcessor($categories);
//$dataProcessor->process('json', 'file');
//$dataProcessor->process('xml', 'file');

/*
Klas?? DataProcessor suteikia mums galimyb?? u??koduoti duomenis tam tikru formatu (JSON arba XML) ir i??vesti juos ?? fail??
arba terminal??. Tai yra daroma kvie??iant metod?? 'process'.
1.1 ??gyvendinkite 'process' metodo logik?? klas??je DataProcessor
1.2 Perkelkite metodo 'process' encodinimo ir i??vesties logik?? ?? atskiras klases, kurios b??t?? susietos interfeisais.
Gal??t?? b??ti ??ie interfeisai:
- DataEncoderInterface
    - JsonEncoder
    - XmlEncoder
- DataOutputHandlerInterface
    - TerminalOutputHander
    - FileOutputHandler
Daugiau apie XML format??: https://www.w3schools.com/xml/xml_whatis.asp
*/