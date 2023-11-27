<?php

namespace App\Classes;

class ReturnMoney
{
    private array $arrayCurrency;
    private array $response;

    public function __construct(string $num)
    {
        if ((int) $num > 0 || $num == '0') {
            $this->arrayCurrency = [
                100000, 50000, 20000, 10000, 5000, 
                2000, 1000, 500, 200, 100, 50
            ];
            $this->setDenominations((float) $num);
        } else {
            $this->response['error'] = 1;
        }
    }

    private function setDenominations(float $number): void
    {
        $letter = "| ";
        $num = (int) $number;
        $value = 0;
        for ($i = 0; $i < count($this->arrayCurrency); $i++) {
            $quo = (int) ($num / $this->arrayCurrency[$i]);  
            $value += $quo * $this->arrayCurrency[$i];
            $letter .= $quo != 0 ? "{$this->arrayCurrency[$i]}: $quo | " : "";
            $num = $num %  $this->arrayCurrency[$i];  
        }

        $this->response['adjustment'] = 
            $this->arrayCurrency[count($this->arrayCurrency) - 1];
        if ($number % $this->response['adjustment'] == 0) {
            $this->response['adjustment'] = 0;
        } 
        $this->response['value'] = $value;
        $this->response['money'] = $value + $this->response['adjustment'];
        $this->response['loss'] = $this->response['money'] - $number;
        $this->response['difference'] = $number - $value;
        $this->response['letter'] = $letter;
        $this->response['error'] = 0;
    }

    public function getDenominations(): array
    {
        return $this->response;
    }
}
