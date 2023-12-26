<?php
require_once "../../vendor/autoload.php";

use App\Classes\Util;
use App\Models\Numeric;
use App\Models\Logic;
use App\Models\ConversionLetter;
use App\Models\ConversionRoman;
use App\Models\ReturnMoney;

$objUtil = new Util();
$objNumeric = new Numeric();
$matrix = [];
$tableMatrix = "";
$stringOutput = "";

switch ($objUtil->arrayData['button']) {
    case 'convert-base':
        if ($objUtil->arrayData['endBase'] == '10') {
            $stringNumber = 
                $objNumeric->baseNTo10($objUtil->arrayData['numberBase'], $objUtil->arrayData['initialBase']);
        } elseif ($objUtil->arrayData['initialBase'] == '10') {
            $stringNumber = 
            $objNumeric->base10ToN($objUtil->arrayData['numberBase'], $objUtil->arrayData['endBase']);
        } else {
            $stringNumber = 
                $objNumeric->baseNTo10($objUtil->arrayData['numberBase'], $objUtil->arrayData['initialBase']);
            $stringNumber = 
                $objNumeric->base10ToN($stringNumber, $objUtil->arrayData['endBase']);
        }

        $numberBase = strtoupper($objUtil->arrayData['numberBase']);
        $stringOutput = "
            <span class='text-primary' style='font-size: 1.2em;'>
                $numberBase
                <sub><small>{$objUtil->arrayData['initialBase']}</small></sub> 
                = 
                {$stringNumber}
                <sub><small>{$objUtil->arrayData['endBase']}</small></sub> 
            </span>
        ";
        break;
    case 'conversion-table':
        $arrayJson = [
            'n' => 4, 
            'symbol' => 'lc'
        ]; 
        $objLogic = new Logic($arrayJson);
        $matrix = $objNumeric->conversionColumns($objLogic->getArrayBinary());
        $tableMatrix = $objNumeric->generateConversionTable($matrix);
        break;
    case 'conversion-number':
        switch ($objUtil->arrayData['conversionType']) {
            case 'letras':
                $objLetters = new ConversionLetter($objUtil->arrayData['number']);
                $stringOutput = "
                    <span class='text-primary' style='font-size: 1.2em;'>
                        {$objLetters->getLetter()}
                    </span>
                ";
                break;
            case 'romano':
                $objLetters = new ConversionRoman($objUtil->arrayData['number']);
                $stringOutput = "
                    <span class='text-primary' style='font-size: 1.2em;'>
                        {$objLetters->getRomanNumber()}
                    </span>
                ";
                break;
            case 'devuelta':
                $objLetters = new ReturnMoney($objUtil->arrayData['number']);
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
        switch ($objUtil->arrayData['operation']) {
            case 'par':
                $isEven = $objNumeric->even(abs($objUtil->arrayData['number'])) ? 
                    "es par" : "es impar";
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$objUtil->arrayData['number']} $isEven
                    </span>
                ";
                break;
            case 'factorial':
                if ($objUtil->arrayData['number'] >= 0) {
                    $stringOutput = "
                        <span class='text-info' style='font-size: 1.2em;'>
                            {$objUtil->arrayData['number']}! = 
                            {$objNumeric->factorial($objUtil->arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'fibonacci':
                if ($objUtil->arrayData['number'] > 0) {
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objNumeric->fibonacci($objUtil->arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'primo':
                if ($objUtil->arrayData['number'] > 1) {
                    $isPrime = $objNumeric->prime($objUtil->arrayData['number']) ? 
                        "es primo" : "no es primo";
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objUtil->arrayData['number']} $isPrime
                        </span>
                    ";
                }
                break;
            case 'perfecto':
                if ($objUtil->arrayData['number'] > 0) {
                    $isPerfect = $objNumeric->perfect($objUtil->arrayData['number']) ? 
                        "es perfecto" : "no es perfecto";
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 1.2em;'>
                            {$objUtil->arrayData['number']} $isPerfect
                        </span>
                    ";
                }
                break;
        }
        break;
    case 'trigonometry-operation':
        switch ($objUtil->arrayData['operation']) {
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
                        {$objUtil->arrayData['number']}° 
                        = 
                        {$objNumeric->degreeToRadians($objUtil->arrayData['number'])}<small>rad</small>
                    </span>
                ";
                break;
            case 'angulorad':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        {$objUtil->arrayData['number']}<small>rad</small> 
                        = 
                        {$objNumeric->radiansToDegree($objUtil->arrayData['number'])}°
                    </span>
                ";
                break;
            case 'seno':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        sen({$objUtil->arrayData['number']}) 
                        = 
                        {$objNumeric->sinus($objUtil->arrayData['number'])}
                    </span>
                ";
                break;
            case 'coseno':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        cos({$objUtil->arrayData['number']}) 
                        = 
                        {$objNumeric->cosinus($objUtil->arrayData['number'])}
                    </span>
                ";
                break;
            case 'tangente':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 1.2em;'>
                        tan({$objUtil->arrayData['number']}) 
                        = 
                        {$objNumeric->tangent($objUtil->arrayData['number'])}
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

$objUtil->response($arrayResponse);

