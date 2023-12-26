<?php
require_once "../../vendor/autoload.php";

use App\Classes\Util;
use App\Models\Matrix;

$objUtil = new Util();
$objMatrix = new Matrix($objUtil->arrayData);

switch ($objUtil->arrayData['button']) {
    case 'matrix-operation':
        $objMatrix->createMatrix('A', $objUtil->arrayData['m'], $objUtil->arrayData['n']);
        $arrayResponse['matrixA'] = $objMatrix->showMatrix('A');

        $objMatrix->createMatrix('B', $objUtil->arrayData['p'], $objUtil->arrayData['q']);
        $arrayResponse['matrixB'] = $objMatrix->showMatrix('B');

        $objMatrix->matrixEmpty('C', $objUtil->arrayData['m'], $objUtil->arrayData['n'], 0);
        $arrayResponse['matrixSum'] = $objMatrix->sumMatrix() == 0 ?
            $objMatrix->showMatrix('C') : "<br>No se pueden sumar las matrices";

        $arrayResponse['scalar'] = 
            $objMatrix->showMatrix('A', $objUtil->arrayData['scalar']);
        
        $objMatrix->matrixEmpty('C', $objUtil->arrayData['m'], $objUtil->arrayData['q'], 0);
        $arrayResponse['matrixProduct'] = $objMatrix->productMatrix() == 0 ?
            $objMatrix->showMatrix('C') : 
            "<br>No se pueden multiplicar las matrices";    
            
        $objMatrix->transposed('A');
        $arrayResponse['transposed'] = $objMatrix->showMatrix('T');

        $arrayResponse['determinant'] = '-';
        $arrayResponse['upperTriangular'] = '-';
        $arrayResponse['upperTriangle'] = '-';
        $arrayResponse['diagonals'] = '-';
        if ($objUtil->arrayData['m'] == $objUtil->arrayData['n']) {
            $objMatrix->matrixEmpty('matrixArea', $objUtil->arrayData['m'], $objUtil->arrayData['n']);
            $objMatrix->diagonal();
            $objMatrix->diagonalSecondary();
            $arrayResponse['diagonals'] = $objMatrix->showMatrix('matrixArea');

            $objMatrix->matrixEmpty('matrixArea', $objUtil->arrayData['m'], $objUtil->arrayData['n']);
            $objMatrix->upperTriangular();
            $arrayResponse['upperTriangular'] = $objMatrix->showMatrix('matrixArea');
            
            $objMatrix->matrixEmpty('matrixArea', $objUtil->arrayData['m'], $objUtil->arrayData['n']);
            $objMatrix->upperTriangle();
            $arrayResponse['upperTriangle'] = $objMatrix->showMatrix('matrixArea');
            
            switch ($objUtil->arrayData['m']) {
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




