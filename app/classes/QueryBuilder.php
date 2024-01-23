<?php
namespace App\Classes;

use App\Classes\Connection;
// use mysqli;


class QueryBuilder extends Connection
{
    private string $strSelect = '';
    private string $strFrom = '';
    private string $strWhere = '';

    public function __construct() 
    {
        parent::__construct();
    }


    public function get(string $entity): object
    {
        return $this->link->query("
            SELECT * 
            FROM {$entity}
        ");
    }


    public function query(string $query)
    {
        return $this->link->query($query);
    }


    public function select($arrayFields): void
    {
        $this->strSelect = implode(",", $arrayFields);
    }


    public function from($arrayEntity): void
    {
        $this->strFrom = implode(",", $arrayEntity);
    }


    public function where($field, $datum, $operator = '='): void
    {
        if (strlen($this->strWhere) == 0) {
            $this->strWhere .= " {$field} {$operator} '{$datum}'";
        } else {
            $this->strWhere .= " AND {$field} {$operator} '{$datum}'";
        }
        // echo $this->strWhere;
    }
}