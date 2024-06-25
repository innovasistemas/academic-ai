<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Models\Numeric;
use App\Models\Logic;
use App\Models\ConversionLetter;
use App\Models\ConversionRoman;
use App\Models\ReturnMoney;

class NumericalSystems extends App
{
    private string $stringOutput = '';
    private string $tableMatrix = '';

    public function __construct() 
    {
        parent::__construct();

        $this->fetchArrayData();

        switch ($this->arrayData['button']) {
            case 'convert-base':
                $this->convertBase();
                break;
            case 'conversion-table':
                $this->conversionTable();
                break;
            case 'conversion-number':
                $this->conversionNumber();
                break;
            case 'integer-operation':
                $this->integerOperation();
                break;
            case 'trigonometry-operation':
                $this->trigonometryOperation();
                break;
        }

        $this->arrayResponse = [
            'stringOutput' => $this->stringOutput,
            'tableMatrix' => $this->tableMatrix
        ];
        $this->response($this->arrayResponse);
    }


    public function convertBase(): void
    {
        $objNumeric = new Numeric(); 
        if ($this->arrayData['endBase'] == '10') {
            $stringNumber = 
                $objNumeric->baseNTo10($this->arrayData['numberBase'], 
                    $this->arrayData['initialBase']);
        } elseif ($this->arrayData['initialBase'] == '10') {
            $stringNumber = 
            $objNumeric->base10ToN($this->arrayData['numberBase'], 
                $this->arrayData['endBase']);
        } else {
            $stringNumber = 
                $objNumeric->baseNTo10($this->arrayData['numberBase'], 
                    $this->arrayData['initialBase']);
            $stringNumber = 
                $objNumeric->base10ToN($stringNumber, $this->arrayData['endBase']);
        }

        $numberBase = strtoupper($this->arrayData['numberBase']);
        $this->stringOutput = "
            <span class='text-primary' style='font-size: 1.2em;'>
                $numberBase
                <sub><small>{$this->arrayData['initialBase']}</small></sub> 
                = 
                {$stringNumber}
                <sub><small>{$this->arrayData['endBase']}</small></sub> 
            </span>
        ";
    }

    
    public function conversionTable(): void
    {
        $objNumeric = new Numeric(); 
        $objLogic = new Logic();
        $matrix = [];
        $arrayJson = [
            'n' => 4, 
            'symbol' => 'lc'
        ]; 
        $objLogic->setConfig($arrayJson);
        $matrix = $objNumeric->conversionColumns($objLogic->getArrayBinary());
        $this->tableMatrix = $objNumeric->generateConversionTable($matrix);
    }


    public function conversionNumber(): void
    {
        switch ($this->arrayData['conversionType']) {
            case 'letras':
                $objLetters = new ConversionLetter($this->arrayData['number']);
                $this->stringOutput = "
                    <span class='text-primary' style='font-size: 1.2em;'>
                        {$objLetters->getLetter()}
                    </span>
                ";
                break;
            case 'romano':
                $objLetters = new ConversionRoman($this->arrayData['number']);
                $this->stringOutput = "
                    <span class='text-primary' style='font-size: 1.2em;'>
                        {$objLetters->getRomanNumber()}
                    </span>
                ";
                break;
            case 'devuelta':
                $objLetters = new ReturnMoney($this->arrayData['number']);
                $arrayDenominations = $objLetters->getDenominations();
                if ($arrayDenominations['error'] == 0) {
                    $this->stringOutput = "
                        <span class='text-primary' style='font-size: 1.2em;'>
                            Devuelta calculada: {$arrayDenominations['value']}<br>
                            Diferencia: {$arrayDenominations['difference']}<br>
                            Devuelta + ajuste: {$arrayDenominations['money']}<br>
                            Pérdida: {$arrayDenominations['loss']}<br>
                            Denominaciones:<br>{$arrayDenominations['letter']}
                        </span>
                    ";
                } else {
                    $this->stringOutput = "
                        <span class='text-danger' style='font-size: 1.2em;'>
                            Error
                        </span>    
                    ";  
                }
                break;
            default:
                $this->stringOutput = "
                    <span class='text-warning' style='font-size: 1.2em;'>
                        Seleccione un tipo de conversión
                    </span>
                ";
        }
    }


    public function integerOperation(): void
    {
        $objNumeric = new Numeric(); 
        switch ($this->arrayData['operation']) {
            case 'par':
                $isEven = $objNumeric->even(abs($this->arrayData['number'])) ? 
                    "es par" : "es impar";
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$this->arrayData['number']} $isEven
                    </span>
                ";
                break;
            case 'factorial':
                if ($this->arrayData['number'] >= 0) {
                    $this->stringOutput = "
                        <span class='text-info' style='font-size: 1.2em;'>
                            {$this->arrayData['number']}! = 
                            {$objNumeric->factorial($this->arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'fibonacci':
                if ($this->arrayData['number'] > 0) {
                    $this->stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objNumeric->fibonacci($this->arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'primo':
                if ($this->arrayData['number'] > 1) {
                    $isPrime = $objNumeric->prime($this->arrayData['number']) ? 
                        "es primo" : "no es primo";
                    $this->stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$this->arrayData['number']} $isPrime
                        </span>
                    ";
                }
                break;
            case 'perfecto':
                if ($this->arrayData['number'] > 0) {
                    $isPerfect = $objNumeric->perfect($this->arrayData['number']) ? 
                        "es perfecto" : "no es perfecto";
                    $this->stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$this->arrayData['number']} $isPerfect
                        </span>
                    ";
                }
                break;
        }
    }


    public function trigonometryOperation(): void
    {
        $objNumeric = new Numeric(); 
        switch ($this->arrayData['operation']) {
            case 'pi':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        &pi; = {$objNumeric->pi()}
                    </span>
                ";
                break;
            case 'e':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        e = {$objNumeric->e()}
                    </span>
                ";
                break;
            case 'angulo':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$this->arrayData['number']}° 
                        = 
                        {$objNumeric->degreeToRadians($this->arrayData['number'])}
                        <small>rad</small>
                    </span>
                ";
                break;
            case 'angulorad':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$this->arrayData['number']}<small>rad</small> 
                        = 
                        {$objNumeric->radiansToDegree($this->arrayData['number'])}°
                    </span>
                ";
                break;
            case 'seno':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        sen({$this->arrayData['number']}) 
                        = 
                        {$objNumeric->sinus($this->arrayData['number'])}
                    </span>
                ";
                break;
            case 'coseno':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        cos({$this->arrayData['number']}) 
                        = 
                        {$objNumeric->cosinus($this->arrayData['number'])}
                    </span>
                ";
                break;
            case 'tangente':
                $this->stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        tan({$this->arrayData['number']}) 
                        = 
                        {$objNumeric->tangent($this->arrayData['number'])}
                    </span>
                ";
                break;
        }
    }
}

$objController = new NumericalSystems();
