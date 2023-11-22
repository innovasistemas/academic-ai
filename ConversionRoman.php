<?php

class ConversionRoman
{
    private array $arrayLetters;
    private array $arrayNumbers;
    private string $romanNumber;

    public function __construct($num)
    {
        $this->arrayLetters = [
            'I', 'IV', 'V', 'IX', 'X', 'XL', 'L', 
            'XC', 'C', 'CD', 'D', 'CM', 'M'
        ];
        
        $this->arrayNumbers = [
            1, 4, 5, 9, 10, 40, 50, 90, 
            100, 400, 500, 900, 1000
        ];

        $this->setRomanNumber($this->convertNumber($num));
   }

   private function convertNumber($num): string
   {
       $letter = "";
       for ($i = count($this->arrayNumbers) - 1; $i >= 0; $i--) {
           $quo = (int) ($num / $this->arrayNumbers[$i]);  
           $letter .= str_repeat($this->arrayLetters[$i], $quo);
           $num = $num % $this->arrayNumbers[$i];  
       }
       return $letter;
   }


    private function setRomanNumber($letter): void
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
