<?php

namespace App\Models;

use App\Config\App;

class Questions extends App
{

    public function __construct() 
    {
        parent::__construct();
    }


    public function generateRandom(int $min, int $max): int
    {
        return rand($min, $max);
    }
}