<?php

class ReturnMoney
{
    private array $arrayCurrency;
    private string $denominations;
    private int $newReturnMoney;

    public function __construct(string $num)
    {
        if ((int) $num >= 0) {
            $this->arrayCurrency = [
                100000, 50000, 20000, 10000, 5000, 
                2000, 1000, 500, 200, 100, 50
            ];
            $this->setDenominations($this->denominationCurrency((float) $num));
        } else {
            $this->setDenominations("Error");
        }
    }

    private function denominationCurrency(float $number): string
    {
        $letter = "";
        $num = (int) $number;
        $decimals = $number - $num;
        $value = 0;
        echo "Decimales: $decimals \n";
        for ($i = 0; $i < count($this->arrayCurrency); $i++) {
            $quo = (int) ($num / $this->arrayCurrency[$i]);  
            $value += $quo * $this->arrayCurrency[$i];
            $letter .= $quo != 0 ? "{$this->arrayCurrency[$i]}: $quo \n" : "";
            $num = $num %  $this->arrayCurrency[$i];  
        }
        $adjustment = $this->arrayCurrency[count($this->arrayCurrency) - 1];
        if ($number % $adjustment == 0) {
            $adjustment = 0;
        } 
        $money =  $value + $adjustment;
        $loss = $money - $number;
        echo "Devuelta + ajuste: $value + $adjustment = $money \n";
        echo "Pérdida: $loss \n";
        $difference = $number - $value;
        echo "Diferencia valor y devuelta calculada: $difference \n";
        return $letter;
    }


    private function setDenominations(string $letter): void
    {
        $this->denominations = $letter;
    }

    public function getDenominations(): string
    {
        return $this->denominations;
    }
}


$num = readline("Ingrese número: ");
$objLetters = new ReturnMoney($num);
echo "Devuelta: \n{$objLetters->getDenominations()}";
