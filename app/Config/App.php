<?php

namespace App\Config;


abstract class App
{
    /**
     * Título aplicación
     */
    public string $appTitle = 'Academic AI';


    /**
     * URL base del sitio
     */
    public string $baseURL = 'http://localhost/academic-ai/';


    /**
     * URL ruta proyecto
     */
    public string $baseRoot = 'C:/xampp/htdocs/academic-ai';


    /**
     * Página de inicio
     */
    public string $indexPage = '';


    /**
     * Idioma por defecto
     */
    public string $defaultLocale = 'es';
    

    /**
     * Zona horaria
     */
    public string $appTimezone = 'America/Bogota';


    /**
     * Arreglo de datos para las interfaces de usuario
     */
    public array $arrayData;


    /**
     * Constructor
     */
    public function __construct()
    {
        date_default_timezone_set($this->appTimezone);
    }


    /**
     * Entrada y salida de datos a la aplicación
     */

    /**
     * Salida en formato JSON
     */
    public function response(array $array): void
    {
        echo json_encode($array);
    }


    /**
     * Entrada estándar de la aplicación
     */
    public function fetchArrayData(): void 
    {
        $data = file_get_contents('php://input');
        $this->arrayData = json_decode($data, TRUE);
    }


}