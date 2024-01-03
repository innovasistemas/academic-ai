<?php

namespace App\Config;


class Database 
{
    /**
     * Configuración por defecto de la base de datos
     */
    protected array $configDB = [
        'DBdriver' => "MySQLi",
        'hostname' => "localhost",
        'username' => "root",
        'password' => "",
        'port' => 3306,
        'dbname' => "academic-ai-001",
    ];
}