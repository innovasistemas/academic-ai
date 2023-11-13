<?php

namespace App\Classes;

class ConversionLetter
{
    private int $number;
    private string $letter;
    private array $units;
    private array $tens;
    private array $hundreds;

    public function __construct(string $num)
    {
        if ((int) $num > 0 && (int) $num < 1000000 || $num == "0") {
            $this->units = [
                'cero', 'uno', 'dos', 'tres', 'cuatro', 
                'cinco', 'seis', 'siete', 'ocho', 'nueve'
            ];
            
            $this->tens = [
                'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 
                'sesenta', 'setenta', 'ochenta', 'noventa'
            ];
            
            $this->hundreds = [
                'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 
                'seiscientos', 'setecientos', 'ochocientos', 'novecientos'
            ];
    
            $this->setNumber((int) $num);
            if ($this->number < 10) {
                $this->setLetter($this->unitsToLetter($this->number));
            } elseif ($this->number < 100) {
                $this->setLetter($this->tensToLetter($this->number));
            } elseif ($this->number < 1000) {
                $this->setLetter($this->hundredsToLetter($this->number));
            } elseif ($this->number < 10000) {
                $this->setLetter($this->thousandsToLetter($this->number));
            } elseif ($this->number < 100000) {
                $this->setLetter($this->thousandsTensToLetter($this->number));
            } elseif ($this->number < 1000000) {
                $this->setLetter($this->thousandsHundredsToLetter($this->number));
            }
        } else {
            $this->setLetter("Error");
        }
    }

    private function setNumber(int $num): void 
    {
        $this->number = $num;
    }
    
    private function setLetter(string $letters): void 
    {
        $this->letter = $letters;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getLetter(): string
    {
        return $this->letter;
    }
    
    private function unitsToLetter(int $num): string
    {
        return $this->units[$num];
    }
    
    private function tensToLetter(int $num): string
    {
        $res = $num % 10;
        $quo = (int) ($num / 10);
        $letters = $this->tens[$quo - 1];
        if ($res != 0) {
            $letters .= " y " . $this->unitsToLetter($res);
        } 
        return $letters;
    }
    
    private function hundredsToLetter(int $num): string
    {
        $res = $num % 100;
        $quo = (int) ($num / 100);
        $letters = $this->hundreds[$quo - 1];
        if ($res != 0) {
            if  ($res < 10) {
                $letters .= " " . $this->unitsToLetter($res);
            } else {
                $letters .= " " . $this->tensToLetter($res);
            }
        } 
        return $letters;
    }

    private function thousandsToLetter(int $num): string
    {
        $res = $num % 1000;
        $quo = (int) ($num / 1000);
        if ($res != 0) {
            if ($res < 100) {
                if ($res < 10 ) {
                    if ($num < 2000) {
                        $letters = "mil " . $this->unitsToLetter($res);
                    } else {
                        $letters = $this->unitsToLetter($quo) . " mil " .
                            $this->unitsToLetter($res);
                    }
                } else {
                    if ($num < 2000) {
                        $letters = "mil " . $this->tensToLetter($res);
                    } else {
                        $letters = $this->unitsToLetter($quo) . " mil " .
                            $this->tensToLetter($res);
                    }
                }
            } else {
                if ($num < 2000) {
                    $letters = "mil " . $this->hundredsToLetter($res);
                } else {
                    $letters = $this->unitsToLetter($quo) . " mil " . 
                        $this->hundredsToLetter($res);
                }
            }
        } else {
            if ($num < 2000) {
                $letters = "mil ";
            } else {
                $letters = $this->unitsToLetter($quo) . " mil";
            }
        }
        return $letters;
    }

    private function thousandsTensToLetter(int $num): string
    {
        $res = $num % 1000;
        $quo = (int) ($num / 1000);
        if ($res != 0) {
            if ($res < 100) {
                if ($res < 10) {
                    $letters = $this->tensToLetter($quo) . " mil " . 
                        $this->unitsToLetter($res);
                } else {
                    $letters = $this->tensToLetter($quo) . " mil " . 
                        $this->tensToLetter($res);
                }
            } else {
                $letters = $this->tensToLetter($quo) . " mil " . 
                    $this->hundredsToLetter($res);
            }
        } else {
            $letters = $this->tensToLetter($quo) . " mil ";
        }
        return $letters;
    }
    
    private function thousandsHundredsToLetter(int $num): string
    {
        $res = $num % 1000;
        $quo = (int) ($num / 1000);
        if ($res != 0) {
            if ($res < 100) {
                if ($res < 10) {
                    $letters = $this->hundredsToLetter($quo) . " mil " . 
                        $this->unitsToLetter($res);
                } else {
                    $letters = $this->hundredsToLetter($quo) . " mil " . 
                        $this->tensToLetter($res);
                }
            } else {
                $letters = $this->hundredsToLetter($quo) . " mil " . 
                    $this->hundredsToLetter($res);
            }
        } else {
            $letters = $this->hundredsToLetter($quo) . " mil ";
        }
        return $letters;
    }
}
