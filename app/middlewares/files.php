<?php

use App\Classes\Files;

include "../classes/Files.php";

$data = file_get_contents('php://input');
$arrayData = json_decode($data, TRUE);
$objFile = new Files($arrayData);
$arrayResponse = [];

switch ($arrayData['button']) {
    case 'list':
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/academic-ai/assets/docs/";
        $arrayResponse = [
            'listFiles' => $objFile->listFiles($dir),
        ];
        break;
}

$objFile->response($arrayResponse);
