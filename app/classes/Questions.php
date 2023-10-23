<?php

namespace App\Classes;

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