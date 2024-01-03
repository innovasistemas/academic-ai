<?php

namespace App\Models;

use App\Config\App;

class Matrix extends App
{
    private $A;
    private $B;
    private $C;
    private $T;
    private $matrixArea;
    private $m;
    private $n;
    private $p;
    private $q;
    private $r;
    private $s;


    public function __construct() 
    {
        parent::__construct();
        
        srand(time());
    }


    public function getMatrix($matrix)
    {
        return $this->$matrix;
    }


    public function createMatrix($matrix, $m, $n)
    {
        switch ($matrix) {
            case 'A':
                $this->m = $m;
                $this->n = $n;
                break;
            case 'B':
                $this->p = $m;
                $this->q = $n;
                break;
        }
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $this->$matrix[$i][$j] = rand(-20, 20);
            }
        }
    }

    
    public function showMatrix($matrix, $c = 1)
    {
        switch ($matrix) {
            case 'A':
                $m = $this->m;
                $n = $this->n;
                break;
            case 'B':
                $m = $this->p;
                $n = $this->q;
                break;
            case 'C':
                $m = $this->r;
                $n = $this->s;
                break;
            case 'T':
                $m = $this->n;
                $n = $this->m;
                break;
            case 'matrixArea':
                $m = $this->n;
                $n = $this->n;
                break;
        }
        $tableMatrix = "<table class='table table-hover table-bordered border-danger text-center'>";
        for ($i = 0; $i < $m; $i++) {
            $tableMatrix .= "<tr>";
            for ($j = 0; $j < $n; $j++) {
                $term = is_numeric($this->$matrix[$i][$j]) ? 
                    $c * $this->$matrix[$i][$j] : $this->$matrix[$i][$j];
                $tableMatrix .= "<td class=''>$term</td>";
            }
            $tableMatrix .= "</tr>";
        }
        $tableMatrix .= "</table>";
        return $tableMatrix;
    }


    public function sumMatrix()
    {
        $error  = 0;
        if ($this->m == $this->p && $this->n == $this->q) {
            $this->r = $this->m;
            $this->s = $this->n;
            for ($i = 0; $i < $this->m; $i++) {
                for ($j = 0; $j < $this->n; $j++) {
                    $this->C[$i][$j] = $this->A[$i][$j] + $this->B[$i][$j];
                }
            } 
        } else {
            $error  = 1;
        }
        return $error;
    }


    public function productMatrix()
    {
        $error  = 0;
        if ($this->n == $this->p) {
            $this->r = $this->m;
            $this->s = $this->q;
            $m = $this->m;
            $p = $this->n;
            $n = $this->q;
            for ($i = 0; $i < $m; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    for ($k = 0; $k < $p; $k++) {
                        $this->C[$i][$j] += $this->A[$i][$k] * $this->B[$k][$j];
                    }
                }
            } 
        } else {
            $error  = 1;
        }
        return $error;
    }


    public function transposed($matrix)
    {
        for ($i = 0; $i < $this->m; $i++) {
            for ($j = 0; $j < $this->n; $j++) {
                $this->T[$j][$i] = $this->$matrix[$i][$j];
            }
        } 
    }


    public function determinant2x2($matrix)
    {
        return $this->$matrix[0][0] * $this->$matrix[1][1] 
            - $this->$matrix[0][1] * $this->$matrix[1][0];
    }


    public function determinant3x3($matrix)
    {
        return ($this->$matrix[0][0] * $this->$matrix[1][1] * $this->$matrix[1][1]
            + $this->$matrix[0][1] * $this->$matrix[1][2] * $this->$matrix[2][0]   
            + $this->$matrix[0][2] * $this->$matrix[1][0] * $this->$matrix[2][1])  
            - 
            ($this->$matrix[0][2] * $this->$matrix[1][1] * $this->$matrix[2][0]
            + $this->$matrix[0][0] * $this->$matrix[1][2] * $this->$matrix[2][1]   
            + $this->$matrix[0][1] * $this->$matrix[1][0] * $this->$matrix[2][2]);
    }


    public function matrixEmpty($matrix, $m, $n, $char = '&nbsp;')
    {
        $this->$matrix = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $this->$matrix[$i][$j] = $char;
            }
        } 
    }


    public function diagonal()
    {
        for ($i = 0; $i < $this->m; $i++) {
            $this->matrixArea[$i][$i] = 'x';
        } 
    }


    public function diagonalSecondary()
    {
        for ($i = 0; $i < $this->m; $i++) {
            $this->matrixArea[$i][$this->m - $i -1] = 'x';
        } 
    }


    public function upperTriangular()
    {
        for ($i = 0; $i < $this->m - 1; $i++) {
            for ($j = $i + 1; $j < $this->m; $j++) {
                $this->matrixArea[$i][$j] = 'x';
            }
        } 
    }


    public function upperTriangle()
    {
        for ($i = 0; $i < $this->m / 2; $i++) {
            for ($j = $i; $j < $this->m - $i; $j++) {
                $this->matrixArea[$i][$j] = 'x';
            }
        } 
    }
}

