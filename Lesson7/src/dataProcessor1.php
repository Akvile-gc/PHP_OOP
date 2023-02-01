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

interface DataProcessor
{
    public function process(DataEncoderInterface $format, DataOutputHandlerInterface $output): void;

}
interface DataEncoderInterface
{
    public function encode(string $format): void;
}

interface DataOutputHandlerInterface
{
    public function output(string $output): void;
}

class JsonDataProcessor implements DataProcessor
//class DataProcessor
{
    public function __construct(private array $data)
    {
    }

    public function process(DataEncoderInterface $format, DataOutputHandlerInterface $output): void
    {
        $format->encode();
        if ($format === 'json'){
            $jsonSerializedData = json_encode($this->data, JSON_PRETTY_PRINT);
            if ($output === 'file'){
                file_put_contents('./processedData.json', $jsonSerializedData);
            } elseif ($output === 'terminal'){
                print_r($jsonSerializedData);
            }
        }
    }

//    public function process(string $format, string $output): void
//    {
//        if ($format === 'json'){
//            $jsonSerializedData = json_encode($this->data, JSON_PRETTY_PRINT);
//            if ($output === 'file'){
//                file_put_contents('./processedData.json', $jsonSerializedData);
//            } elseif ($output === 'terminal'){
//                print_r($jsonSerializedData);
//            }
//        } elseif ($format === 'xml'){
//            $xmlSerializedData = xmlrpc_encode($this->data);
//            if ($output === 'file'){
//                file_put_contents('./processedData.xml', $xmlSerializedData);
//            } elseif ($output === 'terminal'){
//                print_r($xmlSerializedData);
//            }
//        }
//
//        // encode data to $format (JSON or XML)
//        // output it to $output (file or terminal)
//    }
}


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
Klasė DataProcessor suteikia mums galimybę užkoduoti duomenis tam tikru formatu (JSON arba XML) ir išvesti juos į failą
arba terminalą. Tai yra daroma kviečiant metodą 'process'.
1.1 Įgyvendinkite 'process' metodo logiką klasėje DataProcessor
1.2 Perkelkite metodo 'process' encodinimo ir išvesties logiką į atskiras klases, kurios būtų susietos interfeisais.
Galėtų būti šie interfeisai:
- DataEncoderInterface
    - JsonEncoder
    - XmlEncoder
- DataOutputHandlerInterface
    - TerminalOutputHander
    - FileOutputHandler
Daugiau apie XML formatą: https://www.w3schools.com/xml/xml_whatis.asp
*/