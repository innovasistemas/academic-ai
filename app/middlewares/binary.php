<?php
require_once "../../vendor/autoload.php";

use App\Models\Logic;

$objLogic = new Logic();
$objLogic->fetchArrayData();
$objLogic->setConfig($objLogic->arrayData);
$arrayResponse = [];

switch ($objLogic->arrayData['button']) {
    case 'operators':
        $objLogic->createTableOperator($objLogic->arrayData['operator']);
        $objLogic->generateTableOperator($objLogic->arrayData['operator']);
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

$objLogic->response($arrayResponse);




