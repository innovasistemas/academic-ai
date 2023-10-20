<?php

namespace App\Classes;

class Logic
{
    private $n;
    private $m;
    private $arrayBinary;
    private $arrayOperator;
    private $arrayStack;
    private $tableTrueTable;
    private $tableOperator;
    private $tableExpression;
    private $symbol; 
    private $symbols; 


    public function __construct($arrayData) 
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

        if (!empty($arrayData['n'])) {
            $this->n = $arrayData['n'];
            $this->m = pow(2, $this->n);
        }

        $this->arrayBinary = [];
        $this->arrayOperator = [];
        $this->arrayStack = [];
        $this->tableTrueTable = "";
        $this->tableOperator = "";
        $this->tableExpression = "";

        $this->createTrueTable();
        $this->generateTrueTable();
    }


    public function getArrayBinary()
    {
        return $this->arrayBinary;
    }


    public function getTableTrueTable()
    {
        return $this->tableTrueTable ;
    }


    public function getTableOperator()
    {
        return $this->tableOperator ;
    }


    public function getTableExpression()
    {
        return $this->tableExpression ;
    }

    
    public function getSymbols()
    {
        return $this->symbols;
    }
    

    private function createTrueTable()
    {
        $f = $this->m / 2;
        $bit = $this->symbols[$this->symbol]['off'];
        
        for ($i = 0; $i < $this->n; $i++) {
            $k = 1;
            for ($j = 0; $j < $this->m; $j++) {
                $datum = $bit;
                if ($k < $f) {
                    $k++;
                } elseif ($f == 1) {
                    $bit = $bit == $this->symbols[$this->symbol]['off'] ? 
                        $this->symbols[$this->symbol]['on'] : 
                        $this->symbols[$this->symbol]['off'];
                } else {
                    $k = 1;
                    $bit = $bit == $this->symbols[$this->symbol]['off'] ? 
                        $this->symbols[$this->symbol]['on'] : 
                        $this->symbols[$this->symbol]['off'];
                }
                $this->arrayBinary[$j][$i] = $datum;
            }
            $f /= 2;
        }
    }


    private function generateTrueTable()
    {
        $headerTable = "<table class='t-table border-primary '><tr>";
        for ($i = 0; $i < $this->n; $i++){
            $headerTable .= 
                "<th class=' t-cell border-primary'>" . 
                    chr($this->symbols[$this->symbol]['ascii'] + $i) . 
                "</th>";
        }
        $headerTable .= "</tr></table>";
        
        $tableBinary = "<table class='t-table border-primary'>";
        for ($i = 0; $i < $this->m; $i++) {
            $tableBinary .= "<tr>";
            for ($j = 0; $j < $this->n; $j++) {
                $tableBinary .= "<td class='t-cell border-primary'>{$this->arrayBinary[$i][$j]}</td>";
            }
            $tableBinary .= "</tr>";
        }
        $tableBinary .= "</table>";
        $this->tableTrueTable = $headerTable . $tableBinary;
    }


    public function createTableOperator($operator)
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


    public function generateTableOperator($operator)
    {
        $headerTable = "<table class='t-table border-primary'><tr>";
        $j = 0;
        for ($i = 0; $i <= $this->n; $i++){
            if ($i != 1) {
                $headerTable .= 
                    "<th class='t-cell border-primary'>" . 
                        chr($this->symbols[$this->symbol]['ascii'] + $j) . 
                    "</th>";
                $j++;
            } else {
                $symbol = $this->symbols[$this->symbol][$operator];
                if ($this->n == 1) {
                    $symbol .= chr($this->symbols[$this->symbol]['ascii']);
                } 
                $headerTable .= "<th class='t-cell border-primary'>{$symbol}</th>";
            }
        }
        $headerTable .= "</tr></table>";
        
        $tableBinary = "<table class='t-table border-primary'>";
        for ($i = 0; $i < $this->m; $i++) {
            $tableBinary .= "<tr>";
            for ($j = 0; $j <= $this->n; $j++) {
                if ($j != 1) {
                    $tableBinary .= "<td class='t-cell border-primary'>{$this->arrayOperator[$i][$j]}</td>";
                } else {
                    $tableBinary .= "
                        <td class='t-cell border-primary' style='background: #007bff;'>
                            {$this->arrayOperator[$i][$j]}
                        </td>
                    ";
                }
            }
            $tableBinary .= "</tr>";
        }
        $tableBinary .= "</table>";
        $this->tableOperator = $headerTable . $tableBinary;
    }


    private function charToBit($char)
    {
        if ($char == 'v' || $char == '1') {
            return 1;
        } elseif ($char == 'f' || $char == '0') {
            return 0;
        }
    }


    private function bitToChar($bit)
    {
        return $bit > 0 ? 
            ($this->symbol == 'lm' ? 'v' : '1') : ($this->symbol == 'lm' ? 'f' : '0');
    }


    private function verifyRules($operator, $bit1, $bit2)
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


    private function denyBit($bit)
    {
        if ($bit == 0) {
            return 1;
        } else {
            return 0;
        }
    }


    private function addBits($bit1, $bit2)
    {
        return $bit1 + $bit2;
    }


    private function addExclusiveBits($bit1, $bit2)
    {
        if ($bit1 + $bit2 == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    
    
    private function multiplyBits($bit1, $bit2)
    {
        return $bit1 * $bit2;
    }


    private function conditionalBits($bit1, $bit2)
    {
        if ($bit1 == 1 && $bit2 == 0) {
            return 0;
        } else {
            return 1;
        }
    }


    private function biconditionalBits($bit1, $bit2)
    {
        if ($bit1 == $bit2) {
            return 1;
        } else {
            return 0;
        }
    }

    
    // public function responsex()
    // {
    //     $arrayResponse = [
    //         'matrix' => $this->arrayBinary,
    //         'table' => $this->tableTrueTable,
    //         'tableOperator' => $this->tableOperator,
    //         'tableExpression' => $this->tableExpression,
    //         'symbols' => $this->symbols
    //     ];
    //     echo json_encode($arrayResponse);
    // }


    public function response($array)
    {
        echo json_encode($array);
    }
}