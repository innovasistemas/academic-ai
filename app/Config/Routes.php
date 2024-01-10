<?php
// https://tech.jotform.com/what-is-router-and-how-to-create-your-own-router-with-php-fad811cf2873
namespace App\Config;

require_once "../../vendor/autoload.php";

use App\Classes\Routes;

$router = new Routes();

$router->addRoute('GET', '/blogs1', function() {
    echo "My route is working! 1";
});
$router->addRoute('GET', '/blogs2', function() {
    echo "My route is working! 2";
});
$router->addRoute('GET', '/blogs3', function() {
    echo "My route is working! 3";
});

// var_dump($router->routes);
$router->matchRoute();
print_r($router->routes);

