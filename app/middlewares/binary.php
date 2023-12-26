<?php
require_once "../../vendor/autoload.php";

use App\Classes\Util;
use App\Models\Logic;

$objUtil = new Util();
$objLogic = new Logic($objUtil->arrayData);
$arrayResponse = [];

switch ($objUtil->arrayData['button']) {
    case 'operators':
        $objLogic->createTableOperator($objUtil->arrayData['operator']);
        $objLogic->generateTableOperator($objUtil->arrayData['operator']);
        $arrayResponse = [
            'table' => $objLogic->getTableTrueTable(),
            'tableOperator' => $objLogic->getTableOperator(),
        ];
        break;
    case 'true-table':
        $arrayResponse = [
            'table' => $objLogic->getTableTrueTable(),
        ];
        break;
    case 'equal':
        $arrayResponse = ['resultExpression' => 0];
        break;
    case 'calc-symbol':
        $arrayResponse = ['symbols' => $objLogic->getSymbols()];
        break;
}

$objUtil->response($arrayResponse);




