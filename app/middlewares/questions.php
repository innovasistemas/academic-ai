<?php

use App\Classes\Questions;
use App\Classes\Connection;

include "../classes/Questions.php";
include "../classes/Connection.php";

$data = file_get_contents('php://input');
$arrayData = json_decode($data, TRUE);
$objQuestion = new Questions();
$objConnection = new Connection("localhost", "root", "", "academic-ai-001");
$arrayRandom = [];
$arrayQuestion = [];
$arrayResponse = [];

$objResult = $objConnection->query("select * from question");
$i = 0;
while ($row = $objResult->fetch_array()) {
    $arrayQuestion['id'][$i] = $row['id'];
    $arrayQuestion['description'][$i] = $row['description'];
    $i++;
}

$arrayResponse['arrayQuestion'] = $arrayQuestion;

switch ($arrayData['button']) {
    case 'generate-question':
        break;
    case 'generate-random':
        if ($arrayData['numberQuestions'] >= $arrayData['questionSelect']) {
            for ($i = 0; $i < $arrayData['questionSelect']; $i++) {
                $arrayRandom[$i] = 
                    $objQuestion->generateRandom(1, $arrayData['numberQuestions']);
            }
            // $arrayResponse['randomNumber'] = implode(",", $arrayRandom);
            $arrayResponse['randomNumber'] = $arrayRandom;
        } else {
            $arrayResponse['randomNumber'] = 
                "No puede seleccionar más preguntas de las disponibles";
        }
        break;
}

$objQuestion->response($arrayResponse);
