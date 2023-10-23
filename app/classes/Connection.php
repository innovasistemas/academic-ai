<?php

namespace App\Classes;

use mysqli;


class Connection
{
    public object $link;

    public function __construct(
        string $host, 
        string $user, 
        string $pass, 
        string $database
    ) 
    {
        $this->link = new mysqli($host, $user, $pass, $database);
        if ($this->link->connect_errno) {
            // echo "Problemas en la conexión a la base de datos: " . 
                // $this->link->connect_errno . " - " . $this->link->connect_error;
        } else {
            // echo "Conexion exitosa a la base de datos";
        }
    }


    public function query(string $query): object
    {
        return $this->link->query($query);
    }


    public function actionQuery(string $query): bool
    {
        return $this->link->query($query);
    }
}