<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Models\Files as FilesModel;

class Files extends App
{
    private object $objFile;

    public function __construct()
    {
        parent::__construct();

        $this->objFile = new FilesModel();
        $this->fetchArrayData();

        switch ($this->arrayData['button']) {
            case 'list':
                $this->listFiles("{$this->baseRoot}/public/assets/docs/");
        
                // Pendiente implementar
                // $r1 = "$urlBase/app/Views/template/header.php";
                // $r2 = "$urlBase/app/Views/template/menu.php";
                // $r3 = "$urlBase/app/Views/template/footer.php";
                // $name = $this->objFile->loadView($r1, $r2, $r3);
                // header("Location: ../Views/temp/$name", TRUE, 307);
                // exit();
                // $arrayResponse = [
                //     'view' => $name
                // ];
        
                break;
            case 'list-program':
                $this->listFiles("{$this->baseRoot}/public/assets/examples/{$this->arrayData['element']}");
                break;
        }

        $this->response($this->arrayResponse);
    }


    public function listFiles(string $dir): void
    {
        $this->arrayResponse['listFiles'] = $this->objFile->listFiles($dir);
    }
}


$objController = new Files();
