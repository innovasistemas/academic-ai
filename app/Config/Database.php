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
        'dbname' => "academic-ai-001"
    ];
    // protected array $configDB = [
    //     'DBdriver' => "MySQLi",
    //     'hostname' => "localhost",
    //     'username' => "id21241741_admin_root",
    //     'password' => "Caballo10+",
    //     'port' => 3306,
    //     'dbname' => "id21241741_academic_ai_innovasistemas"
    // ];
}