<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;

class Cryptography extends App
{
    public function __construct()
    {
        parent::__construct();

        $this->fetchArrayData();

        switch ($this->arrayData['button']) {
            case 'encrypt':
                $arrHash = 
                    mb_convert_encoding(
                        $this->encrypt($this->arrayData['string']),
                        "UTF-8",
                        mb_detect_encoding($this->arrayData['string'])
                    );
                $strOut = "
                    <strong>Hash</strong>: 
                    <span class='text-primary'>
                        {$this->hash($arrHash)}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' =>  $strOut
                ];
                break;
        }
        $this->response($this->arrayResponse);
    }


    public function encrypt(string $str): array
    {
        $arrHash = [];
        $k = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            for ($j = 1; $j < 6; $j++) {
                do {
                    $rand = rand(33, 126);
                } while ($rand == 60);
                $arrHash[$k] = chr($rand);
                $k++;
            }
        }
        
        $j = 5;
        for ($i = 0; $i < strlen($str); $i++) {
            if (ord($str[$i]) == 126) {
                $char = chr(33);
            } else {
                $char = chr(ord($str[$i]) + 1);
            }
            // $arrHash[(int)((2 * $j - 5) / 2)] = $char;
            $arrHash[(int)((2 * $j - 5) / 2)] = "<b>{$char}</b>";
            $j += 5;
        }
        return $arrHash;
    }


    public function hash(array $arrHash): string
    {
        $hash = "";
        for ($i = 0; $i < count($arrHash); $i++) {
            $hash .= $arrHash[$i];
        }
        return html_entity_decode($hash);
    }


    public function decrypt(string $key, array $arrHash)
    {
        $hash = "";
        if ($key == "123") {
            for ($i = 0; $i < count($arrHash); $i++) {
                $hash .= $arrHash[$i];
            }
            return html_entity_decode($hash);
        } else {
            return "Clave incorrecta";
        }
    }
   
}


$objController = new Cryptography();
