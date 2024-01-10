<?php
namespace App\Controllers;

require_once "../../vendor/autoload.php";

use App\Config\App;
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

        if ($this->objQuestion->objConnection->getError() == 0) {
            switch ($this->arrayData['button']) {
                case 'list-subject':
                    $this->listSubject();
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
            $this->arrayResponse['message'] = 
                $this->objQuestion->objConnection->getMessage();
            $this->arrayResponse['found'] = 0;
        }

        $this->response($this->arrayResponse);
    }


    public function listSubject(): void
    {
        $objResult = $this->objQuestion->listTable($this->arrayData['identity']);
        $i = 0;
        $arraySubject = [];
        while ($row = $objResult->fetch_array()) {
            $arraySubject[$i]['id'] = $row['id'];
            $arraySubject[$i]['description'] = $row['description'];
            $i++;
        }
        if ($arraySubject != []) {
            $this->arrayResponse['arraySubject'] = $arraySubject;
            $this->arrayResponse['found'] = 1;
        } else {
            $this->arrayResponse['arraySubject'] = 'No hay asignaturas';
            $this->arrayResponse['found'] = 0;
        }

        $objResult = $this->objQuestion->listTable('theme');
        $i = 0;
        $arrayTheme = [];
        while ($row = $objResult->fetch_array()) {
            $arrayTheme[$i]['id'] = $row['id'];
            $arrayTheme[$i]['description'] = $row['description'];
            $i++;
        }

        if ($arrayTheme != []) {
            $this->arrayResponse['arrayTheme'] = $arrayTheme;
            $this->arrayResponse['foundTheme'] = 1;
        } else {
            $this->arrayResponse['arrayTheme'] = 'No hay temas';
            $this->arrayResponse['foundTheme'] = 0;
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
            $this->arrayResponse['found'] = 1;
        } else {
            $this->arrayResponse['message'] = 'Usuario no registrado';
            $this->arrayResponse['found'] = 0;
        }
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
            $this->arrayResponse['found'] = 1;
        } else {
            $this->arrayResponse['message'] = 'No ha registrado preguntas';
            $this->arrayResponse['found'] = 0;
        }
    }


    public function searchQuestionSelected(): void
    {
        $objResult = $this->objQuestion->searchQuestionSelected($this->arrayData);
        $i = 0;
        $arrayQuestionSelected = [];
        while ($row = $objResult->fetch_array()) {
            $arrayQuestionSelected[$i]['id'] = $row['id'];
            $arrayQuestionSelected[$i]['userId'] = $row['user_id'];
            $arrayQuestionSelected[$i]['subjectId'] = $row['subject_id'];
            $arrayQuestionSelected[$i]['questions'] = $row['questions'];
            $i++;
        }
        if ($arrayQuestionSelected != []) {
            $this->arrayResponse['message'] = '
                Ya registró las preguntas para esta asignatura y este tema';
            $this->arrayResponse['found'] = 1;
        } else {
            $this->arrayResponse['message'] = 'Preguntas no registradas';
            $this->arrayResponse['found'] = 0;
        }
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
