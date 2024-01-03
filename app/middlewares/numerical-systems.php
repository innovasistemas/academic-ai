<?php
require_once "../../vendor/autoload.php";

use App\Models\Numeric;
use App\Models\Logic;
use App\Models\ConversionLetter;
use App\Models\ConversionRoman;
use App\Models\ReturnMoney;

$objNumeric = new Numeric(); 
$objNumeric->fetchArrayData();
$matrix = [];
$tableMatrix = "";
$stringOutput = "";

switch ($objNumeric->arrayData['button']) {
    case 'convert-base':
        if ($objNumeric->arrayData['endBase'] == '10') {
            $stringNumber = 
                $objNumeric->baseNTo10($objNumeric->arrayData['numberBase'], $objNumeric->arrayData['initialBase']);
        } elseif ($objNumeric->arrayData['initialBase'] == '10') {
            $stringNumber = 
            $objNumeric->base10ToN($objNumeric->arrayData['numberBase'], $objNumeric->arrayData['endBase']);
        } else {
            $stringNumber = 
                $objNumeric->baseNTo10($objNumeric->arrayData['numberBase'], $objNumeric->arrayData['initialBase']);
            $stringNumber = 
                $objNumeric->base10ToN($stringNumber, $objNumeric->arrayData['endBase']);
        }

        $numberBase = strtoupper($objNumeric->arrayData['numberBase']);
        $stringOutput = "
            <span class='text-primary' style='font-size: 1.2em;'>
                $numberBase
                <sub><small>{$objNumeric->arrayData['initialBase']}</small></sub> 
                = 
                {$stringNumber}
                <sub><small>{$objNumeric->arrayData['endBase']}</small></sub> 
            </span>
        ";
        break;
    case 'conversion-table':
        $arrayJson = [
            'n' => 4, 
            'symbol' => 'lc'
        ]; 
        $objLogic = new Logic();
        // $objLogic->fetchArrayData();
        $objLogic->setConfig($arrayJson);
        $matrix = $objNumeric->conversionColumns($objLogic->getArrayBinary());
        $tableMatrix = $objNumeric->generateConversionTable($matrix);
        break;
    case 'conversion-number':
        switch ($objNumeric->arrayData['conversionType']) {
            case 'letras':
                $objLetters = new ConversionLetter($objNumeric->arrayData['number']);
                $stringOutput = "
                    <span class='text-primary' style='font-size: 1.2em;'>
                        {$objLetters->getLetter()}
                    </span>
                ";
                break;
            case 'romano':
                $objLetters = new ConversionRoman($objNumeric->arrayData['number']);
                $stringOutput = "
                    <span class='text-primary' style='font-size: 1.2em;'>
                        {$objLetters->getRomanNumber()}
                    </span>
                ";
                break;
            case 'devuelta':
                $objLetters = new ReturnMoney($objNumeric->arrayData['number']);
                $arrayDenominations = $objLetters->getDenominations();
                if ($arrayDenominations['error'] == 0) {
                    $stringOutput = "
                        <span class='text-primary' style='font-size: 1.2em;'>
                            Devuelta calculada: {$arrayDenominations['value']}<br>
                            Diferencia: {$arrayDenominations['difference']}<br>
                            Devuelta + ajuste: {$arrayDenominations['money']}<br>
                            Pérdida: {$arrayDenominations['loss']}<br>
                            Denominaciones:<br>{$arrayDenominations['letter']}
                        </span>
                    ";
                } else {
                    $stringOutput = "
                        <span class='text-danger' style='font-size: 1.2em;'>
                            Error
                        </span>    
                    ";  
                }
                break;
            default:
                $stringOutput = "
                    <span class='text-warning' style='font-size: 1.2em;'>
                        Seleccione un tipo de conversión
                    </span>
                ";
        }
        break;
    case 'integer-operation':
        switch ($objNumeric->arrayData['operation']) {
            case 'par':
                $isEven = $objNumeric->even(abs($objNumeric->arrayData['number'])) ? 
                    "es par" : "es impar";
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$objNumeric->arrayData['number']} $isEven
                    </span>
                ";
                break;
            case 'factorial':
                if ($objNumeric->arrayData['number'] >= 0) {
                    $stringOutput = "
                        <span class='text-info' style='font-size: 1.2em;'>
                            {$objNumeric->arrayData['number']}! = 
                            {$objNumeric->factorial($objNumeric->arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'fibonacci':
                if ($objNumeric->arrayData['number'] > 0) {
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objNumeric->fibonacci($objNumeric->arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'primo':
                if ($objNumeric->arrayData['number'] > 1) {
                    $isPrime = $objNumeric->prime($objNumeric->arrayData['number']) ? 
                        "es primo" : "no es primo";
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objNumeric->arrayData['number']} $isPrime
                        </span>
                    ";
                }
                break;
            case 'perfecto':
                if ($objNumeric->arrayData['number'] > 0) {
                    $isPerfect = $objNumeric->perfect($objNumeric->arrayData['number']) ? 
                        "es perfecto" : "no es perfecto";
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objNumeric->arrayData['number']} $isPerfect
                        </span>
                    ";
                }
                break;
        }
        break;
    case 'trigonometry-operation':
        switch ($objNumeric->arrayData['operation']) {
            case 'pi':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        &pi; = {$objNumeric->pi()}
                    </span>
                ";
                break;
            case 'e':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        e = {$objNumeric->e()}
                    </span>
                ";
                break;
            case 'angulo':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$objNumeric->arrayData['number']}° 
                        = 
                        {$objNumeric->degreeToRadians($objNumeric->arrayData['number'])}<small>rad</small>
                    </span>
                ";
                break;
            case 'angulorad':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$objNumeric->arrayData['number']}<small>rad</small> 
                        = 
                        {$objNumeric->radiansToDegree($objNumeric->arrayData['number'])}°
                    </span>
                ";
                break;
            case 'seno':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        sen({$objNumeric->arrayData['number']}) 
                        = 
                        {$objNumeric->sinus($objNumeric->arrayData['number'])}
                    </span>
                ";
                break;
            case 'coseno':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        cos({$objNumeric->arrayData['number']}) 
                        = 
                        {$objNumeric->cosinus($objNumeric->arrayData['number'])}
                    </span>
                ";
                break;
            case 'tangente':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        tan({$objNumeric->arrayData['number']}) 
                        = 
                        {$objNumeric->tangent($objNumeric->arrayData['number'])}
                    </span>
                ";
                break;
        }
        break;
}

$arrayResponse = [
    'stringOutput' => $stringOutput,
    'tableMatrix' => $tableMatrix
];

$objNumeric->response($arrayResponse);

