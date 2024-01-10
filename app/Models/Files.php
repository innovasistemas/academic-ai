<?php

namespace App\Models;

class Files
{
    public function __construct() 
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


    public function loadView($view1, $view2, $view3)
    {
        // Pendiente: debe estar en otra clase de classes o config
        // $name = "view";
        $name = time();
        $file = fopen("../Views/temp/$name.php", "a+");
        $file1 = fopen($view1, "r");
        $file2 = fopen($view2, "r");
        $file3 = fopen($view3, "r");
        
        $x = "";
        while ($line = fgets($file1)) {
            $x .= $line;
        }
        while ($line = fgets($file2)) {
            $x .= $line;

        }
        while ($line = fgets($file3)) {
            $x .= $line;

        }
        fwrite($file, $x);
        fclose($file);
        fclose($file1);
        fclose($file2);
        fclose($file3);
        return "$name.php";
    }
}