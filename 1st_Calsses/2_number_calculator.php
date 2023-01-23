<?php
declare(strict_types=1);
class NumberCalculator {
    private int $accumulatorSum = 0;
    private int $accumulatorProduct = 1;
    private int $numberCount = 0;
    public function addNumber(int $number):void {
        $this->accumulatorSum += $number;
        $this->accumulatorProduct *= $number;
        $this->numberCount++;
    }
    public function calculateSum():int {
        return $this->accumulatorSum;
    }
    public function calculateProduct():int {
        return $this->accumulatorProduct;
    }

    public function calculateAverage():int {
        return $this->accumulatorSum / $this->numberCount;
    }
}
/*
Sukurkite klasę NumberCalculator, kuri leistų atlikti įvairius skaičiavimo veiksmus. Ši klasė neturės konstruktoriaus.
Metodai:
- addNumber - metodas priims "int" tipo argumentą, return tipas bus "void"
- calculateSum - metodas grąžins "int" tipo reikšmę, argumentų neturės
- calculateProduct - product liet. sandauga. Metodas grąžins "int" tipo reikšmę, argumentų neturės
- calculateAverage - suapvalinkite iki sveiko skaičiaus, į viršų. Metodas grąžins "int" tipo reikšmę, argumentų neturės
Nepamirškite sudėti argumentų bei return tipų.
Kodo kvietimo pavyzdys:
$numberCalculator = new NumberCalculator();
echo $numberCalculator->calculateSum(); // 0
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(7);
echo $numberCalculator->calculateSum(); // 12
*/
