<?php
require_once "../../vendor/autoload.php";

use App\Classes\Util;
use App\Classes\Files;

$objUtil = new Util();
$objFile = new Files($objUtil->arrayData);
$arrayResponse = [];

switch ($objUtil->arrayData['button']) {
    case 'list':
        $dir =  $objUtil->baseRoot() . "/assets/docs/";

        // Pendiente implementar
        // $r1 = "$urlBase/app/Views/template/header.php";
        // $r2 = "$urlBase/app/Views/template/menu.php";
        // $r3 = "$urlBase/app/Views/template/footer.php";
        // $name = $objFile->loadView($r1, $r2, $r3);
        // header("Location: ../Views/temp/$name", TRUE, 307);
        // exit();
        // $arrayResponse = [
        //     'view' => $name
        // ];

        break;
    case 'list-program':
        $dir = $objUtil->baseRoot() . "assets/examples/";
        // $dir = $config['url']['root'] . "assets/examples/";
        break;
}

$arrayResponse['listFiles'] = $objFile->listFiles($dir);

$objUtil->response($arrayResponse);
