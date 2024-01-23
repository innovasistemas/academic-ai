<?php
namespace App\Classes;

require_once "../../vendor/autoload.php";

use App\Config\App;

class Translation extends App
{
    public $lang = [];


    public function __construct()
    {
        switch ($this->defaultLocale) {
            case 'es':
                $this->lang['es']['title'] = 'Academic AI';
                $this->lang['es']['indexTitle'] = 'Bienvenido a Academic AI';
                $this->lang['es']['titleCard1'] = 'Aplicaciones';
                
                break;
            case 'en':
                $this->lang['en']['title'] = 'Academic AI';
                $this->lang['en']['indexTitle'] = 'Welcome to Academic AI';
                $this->lang['en']['titleCard1'] = 'Applications';
                    
                break;
            
        }
        header("Location: ../");
    }
}


$objTrad = new Translation();