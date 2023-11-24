<?php

class ConversionRoman
{
    private array $arrayLetters;
    private array $arrayNumbers;
    private string $romanNumber;

    public function __construct(string $num)
    {
        if ((int) $num > 0 && (int) $num < 4000) {
            $this->arrayLetters = [
                'I', 'IV', 'V', 'IX', 'X', 'XL', 'L', 
                'XC', 'C', 'CD', 'D', 'CM', 'M'
            ];
            
            $this->arrayNumbers = [
                1, 4, 5, 9, 10, 40, 50, 90, 
                100, 400, 500, 900, 1000
            ];
            $this->setRomanNumber($this->convertNumber((int) $num));
        } else {
            $this->setRomanNumber("Error");
        }
   }

   private function convertNumber(int $num): string
   {
       $letter = "";
       for ($i = count($this->arrayNumbers) - 1; $i >= 0; $i--) {
           $quo = (int) ($num / $this->arrayNumbers[$i]);  
           $letter .= str_repeat($this->arrayLetters[$i], $quo);
           $num = $num % $this->arrayNumbers[$i];  
       }
       return $letter;
   }


    private function setRomanNumber(string $letter): void
    {
        $this->romanNumber = $letter;
    }

    public function getRomanNumber(): string
    {
        return $this->romanNumber;
    }
}


$num = readline("Ingrese número: ");
$objLetters = new ConversionRoman($num);
echo "Número romano: {$objLetters->getRomanNumber()}";
