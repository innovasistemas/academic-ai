<?php
namespace App\Classes;

class Arrays
{
    public const MAX = 1000;

    public function __construct()
    {
        
    }

    // Buscar elemento
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

    // Apilar elemento
    public function stack(&$array, $datum): void
    {
        if (count($array) < self::MAX) {
            $array[] = $datum;
        } 
    }

    // Desapilar elemento
    public function unStack(&$array): string
    {
        if (count($array) > 0) {
            return array_pop($array);
        } else {
            return 'subdesbordamiento';
        }
    }

}