<?php

/**
 * Configuraciones globales
 */

 $config['global']['title'] = "Academic AI";


/**
 * Configuración aplicación
 */

$config['url']['base'] = "http://" . $_SERVER['SERVER_NAME'] . "/academic-ai/";
$config['url']['root'] = $_SERVER['DOCUMENT_ROOT'] . "/academic-ai/";


/**
 * Configuración de la base de datos MariaDB - MySQL
 */

$config['db']['host'] = "localhost";
$config['db']['user'] = "root";
$config['db']['password'] = "";
$config['db']['name'] = "academic-ai-001";
$config['db']['port'] = 3306;