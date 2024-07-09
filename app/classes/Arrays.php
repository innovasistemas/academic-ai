<?php
namespace App\Classes;

class Arrays
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


    public function stack($array, $datum): array
    {
        if (count($array) < 1000) {
            $array[] = $datum;
            return $array;
        } else {
            return ['desbordamiento'];
        }
    }


    public function unStack($array): string
    {
        if (count($array) > 0) {
            return array_pop($array);
        } else {
            return 'subdesbordamiento';
        }
    }

}