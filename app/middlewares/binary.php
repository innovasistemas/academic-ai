<?php

use App\Classes\Util;
use App\Classes\Logic;

include "../classes/Util.php";
include "../classes/Logic.php";

$data = file_get_contents('php://input');
$arrayData = json_decode($data, TRUE);
$objUtil = new Util();
$objLogic = new Logic($arrayData);
$arrayResponse = [];

switch ($arrayData['button']) {
    case 'operators':
        $objLogic->createTableOperator($arrayData['operator']);
        $objLogic->generateTableOperator($arrayData['operator']);
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




