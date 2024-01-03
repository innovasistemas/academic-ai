<?php
require_once "../../vendor/autoload.php";

use App\Classes\Connection;
use App\Models\Questions;

$arrayRandom = [];
$arrayResponse = [];

$objConnection = new Connection();

$objQuestion = new Questions();
$objQuestion->fetchArrayData();

if ($objConnection->getError() == 0) {
    switch ($objQuestion->arrayData['button']) {
        case 'list-subject':
            $objResult = $objConnection->query("
                SELECT * 
                FROM {$objQuestion->arrayData['identity']}
            ");
            $i = 0;
            $arraySubject = [];
            while ($row = $objResult->fetch_array()) {
                $arraySubject[$i]['id'] = $row['id'];
                $arraySubject[$i]['description'] = $row['description'];
                $i++;
            }
            if ($arraySubject != []) {
                $arrayResponse['arraySubject'] = $arraySubject;
                $arrayResponse['found'] = 1;
            } else {
                $arrayResponse['arraySubject'] = 'No hay asignaturas';
                $arrayResponse['found'] = 0;
            }

            $objResult = $objConnection->query("
                SELECT * 
                FROM theme
            ");
            $i = 0;
            $arrayTheme = [];
            while ($row = $objResult->fetch_array()) {
                $arrayTheme[$i]['id'] = $row['id'];
                $arrayTheme[$i]['description'] = $row['description'];
                $i++;
            }

            if ($arrayTheme != []) {
                $arrayResponse['arrayTheme'] = $arrayTheme;
                $arrayResponse['foundTheme'] = 1;
            } else {
                $arrayResponse['arrayTheme'] = 'No hay temas';
                $arrayResponse['foundTheme'] = 0;
            }
            
            break;
        case 'search-user':
            $objResult = $objConnection->query("
                SELECT * 
                FROM {$objQuestion->arrayData['identity']}
                WHERE code = \"{$objQuestion->arrayData['code']}\"
            ");
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
                $arrayResponse['arrayUser'] = $arrayUser;
                $arrayResponse['found'] = 1;
            } else {
                $arrayResponse['message'] = 'Usuario no registrado';
                $arrayResponse['found'] = 0;
            }
            break;
        case 'question_selected-user':
            $objResult = $objConnection->query("
                SELECT question_selected.id, subject.description AS subject_name, 
                    theme.description AS theme_name, questions
                FROM question_selected 
                INNER JOIN subject ON question_selected.subject_id = subject.id 
                INNER JOIN theme ON question_selected.theme_id = theme.id 
                WHERE user_id = \"{$objQuestion->arrayData['userId']}\"
            ");
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
                $arrayResponse['arrayQuestionSelected'] = $arrayQuestionSelected;
                $arrayResponse['found'] = 1;
            } else {
                $arrayResponse['message'] = 'No ha registrado preguntas';
                $arrayResponse['found'] = 0;
            }
            break;
        case 'search-question-selected':
            $objResult = $objConnection->query("
                SELECT * 
                FROM {$objQuestion->arrayData['identity']}
                WHERE user_id = \"{$objQuestion->arrayData['userId']}\" AND
                    subject_id = \"{$objQuestion->arrayData['subjectId']}\" AND
                    theme_id = \"{$objQuestion->arrayData['themeId']}\"
            ");
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
                $arrayResponse['message'] = '
                    Ya registró las preguntas para esta asignatura y este tema';
                $arrayResponse['found'] = 1;
            } else {
                $arrayResponse['message'] = 'Preguntas no registradas';
                $arrayResponse['found'] = 0;
            }
            break;
        case 'insert-question-selected':
            $query = "
                INSERT INTO {$objQuestion->arrayData['identity']}
                (user_id, subject_id, theme_id, questions) 
                VALUES(\"{$objQuestion->arrayData['userId']}\", \"{$objQuestion->arrayData['subjectId']}\", 
                    \"{$objQuestion->arrayData['themeId']}\", \"{$objQuestion->arrayData['questions']}\")
            ";
            if ($objConnection->actionQuery($query)) {
                $arrayResponse['message'] = 'Registro guardado correctamente';
                $arrayResponse['error'] = 0;
            } else {
                $arrayResponse['message'] = 'No se pudo guardar';
                $arrayResponse['error'] = 1;
            }
            break;
        case 'generate-random':
            if ($objQuestion->arrayData['numberQuestions'] >= $objQuestion->arrayData['questionSelect']) {
                for ($i = 0; $i < $objQuestion->arrayData['questionSelect']; $i++) {
                    $arrayRandom[$i] = 
                        $objQuestion->generateRandom(1, $objQuestion->arrayData['numberQuestions']);
                }
                $arrayResponse['randomNumber'] = $arrayRandom;
            } else {
                $arrayResponse['randomNumber'] = 
                    "No puede seleccionar más preguntas de las disponibles";
            }
            break;
    }
} else {
    $arrayResponse['message'] = $objConnection->getMessage();
    $arrayResponse['found'] = 0;
}

$objQuestion->response($arrayResponse);
