<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
use App\Classes\Validation;
use App\Models\Questions as QuestionsModel;

class Questions extends App
{
    private object $objQuestion;
    private array $arrayResponse = [];

    public function __construct() 
    {
        parent::__construct();

        $this->objQuestion = new QuestionsModel();
        $this->fetchArrayData();

        if ($this->objQuestion->db->getError() == 0) {
            switch ($this->arrayData['button']) {
                case 'list-loading':
                    $this->listLoading();
                    break;
                case 'search-user':
                    $this->searchUser();
                    break;
                case 'question_selected-user':
                    $this->questionSelectedUser();
                    break;
                case 'search-question-selected':
                    $this->searchQuestionSelected();
                    break;
                case 'insert-question-selected':
                    $this->insertQuestionSelected();
                    break;
                case 'generate-random':
                    $this->generateRandom();
                    break;
            }
        } else {
            $this->arrayResponse['message'] = $this->objQuestion->db->getMessage();
            $this->arrayResponse['found'] = $this->objQuestion->db->getError();
        }

        $this->response($this->arrayResponse);
    }


    public function listLoading(): void
    {
        foreach ($this->arrayData['entity'] as $value) {
            $objResult = $this->objQuestion->listTable(strtolower($value));
            $i = 0;
            $arrayEntity = [];
            while ($row = $objResult->fetch_array()) {
                $arrayEntity[$i]['id'] = $row['id'];
                $arrayEntity[$i]['description'] = $row['description'];
                $i++;
            }
            if ($arrayEntity != []) {
                $this->arrayResponse["array$value"] = $arrayEntity;
            } else {
                $this->arrayResponse["array$value"] = 'No hay asignaturas';
            }
            $this->arrayResponse["found$value"] = $objResult->num_rows;
        }
    }


    public function searchUser(): void
    {
        $objResult = $this->objQuestion->searchDatum(
            $this->arrayData['identity'], 'code', $this->arrayData['code']);
        $i = 0;
        $arrayUser = [];
        while ($row = $objResult->fetch_array()) {
            $arrayUser[$i]['id'] = $row['id'];
            $arrayUser[$i]['code'] = $row['code'];
            $arrayUser[$i]['firstName'] = $row['first_name'];
            $arrayUser[$i]['lastName'] = $row['last_name'];
            $i++;
        }
        if ($arrayUser != []) {
            $this->arrayResponse['arrayUser'] = $arrayUser;
        } else {
            $this->arrayResponse['message'] = 'Usuario no registrado';
        }
        $this->arrayResponse['found'] = $objResult->num_rows;
    }


    public function questionSelectedUser(): void
    {
        $objResult = $this->objQuestion->questionSelectedUser(
            $this->arrayData['userId']);
        $i = 0;
        $arrayQuestionSelected = [];
        while ($row = $objResult->fetch_array()) {
            $arrayQuestionSelected[$i]['id'] = $row['id'];
            $arrayQuestionSelected[$i]['subject'] = $row['subject_name'];
            $arrayQuestionSelected[$i]['theme'] = $row['theme_name'];
            $arrayQuestionSelected[$i]['questions'] = $row['questions'];
            $i++;
        }
        if ($arrayQuestionSelected != []) {
            $this->arrayResponse['arrayQuestionSelected'] = $arrayQuestionSelected;
        } else {
            $this->arrayResponse['message'] = 'No ha registrado preguntas';
        }
        $this->arrayResponse['found'] = $objResult->num_rows;
    }


    public function searchQuestionSelected(): void
    {
        $objResult = $this->objQuestion->searchQuestionSelected($this->arrayData);
        if ($objResult->num_rows > 0) {
            $this->arrayResponse['message'] = '
                Ya registró las preguntas para esta asignatura y este tema';
        } else {
            $this->arrayResponse['message'] = 'Preguntas no registradas';
        }
        $this->arrayResponse['found'] = $objResult->num_rows;
    }


    public function insertQuestionSelected(): void
    {
        if ($this->objQuestion->addQuestions($this->arrayData)) {
            $this->arrayResponse['message'] = 'Registro guardado correctamente';
            $this->arrayResponse['error'] = 0;
        } else {
            $this->arrayResponse['message'] = 'No se pudo guardar';
            $this->arrayResponse['error'] = 1;
        }
    }


    public function generateRandom(): void
    {
        $arrayRandom = [];
        if ($this->arrayData['numberQuestions'] >= 
            $this->arrayData['questionSelect']) {
            for ($i = 0; $i < $this->arrayData['questionSelect']; $i++) {
                $arrayRandom[$i] = 
                    $this->objQuestion->generateRandom(
                        1, $this->arrayData['numberQuestions']);
            }
            $this->arrayResponse['randomNumber'] = $arrayRandom;
        } else {
            $this->arrayResponse['randomNumber'] = 
                "No puede seleccionar más preguntas de las disponibles";
        }
    }
}


$objController = new Questions();
