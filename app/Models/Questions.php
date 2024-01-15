<?php

namespace App\Models;

require_once "../../vendor/autoload.php";

use App\Classes\QueryBuilder;

class Questions
{
    public object $db;

    public function __construct() 
    {
        $this->db = new QueryBuilder();
    }


    public function listTable(string $entity): object
    {
        return $this->db->get($entity);
    }


    public function searchDatum(string $entity, string $field, string $datum): object
    {
        // $this->db->select(['*']);
        // $this->db->from([$entity]);
        // $this->db->where($field, $datum);
        return $this->db->query("
            SELECT * 
            FROM {$entity}
            WHERE {$field} = \"{$datum}\"
        ");
    }


    public function questionSelectedUser(string $user): object
    {
        return $this->db->query("
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
        return $this->db->query("
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
        return $this->db->query($query);
    }


    public function generateRandom(int $min, int $max): int
    {
        return rand($min, $max);
    }
}