<?php

namespace App\Classes;

use mysqli;


class Connection
{
    private object $link;
    private int $error;
    private string $message;

    public function __construct(array $paramsDB) 
    {
        if (is_resource(@fsockopen($paramsDB['host'], $paramsDB['port']))) {
            $this->link = new mysqli(
                $paramsDB['host'], $paramsDB['user'], $paramsDB['password'], 
                $paramsDB['name'], $paramsDB['port']
            );
            $this->message = "Conexión exitosa al servidor de base de datos";
            $this->error = 0;
        } else {
            $this->message = "No hay respuesta del servidor de base de datos";
            $this->error = 1;
        }
    }


    public function getError(): int
    {
        return $this->error;
    }


    public function getMessage(): string
    {
        return $this->message;
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