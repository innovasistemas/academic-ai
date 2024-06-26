<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Models\Matrix;


class Algebra extends App
{
    private object $objMatrix;


    public function __construct()
    {
        parent::__construct();
        
        $this->objMatrix = new Matrix();
        $this->fetchArrayData();

        switch ($this->arrayData['button']) {
            case 'matrix-operation':
                $this->matrixOperation();
                break;
        }

        $this->response($this->arrayResponse);
    }


    public function matrixOperation(): void
    {
        $this->objMatrix->createMatrix(
            'A', $this->arrayData['m'], $this->arrayData['n']
        );
        $this->arrayResponse['matrixA'] = $this->objMatrix->showMatrix('A');

        $this->objMatrix->createMatrix(
            'B', $this->arrayData['p'], $this->arrayData['q']
        );
        $this->arrayResponse['matrixB'] = $this->objMatrix->showMatrix('B');

        $this->objMatrix->matrixEmpty(
            'C', $this->arrayData['m'], $this->arrayData['n'], 0
        );
        $this->arrayResponse['matrixSum'] = $this->objMatrix->sumMatrix() == 0 ?
            $this->objMatrix->showMatrix('C') : 
            "<br>No se pueden sumar las matrices";

        $this->arrayResponse['scalar'] = 
            $this->objMatrix->showMatrix('A', $this->arrayData['scalar']);
        
        $this->objMatrix->matrixEmpty(
            'C', $this->arrayData['m'], $this->arrayData['q'], 0
        );
        $this->arrayResponse['matrixProduct'] = 
            $this->objMatrix->productMatrix() == 0 ? 
            $this->objMatrix->showMatrix('C') : 
            "<br>No se pueden multiplicar las matrices";
            
        $this->objMatrix->transposed('A');
        $this->arrayResponse['transposed'] = $this->objMatrix->showMatrix('T');

        $arrayResponse['determinant'] = '-';
        $arrayResponse['upperTriangular'] = '-';
        $arrayResponse['upperTriangle'] = '-';
        $arrayResponse['diagonals'] = '-';
        if ($this->arrayData['m'] == $this->arrayData['n']) {
            $this->objMatrix->matrixEmpty(
                'matrixArea', $this->arrayData['m'], $this->arrayData['n']);
            $this->objMatrix->diagonal();
            $this->objMatrix->diagonalSecondary();
            $this->arrayResponse['diagonals'] = 
                $this->objMatrix->showMatrix('matrixArea');

            $this->objMatrix->matrixEmpty(
                'matrixArea', $this->arrayData['m'], $this->arrayData['n']);
            $this->objMatrix->upperTriangular();
            $this->arrayResponse['upperTriangular'] = 
                $this->objMatrix->showMatrix('matrixArea');
            
            $this->objMatrix->matrixEmpty(
                'matrixArea', $this->arrayData['m'], $this->arrayData['n']);
            $this->objMatrix->upperTriangle();
            $this->arrayResponse['upperTriangle'] = 
                $this->objMatrix->showMatrix('matrixArea');
            
            switch ($this->arrayData['m']) {
                case 1: 
                    $this->arrayResponse['determinant'] = 
                        $this->objMatrix->getMatrix('A');
                    break;
                case 2: 
                    $this->arrayResponse['determinant'] = 
                        $this->objMatrix->determinant2x2('A');
                    break;
                case 3: 
                    $this->arrayResponse['determinant'] = 
                        $this->objMatrix->determinant3x3('A');
                    break;
            } 
        }
    }
}


$objController = new Algebra();





