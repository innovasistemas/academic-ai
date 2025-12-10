<?php

namespace App\Models;

use App\Classes\Arrays;

class Logic
{
    private int $n;
    private int $m;
    private array $arrayBinary;
    private array $arrayOperator;
    private array $operators;
    private array $arrayStack;
    private string $tableTrueTable;
    private string $tableOperator;
    private string $tableExpression;
    private $symbol; 
    private array $symbols;
    private Arrays $array;


    public function __construct() 
    {
        $this->arrayBinary = [];
        $this->arrayOperator = [];
        $this->operators = [];
        $this->arrayStack = [];
        $this->tableTrueTable = "";
        $this->tableOperator = "";
        $this->tableExpression = "";
        $this->array = new Arrays();
    }


    public function setConfig(array $arrayData): void
    {
        $this->symbol = $arrayData['symbol'];

        $this->symbols['lm']['on'] = 'v';
        $this->symbols['lm']['off'] = 'f';
        $this->symbols['lm']['not'] = '┐';
        $this->symbols['lm']['and'] = '∧';
        $this->symbols['lm']['or'] = '∨';
        $this->symbols['lm']['xor'] = '⊕';
        $this->symbols['lm']['if'] = '→';
        $this->symbols['lm']['if2'] = '↔';
        $this->symbols['lm']['ascii'] = 112;
                
        $this->symbols['lc']['on'] = '1';
        $this->symbols['lc']['off'] = '0';
        $this->symbols['lc']['not'] = '−';
        $this->symbols['lc']['and'] = '×';
        $this->symbols['lc']['or'] = '+';
        $this->symbols['lc']['xor'] = '⊕';
        $this->symbols['lc']['if'] = '→';
        $this->symbols['lc']['if2'] = '↔';
        $this->symbols['lc']['ascii'] = 65;

        $this->operators[] = '-';
        $this->operators[] = '*';
        $this->operators[] = '+';
        $this->operators[] = 'x';
        $this->operators[] = '/';
        $this->operators[] = '^';              
        $this->operators[] = '(';
        $this->operators[] = ')';

        if (!empty($arrayData['n']) || $arrayData['n'] == '0') {
            $this->n = (int)$arrayData['n'];
            $this->m = 2 ** $this->n;
        }

        $this->createTrueTable();
        $this->generateTrueTable();
    }


    public function getArrayBinary(): array
    {
        return $this->arrayBinary;
    }


    public function getTableTrueTable(): string
    {
        return $this->tableTrueTable;
    }


    public function getTableOperator(): string
    {
        return $this->tableOperator;
    }


    public function getTableExpression(): string
    {
        return $this->tableExpression;
    }

    
    public function getSymbols(): array
    {
        return $this->symbols;
    }
    

    private function createTrueTable(): void
    {
        $f = $this->m / 2;
        $bit = $this->symbols[$this->symbol]['off'];        
        for ($i = 0; $i < $this->n; $i++) {
            $k = 1;
            for ($j = 0; $j < $this->m; $j++) {
                $datum = $bit;
                if ($k < $f) {
                    $k++;
                } else {
                    $bit = $bit == $this->symbols[$this->symbol]['off'] ? 
                        $this->symbols[$this->symbol]['on'] : 
                        $this->symbols[$this->symbol]['off'];
                    if ($f != 1) {
                        $k = 1;
                   } 
                }
                $this->arrayBinary[$j][$i] = $datum;
            }
            $f /= 2;
        }
    }


    private function generateTrueTable(): void
    {
        $tableBinary = "
            <div class='table-responsive'>
                <table class=
                    'table table-hover table-bordered border-primary text-center'>
                    <thead>
                        <tr>
        ";
        for ($i = 0; $i < $this->n; $i++){
            $tableBinary .= 
                "<th>" . 
                    chr($this->symbols[$this->symbol]['ascii'] + $i) . 
                "</th>";
        }
        $tableBinary .= "</tr></thead><tbody>";
        for ($i = 0; $i < $this->m; $i++) {
            $tableBinary .= "<tr>";
            for ($j = 0; $j < $this->n; $j++) {
                $tableBinary .= "<td>{$this->arrayBinary[$i][$j]}</td>";
            }
            $tableBinary .= "</tr>";
        }
        $tableBinary .= "</tbody></table></div>";
        $this->tableTrueTable = $tableBinary;
    }


    public function createTableOperator(string $operator): void
    {
        for ($i = 0; $i < $this->m; $i++) {
            $bit1 = $this->charToBit($this->arrayBinary[$i][0]);
            $bit2 = $this->m > 2 ? 
                $this->charToBit($this->arrayBinary[$i][1]) : -1;
            $bit = $this->verifyRules($operator, $bit1, $bit2);
            $this->arrayOperator[$i][0] = $this->arrayBinary[$i][0];
            $this->arrayOperator[$i][1] = $this->bitToChar($bit);
            if ($this->m > 2) {
                $this->arrayOperator[$i][2] = $this->arrayBinary[$i][1];
            }
        }
    }


    public function generateTableOperator(string $operator): void
    {
        $tableBinary = "
            <div class='table-responsive'>
                <table class=
                    'table table-hover table-bordered border-primary text-center'>
                    <thead>
                        <tr>
        ";
        $j = 0;
        for ($i = 0; $i <= $this->n; $i++) {
            if ($i != 1) {
                $tableBinary .= "
                    <th>" . 
                        chr($this->symbols[$this->symbol]['ascii'] + $j) . "
                    </th>
                ";
                $j++;
            } else {
                $symbol = $this->symbols[$this->symbol][$operator];
                if ($this->n == 1) {
                    $symbol .= chr($this->symbols[$this->symbol]['ascii']);
                } 
                $tableBinary .= "<th>{$symbol}</th>";
            }
        }
        $tableBinary .= "</tr></thead><tbody>";
        for ($i = 0; $i < $this->m; $i++) {
            $tableBinary .= "<tr>";
            for ($j = 0; $j <= $this->n; $j++) {
                if ($j != 1) {
                    $tableBinary .= "<td>{$this->arrayOperator[$i][$j]}</td>";
                } else {
                    $tableBinary .= "
                        <td class='bg-primary text-white'>
                            {$this->arrayOperator[$i][$j]}
                        </td>
                    ";
                }
            }
            $tableBinary .= "</tr>";
        }
        $tableBinary .= "</tbody></table></div>";
        $this->tableOperator = $tableBinary;
    }


    private function charToBit(string $char): int
    {
        $bit = 0;
        if ($char == 'v' || $char == '1') {
            $bit = 1;
        } elseif ($char == 'f' || $char == '0') {
            $bit = 0;
        } 
        return $bit;
    }


    private function bitToChar(int $bit): string
    {
        return $bit > 0 ? 
            ($this->symbol == 'lm' ? 'v' : '1') : 
            ($this->symbol == 'lm' ? 'f' : '0');
    }


    private function verifyRules(string $operator, int $bit1, int $bit2): int
    {
        switch ($operator) {
            case 'not':
                $bit = $this->denyBit($bit1);
                break;
            case 'and':
                $bit = $this->multiplyBits($bit1, $bit2);
                break;
            case 'or':
                $bit = $this->addBits($bit1, $bit2);
                break;
            case 'xor':
                $bit = $this->addExclusiveBits($bit1, $bit2);
                break;
            case 'if':
                $bit = $this->conditionalBits($bit1, $bit2);
                break;
            case 'if2':
                $bit = $this->biconditionalBits($bit1, $bit2);
                break;
        }
        return $bit;
    }


    private function denyBit(int $bit): int
    {
        return 1 - $bit;
    }


    private function addBits(int $bit1, int $bit2): int
    {
        return $bit1 + $bit2 - ($bit1 * $bit2);
    }


    private function addExclusiveBits(int $bit1, int $bit2): int
    {
        if ($bit1 + $bit2 == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    
    
    private function multiplyBits(int $bit1, int $bit2): int
    {
        return $bit1 * $bit2;
    }


    private function conditionalBits(int $bit1, int $bit2): int
    {
        if ($bit1 == 1 && $bit2 == 0) {
            return 0;
        } else {
            return 1;
        }
    }


    private function biconditionalBits(int $bit1, int $bit2): int
    {
        if ($bit1 == $bit2) {
            return 1;
        } else {
            return 0;
        }
    }


    public function postfixExpression(string $expression, array &$stack): string 
    {
        $strPostfix = "";
        for ($i = 0; $i < strlen($expression); $i++) {
            $pos = $this->array->arraySearch(
                $this->operators, 
                $expression[$i]
            );
            if ($pos > -1) {
                $stack = $this->array->stack($stack, substr($expression, $i, 1));
            } else {
                $strPostfix .= substr($expression, $i, 1);
            }
        }
        return $strPostfix;
    }
}