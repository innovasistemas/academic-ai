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
        
        $postfix = $this->objLogic->postfixExpression(
            $this->arrayData['expression2']
        );

        $postfixValues = $postfix;
        $postfixValues = 
            $this->objLogic->replaceValues($this->arrayData, $postfixValues);
        $resultFinal = $this->objLogic->postfixResult($postfixValues); 
        if ($this->arrayData['symbol'] == 'lm') {
            $symbolTrue = 'v'; 
            $symbolFalse = 'f'; 
        } else {
            $symbolTrue = '1';  
            $symbolFalse = '0'; 
        }

        $this->objLogic->setN($this->objLogic->countVars($postfix));
        $this->objLogic->setM(2 ** $this->objLogic->getN());

        $this->objLogic->createTrueTable();
        $this->objLogic->generateTrueTable($this->arrayData['expression'], $postfix);
        
        $this->arrayResponse = [
            'resultExpressionPostfix' => $postfix,
            'resultFinal' => $resultFinal == 1 ? $symbolTrue : $symbolFalse,
            'table' => $this->objLogic->getTableTrueTable(),
        ];
    }

    public function calcSymbol(): void
    {
        $this->arrayResponse = ['symbols' => $this->objLogic->getSymbols()];
    }
}


$objController = new Binary();
