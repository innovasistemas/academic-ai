<?php

use App\Classes\Numeric;
use App\Classes\Logic;
use App\Classes\ConversionLetter;

include "../classes/Numeric.php";
include "../classes/Logic.php";
include "../classes/ConversionLetter.php";

$data = file_get_contents('php://input');
$arrayData = json_decode($data, TRUE);
$objNumeric = new Numeric();
$matrix = [];
$tableMatrix = "";
$stringOutput = "";

switch ($arrayData['button']) {
    case 'convert-base':
        if ($arrayData['endBase'] == '10') {
            $stringNumber = 
                $objNumeric->baseNTo10($arrayData['numberBase'], $arrayData['initialBase']);
        } elseif ($arrayData['initialBase'] == '10') {
            $stringNumber = 
            $objNumeric->base10ToN($arrayData['numberBase'], $arrayData['endBase']);
        } else {
            $stringNumber = 
                $objNumeric->baseNTo10($arrayData['numberBase'], $arrayData['initialBase']);
            $stringNumber = 
                $objNumeric->base10ToN($stringNumber, $arrayData['endBase']);
        }

        $numberBase = strtoupper($arrayData['numberBase']);
        $stringOutput = "
            <span class='text-info-' style='font-size: 2em;'>
                $numberBase
                <sub><small>{$arrayData['initialBase']}</small></sub> 
                = 
                {$stringNumber}
                <sub><small>{$arrayData['endBase']}</small></sub> 
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
        switch ($arrayData['conversionType']) {
            case 'letras':
                $objLetters = new ConversionLetter($arrayData['number']);
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        {$objLetters->getLetter()}
                    </span>
                ";
                break;
            case 'romano':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        En proceso
                    </span>
                ";
                break;
            default:
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        Seleccione un tipo de conversión
                    </span>
                ";
        }
        break;
    case 'integer-operation':
        switch ($arrayData['operation']) {
            case 'par':
                $isEven = $objNumeric->even(abs($arrayData['number'])) ? 
                    "es par" : "es impar";
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        {$arrayData['number']} $isEven
                    </span>
                ";
                break;
            case 'factorial':
                if ($arrayData['number'] >= 0) {
                    $stringOutput = "
                        <span class='text-info' style='font-size: 2em;'>
                            {$arrayData['number']}! = 
                            {$objNumeric->factorial($arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'fibonacci':
                if ($arrayData['number'] > 0) {
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 2em;'>
                            {$objNumeric->fibonacci($arrayData['number'])}
                        </span>
                    ";
                }
                break;
            case 'primo':
                if ($arrayData['number'] > 1) {
                    $isPrime = $objNumeric->prime($arrayData['number']) ? 
                        "es primo" : "no es primo";
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 2em;'>
                            {$arrayData['number']} $isPrime
                        </span>
                    ";
                }
                break;
            case 'perfecto':
                if ($arrayData['number'] > 0) {
                    $isPerfect = $objNumeric->perfect($arrayData['number']) ? 
                        "es perfecto" : "no es perfecto";
                    $stringOutput = "
                        <span class='text-info-' style='font-size: 2em;'>
                            {$arrayData['number']} $isPerfect
                        </span>
                    ";
                }
                break;
        }
        break;
    case 'trigonometry-operation':
        switch ($arrayData['operation']) {
            case 'pi':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        &pi; = {$objNumeric->pi()}
                    </span>
                ";
                break;
            case 'e':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        e = {$objNumeric->e()}
                    </span>
                ";
                break;
            case 'angulo':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        {$arrayData['number']}° 
                        = 
                        {$objNumeric->degreeToRadians($arrayData['number'])}<small>rad</small>
                    </span>
                ";
                break;
            case 'angulorad':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        {$arrayData['number']}<small>rad</small> 
                        = 
                        {$objNumeric->radiansToDegree($arrayData['number'])}°
                    </span>
                ";
                break;
            case 'seno':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        sen({$arrayData['number']}) 
                        = 
                        {$objNumeric->sinus($arrayData['number'])}
                    </span>
                ";
                break;
            case 'coseno':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        cos({$arrayData['number']}) 
                        = 
                        {$objNumeric->cosinus($arrayData['number'])}
                    </span>
                ";
                break;
            case 'tangente':
                $stringOutput = "
                    <span class='text-info-' style='font-size: 2em;'>
                        tan({$arrayData['number']}) 
                        = 
                        {$objNumeric->tangent($arrayData['number'])}
                    </span>
                ";
                break;
        }
        break;
}

echo json_encode([
    'stringOutput' => $stringOutput,
    'tableMatrix' => $tableMatrix
]);

