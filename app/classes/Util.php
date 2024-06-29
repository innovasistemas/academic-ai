<?php
namespace App\Classes;

class Util
{

    public function __construct()
    {
        
    }


    public function arraySearch(array $arrayData, $datum): int
    {
        $pos = -1;
        $i = 0;
        while ($i < count($arrayData) && $pos == -1) {
            if ($arrayData[$i] == $datum) {
                $pos = $i;
            } else {
                $i++;
            }
        }
        return $pos;
    }

}