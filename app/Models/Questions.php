<?php

namespace App\Models;

require_once "../../vendor/autoload.php";

use App\Classes\Connection;

class Questions
{
    public object $objConnection;

    public function __construct() 
    {
        $this->objConnection = new Connection();
    }


    public function listTable(string $entity): object
    {
        return $this->objConnection->query("
            SELECT * 
            FROM {$entity}
        ");
    }


    public function searchDatum(string $entity, string $field, string $datum): object
    {
        return $this->objConnection->query("
            SELECT * 
            FROM {$entity}
            WHERE {$field} = \"{$datum}\"
        ");
    }


    public function questionSelectedUser(string $user): object
    {
        return $this->objConnection->query("
            SELECT question_selected.id, subject.description AS subject_name, 
                theme.description AS theme_name, questions
            FROM question_selected 
            INNER JOIN subject ON question_selected.subject_id = subject.id 
            INNER JOIN theme ON question_selected.theme_id = theme.id 
            WHERE user_id = \"{$user}\"
            ORDER BY subject_name, theme_name
        ");
    }


    public function searchQuestionSelected(array $arrayData): object
    {
        return $this->objConnection->query("
            SELECT * 
            FROM {$arrayData['identity']}
            WHERE user_id = \"{$arrayData['userId']}\" AND
                subject_id = \"{$arrayData['subjectId']}\" AND
                theme_id = \"{$arrayData['themeId']}\"
        ");
    }


    public function addQuestions(array $arrayData): bool
    {
        $query = "
            INSERT INTO {$arrayData['identity']}
            (user_id, subject_id, theme_id, questions) 
            VALUES(
                \"{$arrayData['userId']}\", 
                \"{$arrayData['subjectId']}\", 
                \"{$arrayData['themeId']}\", 
                \"{$arrayData['questions']}\"
            )
        ";
        return $this->objConnection->actionQuery($query);
    }


    public function generateRandom(int $min, int $max): int
    {
        return rand($min, $max);
    }
}