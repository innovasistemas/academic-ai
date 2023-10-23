<?php

namespace App\Classes;

class Util
{

    public function __construct() 
    {
        
    }


    public function response(array $array): void
    {
        echo json_encode($array);
    }
}