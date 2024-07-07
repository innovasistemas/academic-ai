<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Classes\Util;
use Exception;

class Simulations extends App
{
    private float $x0;
    private float $v0;
    private float $a;
    private int $time;
    private string $unit;
    private Util $util;
    
    private const g = 9.8;
    private const c = 299792458;

    public function __construct()
    {
        parent::__construct();

        $this->util = new Util();

        $this->fetchArrayData();

        $this->x0 = (float)$this->arrayData['initialPosition'];
        $this->v0 = (float)$this->arrayData['initialVelocity'];
        $this->a = (float)$this->arrayData['acceleration'];
        $this->time = (int)$this->arrayData['time'];

        switch ($this->arrayData['unit']) {
            case "1":
                $this->unit = "SI";
                break;
            case "2":
                $this->unit = "Gaussiano";
                break;
            case "3":
                $this->unit = "Inglés";
            default:
                $this->unit = "SI";
                break;
        }

        switch ($this->arrayData['button']) {
            case 'simulation':
                $this->menuSimulation();
                break;
        }
        $this->response($this->arrayResponse);
    }


    public function menuSimulation(): void
    {
        switch ($this->arrayData['operation']) {
            case 'cl':
                $this->arrayResponse = [
                    'resultExpression' => $this->freeFall()
                ];
                break;
            case 'mru':
                $this->arrayResponse = [
                    'resultExpression' => $this->mru()
                ];
                break;
            case 'mrua':
                $this->arrayResponse = [
                    'resultExpression' => $this->mrua()
                ];
                break;
            default: 
                $this->arrayResponse = [
                    'resultExpression' => "Seleccione un tipo de simulación"
                ];
        }
    }


    public function freeFall(): string
    {
        $table = "<h4>Caída libre - Sistema de unidades: {$this->unit}</h4>";
        $table .= "<table class='table table-hover table-white table-bordered'>";
        $table .= "<tr>";
        $table .= "<theader>";
        $table .= "<th>Tiempo (t)</th>";
        $table .= "<th>Distancia recorrida (y)</th>";
        $table .= "<theader>";
        $table .= "</tr>";
        $table .= "<tbody>";
        for ($t = 0; $t <= $this->time; $t++) {
            $y = 1 / 2 * self::g * $t * $t;
            $table .= "<tr>";
            $table .= "<td>$t</td>";
            $table .= "<td>$y</td>";
            $table .= "</tr>";
        } 
        $table .= "</tbody>";
        $table .= "</table>";
        return $table;
    }


    public function mru(): string
    {
        $table = "<h4>";
        $table .= "Movimiento Rectilíneo Uniforme MRU - ";
        $table .= "Sistema de unidades: {$this->unit}";
        $table .= "</h4>";
        $table .= "<table class='table table-hover table-white table-bordered'>";
        $table .= "<tr>";
        $table .= "<theader>";
        $table .= "<th>Tiempo (t)</th>";
        $table .= "<th>Distancia recorrida (x)</th>";
        $table .= "<theader>";
        $table .= "</tr>";
        $table .= "<tbody>";
        for ($t = 0; $t <= $this->time; $t++) {
            $x = $this->x0 + $this->v0 * $t;
            $table .= "<tr>";
            $table .= "<td>$t</td>";
            $table .= "<td>$x</td>";
            $table .= "</tr>";
        } 
        $table .= "</tbody>";
        $table .= "</table>";
        return $table;
    }


    public function mrua(): string
    {
        $table = "<h4>";
        $table .= "Movimiento Rectilíneo Uniforme Acelerado MRUA - ";
        $table .= "Sistema de unidades: {$this->unit}";
        $table .= "</h4>";
        $table .= "<table class='table table-hover table-white table-bordered'>";
        $table .= "<tr>";
        $table .= "<theader>";
        $table .= "<th>Tiempo (t)</th>";
        $table .= "<th>Distancia recorrida (x)</th>";
        $table .= "<th>Velocidad alcanzada (v)</th>";
        $table .= "<theader>";
        $table .= "</tr>";
        $table .= "<tbody>";
        for ($t = 0; $t <= $this->time; $t++) {
            $x = $this->x0 + $this->v0 * $t + 1 / 2 * $this->a * $t * $t;
            $v = $this->v0 + $this->a * $t;
            $table .= "<tr>";
            $table .= "<td>$t</td>";
            $table .= "<td>$x</td>";
            $table .= "<td>$v</td>";
            $table .= "</tr>";
        } 
        $table .= "</tbody>";
        $table .= "</table>";
        return $table;
    }
   
}


$objController = new Simulations();
