<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Models\Logic;

class Binary extends App
{
    private object $objLogic;

    public function __construct()
    {
        parent::__construct();

        $this->objLogic = new Logic();
        $this->fetchArrayData();
        $this->objLogic->setConfig($this->arrayData);

        switch ($this->arrayData['button']) {
            case 'operators':
                $this->operators();
                break;
            case 'true-table':
                $this->trueTable();
                break;
            case 'equal':
                $this->equal();
                break;
            case 'calc-symbol':
                $this->calcSymbol();
                break;
        }
        $this->response($this->arrayResponse);
    }

    public function operators(): void
    {
        $this->objLogic->createTableOperator($this->arrayData['operator']);
        $this->objLogic->generateTableOperator($this->arrayData['operator']);
        $this->arrayResponse = [
            'table' => $this->objLogic->getTableTrueTable(),
            'tableOperator' => $this->objLogic->getTableOperator(),
        ];
    }
    
    public function trueTable(): void
    {
        $this->arrayResponse = [
            'table' => $this->objLogic->getTableTrueTable(),
        ];
    }

    public function equal(): void
    {
        $postFix = $this->objLogic->postfixExpression(
            $this->arrayData['expression2']
        );
        if ($this->arrayData['symbol'] == 'lm') {
            $symbolTrue = 'v'; 
            $symbolFalse = 'f'; 
        } else {
            $symbolTrue = '1';  
            $symbolFalse = '0'; 
        }
        $postFixValues = $postFix;
        $postFixValues = 
            str_replace('p', $this->arrayData['vars']['p'], $postFixValues);
        $postFixValues = 
            str_replace('q', $this->arrayData['vars']['q'], $postFixValues);
        $postFixValues = 
            str_replace('r', $this->arrayData['vars']['r'], $postFixValues);
        $postFixValues = 
            str_replace('s', $this->arrayData['vars']['s'], $postFixValues);
        $resultFinal = $this->objLogic->postfixResult($postFixValues); 
        $this->arrayResponse = [
            'resultExpressionPostfix' => $postFix,
            'resultFinal' => $resultFinal == 1 ? $symbolTrue : $symbolFalse
        ];
    }

    public function calcSymbol(): void
    {
        $this->arrayResponse = ['symbols' => $this->objLogic->getSymbols()];
    }
}


$objController = new Binary();
