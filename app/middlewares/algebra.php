<?php

use App\Classes\Util;
use App\Classes\Matrix;

include "../classes/Util.php";
include "../classes/Matrix.php";

$data = file_get_contents('php://input');
$arrayData = json_decode($data, TRUE);
$objUtil = new Util();
$objMatrix = new Matrix($arrayData);

switch ($arrayData['button']) {
    case 'matrix-operation':
        $objMatrix->createMatrix('A', $arrayData['m'], $arrayData['n']);
        $arrayResponse['matrixA'] = $objMatrix->showMatrix('A');

        $objMatrix->createMatrix('B', $arrayData['p'], $arrayData['q']);
        $arrayResponse['matrixB'] = $objMatrix->showMatrix('B');

        $objMatrix->matrixEmpty('C', $arrayData['m'], $arrayData['n'], 0);
        $arrayResponse['matrixSum'] = $objMatrix->sumMatrix() == 0 ?
            $objMatrix->showMatrix('C') : "<br>No se pueden sumar las matrices";

        $arrayResponse['scalar'] = 
            $objMatrix->showMatrix('A', $arrayData['scalar']);
        
        $objMatrix->matrixEmpty('C', $arrayData['m'], $arrayData['q'], 0);
        $arrayResponse['matrixProduct'] = $objMatrix->productMatrix() == 0 ?
            $objMatrix->showMatrix('C') : 
            "<br>No se pueden multiplicar las matrices";    
            
        $objMatrix->transposed('A');
        $arrayResponse['transposed'] = $objMatrix->showMatrix('T');

        $arrayResponse['determinant'] = '-';
        $arrayResponse['upperTriangular'] = '-';
        $arrayResponse['upperTriangle'] = '-';
        $arrayResponse['diagonals'] = '-';
        if ($arrayData['m'] == $arrayData['n']) {
            $objMatrix->matrixEmpty('matrixArea', $arrayData['m'], $arrayData['n']);
            $objMatrix->diagonal();
            $objMatrix->diagonalSecondary();
            $arrayResponse['diagonals'] = $objMatrix->showMatrix('matrixArea');

            $objMatrix->matrixEmpty('matrixArea', $arrayData['m'], $arrayData['n']);
            $objMatrix->upperTriangular();
            $arrayResponse['upperTriangular'] = $objMatrix->showMatrix('matrixArea');
            
            $objMatrix->matrixEmpty('matrixArea', $arrayData['m'], $arrayData['n']);
            $objMatrix->upperTriangle();
            $arrayResponse['upperTriangle'] = $objMatrix->showMatrix('matrixArea');
            
            switch ($arrayData['m']) {
                case 1: 
                    $arrayResponse['determinant'] = $objMatrix->getMatrix('A');
                    break;
                case 2: 
                    $arrayResponse['determinant'] = $objMatrix->determinant2x2('A');
                    break;
                case 3: 
                    $arrayResponse['determinant'] = $objMatrix->determinant3x3('A');
                    break;
            } 
        }
        break;
}

$objUtil->response($arrayResponse);




