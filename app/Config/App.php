<?php
namespace App\Config;


class App
{
    /**
     * Título aplicación
     */
    public string $appTitle = 'Academic AI';


    /**
     * URL base del sitio
     */
    public string $baseURL = 'http://localhost:80/academic-ai/';
    // public string $baseURL = 'http://localhost/academic-ai/';
    // public string $baseURL = 'https://academic-ai.000webhostapp.com/';


    /**
     * URL ruta proyecto
     */
    public string $baseRoot = 'C:/laragon/www/academic-ai';
    // public string $baseRoot = 'C:/xampp/htdocs/academic-ai';
    // public string $baseRoot = '/var/www/html/academic-ai';
    // public string $baseRoot = '/storage/ssd4/741/21241741/public_html/';


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
     * Arreglos de datos para las interfaces de usuario
     */
    protected array $arrayData = [];
    protected array $arrayResponse = [];


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