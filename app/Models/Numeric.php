<?php

namespace App\Models;

class Numeric
{
    private array $digitHex;


    public function __construct()
    {
        $this->digitHex = [
            'A' => '10',
            'B' => '11',
            'C' => '12',
            'D' => '13',
            'E' => '14',
            'F' => '15'
        ];
    }


    public function base10ToN($number, $base): string
    {
        $div = $number;
        $stringNumber = $number == 0 ? "0" : "";
        while ($div > 0) {
            $res = $div % $base;
            $res = $res > 9 ? array_search($res, $this->digitHex) : $res;
            $div = (int)($div / $base);
            $stringNumber = $res . $stringNumber;
        }
        return $stringNumber;
    }


    public function baseNTo10($stringNumber, $base): int
    {
        $sum = 0;
        $n = strlen($stringNumber);
        for ($i = 0; $i < $n; $i++) {
            $digit = strtoupper(substr($stringNumber, $i, 1));
            $digit = is_numeric($digit) ? $digit : $this->digitHex[$digit];
            $sum += $digit * pow($base, $n - $i - 1);
        }
        return $sum;
    }


    public function conversionColumns($matrix): array
    {
        for ($i = 0; $i < 16; $i++) {
            $matrix[$i][4] = $i > 7 ? $this->base10ToN($i, 8) : (string) $i;
            $matrix[$i][5] = (string) $i;
            $matrix[$i][6] = $i > 9 ? $this->base10ToN($i, 16) : (string) $i;
        }
        return $matrix;
    }


    public function generateConversionTable($matrix): string
    {
        $tableBinary = "
            <div class='table-responsive'>
                <table class='table table-hover table-bordered border-info text-center'>
                    <thead>
                        <tr>
                            <th colspan='4'>Binario</th>
                            <th>Octal</th>
                            <th>Decimal</th>
                            <th>Hexadecimal</th>
                        </tr>
                    </thead>
                    </tbody>
        ";
        
        for ($i = 0; $i < 16; $i++) {
            $tableBinary .= "<tr>";
            for ($j = 0; $j < 7; $j++) {
                // $background = $j == 5 ? "#17a2b8" : "";
                $style = $j == 5 ? "background: #17a2b8; color: #FFF;" : "";
                $tableBinary .= "<td style='$style'>{$matrix[$i][$j]}</td>";
                // $tableBinary .= "<td style='background: $background;'>{$matrix[$i][$j]}</td>";
            }
            $tableBinary .= "</tr>";
        }
        $tableBinary .= "</tbody>";
        $tableBinary .= "</table>";
        $tableBinary .= "</div>";
        return $tableBinary;
    }


    public function abs(float $n): float
    {
        return $n >= 0 ? $n : -$n;
    }

    public function inv(float $n): string
    {
        return $n != 0 ? (string) (1 / $n) : "Error. División por 0";
    }

    public function sum(int $n): int
    {
        return $n * ($n + 1) / 2;
    }

    public function factorial(int $n): float
    {
        $f = 1;
        for ($i = 1; $i <= $n; $i++) {
            $f *= $i;
        }
        return $f;
    }

    public function prime(int $n): int
    {
        $sw = true;
        if ($n != 2) {
            if ($n % 2 != 0) {
                $i = 3;
                while ($i <= $n ** 0.5 && $sw) {
                    if ($n % $i == 0) {
                        $sw = false;
                    } else {
                        $i += 2;
                    }
                }
            } else {
                $sw = false;
            }
        }
        return $sw;
    }

    public function perfect($n): int
    {
        $sum = 0;
        for ($i = 1; $i <= $n / 2; $i++) {
            if ($n % $i == 0) {
                $sum += $i;
            }
        }
        $sw = $sum == $n ? true : false;
        return $sw;
    }

    public function even($n): bool
    {
        $k = 0;
        $sw = false;
        while ($k <= $n && !$sw) {
            if (2 * $k == $n) {
                $sw = true;
            } else {
                $k++;
            }
        }
        return $sw;
    }

    public function fibonacci($n): string
    {
        $fib1 = 1;
        $fib2 = 1;
        $fib3 = $fib1 + $fib2;
        $strFib = "$fib1, $fib2, ";
        while ($fib3 <= $n) {
            $strFib .= "$fib3, ";
            $fib1 = $fib2;
            $fib2 = $fib3;
            $fib3 = $fib1 + $fib2;
        } 
        return substr($strFib, 0, strlen($strFib) - 2);
    }

    public function truncDecimals(float $number, int $nd): float
    {
        $number2 = abs($number);
        $diff = $number2 - (int) $number2;
        $roundDecInt = $diff * 10 ** ($nd + 1);
        $lastDigit = (int) $roundDecInt % 10;
        $divRound = (int) $roundDecInt / 10;
        if ($lastDigit > 4) {
            $divRound++;
        }
        $divRoundDec = (int) $divRound / 10 ** $nd;
        return $number >= 0 ? 
            ((int) $number2 + $divRoundDec) : -((int) $number2 + $divRoundDec);
    }

    public function pi(): float
    {
        $sum = 0;
        for ($n = 0; $n <= 3000000; $n++) {
            $sum += pow(-1, $n) / (2 * $n + 1);
        }
        return 4 * $sum;
    }

    public function e(): float
    {
        $sum = 0;
        for ($n = 0; $n <= 100; $n++) {
            $sum += 1 / $this->factorial($n);
        }
        return $sum;
    }

    public function degreeToRadians($angle): float
    {
        return $angle * M_PI / 180;
    }

    public function radiansToDegree($angle): float
    {
        return $angle * 180 / M_PI;
    }

    public function sinus(float $x): float
    {
        $sum = 0;
        for ($n = 0; $n <= 192; $n++) {
            $sum += pow(-1, $n) * pow($x, 2 * $n + 1) / $this->factorial(2 * $n + 1);
        }
        // echo $x;
        return $sum;
    }

    public function cosinus(float $x): float
    {
        $sum = 0;
        for ($n = 0; $n <= 193; $n++) {
            $sum += pow(-1, $n) * pow($x, 2 * $n) / $this->factorial(2 * $n);
        }
        return $sum;
    }

    public function tangent(float $x): string
    {
        $cos = $this->cosinus($x);
        return $cos != 0 ? (string) ($this->sinus($x) / $cos ): "Error matemático"; 
    }
}