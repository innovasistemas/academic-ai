<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;

class Cryptography extends App
{
    private array $arrayHash;

    public function __construct()
    {
        parent::__construct();

        $this->arrayHash = [];

        $this->fetchArrayData();

        switch ($this->arrayData['button']) {
            case 'encrypt':
                $this->arrayHash = 
                    mb_convert_encoding(
                        $this->encrypt($this->arrayData['plainText']),
                        "UTF-8"
                    );
                $strOut = "
                    <strong>Texto cifrado</strong>: 
                    <span class='text-primary'>
                        {$this->hash()}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' => $strOut
                ];
                break;
            case 'decrypt':
                $strOut = "
                    <strong>Texto descifrado</strong>: 
                    <span class='text-primary'>
                        {$this->decrypt($this->arrayData['codedText'])}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' => $strOut
                ];
                break;
        }
        $this->response($this->arrayResponse);
    }


    public function encrypt(string $str): array
    {
        $k = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            for ($j = 1; $j < 6; $j++) {
                do {
                    $rand = rand(33, 126);
                } while ($rand == 60);
                $this->arrayHash[$k] = chr($rand);
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
            // $this->arrayHash[(int)((2 * $j - 5) / 2)] = $char;
            $this->arrayHash[(int)((2 * $j - 5) / 2)] = "<b>{$char}</b>";
            $j += 5;
        }
        return $this->arrayHash;
    }


    public function hash(): string
    {
        $hash = "";
        for ($i = 0; $i < count($this->arrayHash); $i++) {
            $hash .= $this->arrayHash[$i];
        }
        return html_entity_decode($hash);
    }


    public function decrypt(string $str): string
    {
        $auxText = "";
        for ($i = 0; $i < strlen($str); $i += 5) {
            $auxText .= $str[(int)((2 * $i + 5) / 2)];
        }

        $plainText = "";
        for ($i = 0; $i < strlen($auxText); $i++) {
            if (ord($auxText[$i]) == 33) {
                $char = chr(126);
            } else {
                $char = chr(ord($auxText[$i]) - 1);
            }
            $plainText .= $char;
        }
        return html_entity_decode($plainText);
    }
   
}


$objController = new Cryptography();
