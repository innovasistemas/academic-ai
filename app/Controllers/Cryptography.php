<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use Exception;

class Cryptography extends App
{
    private array $arrayHash;
    private string $key;

    public function __construct()
    {
        parent::__construct();

        $this->arrayHash = [];

        $this->fetchArrayData();

        switch ($this->arrayData['button']) {
            case 'encrypt':
                $this->key = 
                    mb_convert_encoding(
                        $this->arrayData['keyEncrypt'],
                        "UTF-8"
                    );
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
                $this->key = 
                    mb_convert_encoding(
                        $this->arrayData['keyDecrypt'],
                        "UTF-8"
                    );
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
        $n = 0; 
        $constKey = (int)$this->key;
        for ($i = 0; $i < strlen($str); $i++) {
            for ($j = 1; $j <= $constKey; $j++) {
                do {
                    $rand = rand(32, 126);
                } while ($rand == 60);
                $this->arrayHash[$n] = chr($rand);
                $n++;
            }
        }
        
        $j = (int)$this->key;
        for ($i = 0; $i < strlen($str); $i++) {
            if (ord($str[$i]) == 126) {
                $char = chr(32);
            } else {
                $char = chr(ord($str[$i]) + 1);
            }
            $this->arrayHash[(int)((2 * $j - $constKey) / 2)] = 
                "<b>{$char}</b>";
            $j += $constKey;
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
        $constKey = (int)$this->key;
        for ($i = 0; $i < strlen($str); $i += $constKey) {
            $pos = (int)((2 * $i + $constKey) / 2);
            if ($pos >= 0 && $pos <= strlen($str) - 1) {
                $auxText .= $str[$pos];
            }
        }

        $plainText = "";
        for ($i = 0; $i < strlen($auxText); $i++) {
            if (ord($auxText[$i]) == 32) {
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
