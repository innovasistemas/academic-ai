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
        $stack = [];
        $this->arrayResponse = [
            'resultExpression' => 
                html_entity_decode($this->objLogic->postfixExpression(
                    $this->arrayData['expression'],
                    $stack
                ))
        ];
        // print_r($this->arrayResponse['resultExpression']);
    }


    public function calcSymbol(): void
    {
        $this->arrayResponse = ['symbols' => $this->objLogic->getSymbols()];
    }
}


$objController = new Binary();
