<?php
require_once "../../vendor/autoload.php";

use App\Models\Files;

$objFile = new Files();
$objFile->fetchArrayData();
$arrayResponse = [];

switch ($objFile->arrayData['button']) {
    case 'list':
        $dir =  "{$objFile->baseRoot}/public/assets/docs/";

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
        $dir = "{$objFile->baseRoot}/public/assets/examples/";
        break;
}

$arrayResponse['listFiles'] = $objFile->listFiles($dir);

$objFile->response($arrayResponse);
