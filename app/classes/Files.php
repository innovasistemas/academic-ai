<?php

namespace App\Classes;

class Files
{


    public function __construct($arrayData) 
    {
        
    }


    public function listFiles(string $folder): string
    {
        $dir = opendir($folder); 
        $listFiles = "";
        while ($file = readdir($dir)) {
            if ($file != "." && $file != "..") {
                $listFiles .= $file . ",";
            }
        }
        closedir($dir);
        return $listFiles;
    }
   

    public function response($array)
    {
        echo json_encode($array);
    }
}