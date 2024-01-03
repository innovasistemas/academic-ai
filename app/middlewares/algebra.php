<?php
require_once "../../vendor/autoload.php";

use App\Models\Matrix;

$objMatrix = new Matrix();
$objMatrix->fetchArrayData();

switch ($objMatrix->arrayData['button']) {
    case 'matrix-operation':
        $objMatrix->createMatrix('A', $objMatrix->arrayData['m'], $objMatrix->arrayData['n']);
        $arrayResponse['matrixA'] = $objMatrix->showMatrix('A');

        $objMatrix->createMatrix('B', $objMatrix->arrayData['p'], $objMatrix->arrayData['q']);
        $arrayResponse['matrixB'] = $objMatrix->showMatrix('B');

        $objMatrix->matrixEmpty('C', $objMatrix->arrayData['m'], $objMatrix->arrayData['n'], 0);
        $arrayResponse['matrixSum'] = $objMatrix->sumMatrix() == 0 ?
            $objMatrix->showMatrix('C') : "<br>No se pueden sumar las matrices";

        $arrayResponse['scalar'] = 
            $objMatrix->showMatrix('A', $objMatrix->arrayData['scalar']);
        
        $objMatrix->matrixEmpty('C', $objMatrix->arrayData['m'], $objMatrix->arrayData['q'], 0);
        $arrayResponse['matrixProduct'] = $objMatrix->productMatrix() == 0 ?
            $objMatrix->showMatrix('C') : 
            "<br>No se pueden multiplicar las matrices";    
            
        $objMatrix->transposed('A');
        $arrayResponse['transposed'] = $objMatrix->showMatrix('T');

        $arrayResponse['determinant'] = '-';
        $arrayResponse['upperTriangular'] = '-';
        $arrayResponse['upperTriangle'] = '-';
        $arrayResponse['diagonals'] = '-';
        if ($objMatrix->arrayData['m'] == $objMatrix->arrayData['n']) {
            $objMatrix->matrixEmpty('matrixArea', $objMatrix->arrayData['m'], $objMatrix->arrayData['n']);
            $objMatrix->diagonal();
            $objMatrix->diagonalSecondary();
            $arrayResponse['diagonals'] = $objMatrix->showMatrix('matrixArea');

            $objMatrix->matrixEmpty('matrixArea', $objMatrix->arrayData['m'], $objMatrix->arrayData['n']);
            $objMatrix->upperTriangular();
            $arrayResponse['upperTriangular'] = $objMatrix->showMatrix('matrixArea');
            
            $objMatrix->matrixEmpty('matrixArea', $objMatrix->arrayData['m'], $objMatrix->arrayData['n']);
            $objMatrix->upperTriangle();
            $arrayResponse['upperTriangle'] = $objMatrix->showMatrix('matrixArea');
            
            switch ($objMatrix->arrayData['m']) {
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

$objMatrix->response($arrayResponse);




