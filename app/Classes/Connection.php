<?php
namespace App\Classes;

use App\Config\Database;
use mysqli;


class Connection extends Database
{
    protected object $link;
    private int $error;
    private string $message;

    public function __construct() 
    {
        switch ($this->configDB['DBdriver']) {
            case "MySQLi":
                if (is_resource(@fsockopen($this->configDB['hostname'], 
                    $this->configDB['port']))) {
                    $this->link = new mysqli(
                        $this->configDB['hostname'], $this->configDB['username'], 
                        $this->configDB['password'], $this->configDB['dbname'], 
                        $this->configDB['port']
                    );
                    $this->message = "Conexión exitosa al servidor de base de datos";
                    $this->error = 0;
                } else {
                    $this->message = "No hay respuesta del servidor de base de datos";
                    $this->error = 2;
                }
                break;
            case 'PostgreSQL':
                $strConnection = "
                    hostname={$this->configDB['hostname']} 
                    port={$this->configDB['port']} 
                    dbname={$this->configDB['dbname']} 
                    user={$this->configDB['user']} 
                    password={$this->configDB['password']}
                ";
                $this->link = pg_connect($strConnection);
                break;
            default:
                $this->message = "Driver incorrecto o no especificado";
                $this->error = 1;
        }
    }


    public function getLink(): object
    {
        return $this->link;
    }


    public function getError(): int
    {
        return $this->error;
    }


    public function getMessage(): string
    {
        return $this->message;
    }
}