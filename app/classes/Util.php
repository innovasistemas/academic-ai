<?php

namespace App\Classes;


class Util
{
    
    public array $arrayData;
    private array $config;

    public function __construct() 
    {
        // leer archivo de configuración para capturar estos valores (pendiente)
        $this->config['url']['base'] = 
            "http://" . $_SERVER['SERVER_NAME'] . "/academic-ai/";
        $this->config['url']['root'] = 
            $_SERVER['DOCUMENT_ROOT'] . "/academic-ai/";

        $this->config['db']['host'] = "localhost";
        $this->config['db']['user'] = "root";
        $this->config['db']['password'] = "";
        $this->config['db']['name'] = "academic-ai-001";
        $this->config['db']['port'] = 3306;



        $data = file_get_contents('php://input');
        $this->arrayData = json_decode($data, TRUE);
    }


    public function response(array $array): void
    {
        echo json_encode($array);
    }


    public function baseRoot(): string
    {
        return $this->config['url']['root'];
    }


    public function baseURL(): string
    {
        return $this->config['url']['base'];
    }


    public function getConfigDB(): array
    {
        return $this->config['db'];
    }
}