<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Classes\Arrays;
use Exception;

class Cryptography extends App
{
    private array $arrayHash;
    private array $alphabet;
    private string $key;
    private Arrays $array;

    public function __construct()
    {
        parent::__construct();

        $this->arrayHash = [];
        $this->alphabet = [];
        $this->key = "";
        $this->array = new Arrays();

        $this->fetchArrayData();


        $j = 0;
        for ($i = 32 ; $i <= 126; $i++) {
            if ($i != 60) {
                $this->alphabet[$j] = chr($i);
                $j++;
            }
        }

        switch ($this->arrayData['button']) {
            case 'encrypt':
                $this->menuEncrypt();
                break;
            case 'decrypt':
                $this->menuDecrypt();
                break;
        }
        $this->response($this->arrayResponse);
    }


    public function menuEncrypt(): void
    {
        $this->key = mb_convert_encoding(
            $this->arrayData['keyEncrypt'],
            "UTF-8"
        );
        switch ($this->arrayData['operation']) {
            case 'sustitucion':
                $this->arrayHash = 
                    mb_convert_encoding(
                        $this->encrypt(
                            $this->arrayData['plainText'], 
                            $this->key
                        ),
                        "UTF-8"
                    );
                $strOut = "
                    <strong>Cifrado sustitución y desplazamiento simple</strong>: 
                    <br>
                    <span class='text-primary'>
                        {$this->hash($this->arrayHash)}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' => $strOut
                ];
                break;
            case 'vigenere':
                $this->arrayHash = 
                    mb_convert_encoding(
                        $this->vigenereEncrypt(
                            $this->arrayData['plainText'], 
                            $this->key
                        ),
                        "UTF-8"
                    );
                $strOut = "
                    <strong>Cifrado de Vigenère</strong>:
                    <br>
                    <span class='text-primary'>
                        {$this->hash($this->arrayHash)}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' => $strOut
                ];
                break;
            case 'trasposicion':
                break;
            default: 
                $this->arrayResponse = [
                    'resultExpression' => "Seleccione un tipo de encriptación"
                ];
        }
    }


    public function menuDecrypt(): void
    {
        $this->key = mb_convert_encoding(
            $this->arrayData['keyDecrypt'],
            "UTF-8"
        );
        switch ($this->arrayData['operation']) {
            case 'sustitucion':
                $strOut = "
                    <strong>Descifrado simple</strong>: 
                    <br>
                    <span class='text-primary'>
                        {$this->decrypt(
                            $this->arrayData['codedText'], 
                            $this->key
                        )}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' => $strOut
                ];
                break;
            case 'vigenere':
                $this->arrayHash = 
                    mb_convert_encoding(
                        $this->vigenereDecrypt(
                            $this->arrayData['codedText'], 
                            $this->key
                        ),
                        "UTF-8"
                    );
                $strOut = "
                    <strong>Cifrado de Vigenère</strong>:
                    <br>
                    <span class='text-primary'>
                        {$this->hash($this->arrayHash)}
                    </span>
                ";
                $this->arrayResponse = [
                    'resultExpression' => $strOut
                ];
                break;
            case 'trasposicion':
                break;
            default: 
                $this->arrayResponse = [
                    'resultExpression' => "Seleccione un tipo de encriptación"
                ];
        }
    }


    public function hash(array $arrHash): string
    {
        $hash = "";
        for ($i = 0; $i < count($arrHash); $i++) {
            $hash .= $arrHash[$i];
        }
        return html_entity_decode($hash);
    }


    public function encrypt(string $str, string $key): array
    {
        $n = 0; 
        $constKey = (int)$key;
        for ($i = 0; $i < strlen($str); $i++) {
            for ($j = 1; $j <= $constKey; $j++) {
                do {
                    $rand = rand(32, 126);
                } while ($rand == 60);
                $this->arrayHash[$n] = chr($rand);
                $n++;
            }
        }
        
        $j = (int)$key;
        for ($i = 0; $i < strlen($str); $i++) {
            if (ord($str[$i]) == 126) {
                $char = chr(32);
            } else {
                $char = chr(ord($str[$i]) + 1);
            }
            $this->arrayHash[(int)((2 * $j - $constKey) / 2)] = $char;
            $j += $constKey;
        }
        return $this->arrayHash;
    }


    public function decrypt(string $str, string $key): string
    {
        $auxText = "";
        $constKey = (int)$key;
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


    public function vigenereEncrypt(string $str, string $key): array
    {
        $arrHash = [];
        $j = 0;
        $l = count($this->alphabet);
        for ($i = 0; $i < strlen($str); $i++) {
            $posText = $this->array->arraySearch($this->alphabet, $str[$i]);
            $posKey = $this->array->arraySearch($this->alphabet, $key[$j]);
            $pos = ($posText + $posKey) % $l;
            $arrHash[$i] = $this->alphabet[$pos];
            $j++;
            if ($j == strlen($key)) {
                $j = 0;
            }
        }
        return $arrHash;
    }


    public function vigenereDecrypt(string $str, string $key): array
    {
        $arrHash = [];
        $j = 0;
        $l = count($this->alphabet);
        for ($i = 0; $i < strlen($str); $i++) {
            $posText = $this->array->arraySearch($this->alphabet, $str[$i]);
            $posKey = $this->array->arraySearch($this->alphabet, $key[$j]);
            $pos = $posText - $posKey >= 0 ? 
                ($posText - $posKey) % $l : 
                ($posText - $posKey + $l) % $l;
            $arrHash[$i] = $this->alphabet[$pos];
            $j++;
            if ($j == strlen($key)) {
                $j = 0;
            }
        }
        return $arrHash;
    }
   
}


$objController = new Cryptography();
