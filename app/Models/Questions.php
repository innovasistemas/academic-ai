<?php

namespace App\Models;

class Questions
{

    public function __construct() 
    {
        
    }


    public function generateRandom(int $min, int $max): int
    {
        return rand($min, $max);
    }
}