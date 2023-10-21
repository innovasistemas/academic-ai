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
        break;
    case 'list-program':
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/academic-ai/assets/examples/";
        break;
}
$arrayResponse = [
    'listFiles' => $objFile->listFiles($dir),
];

$objFile->response($arrayResponse);
