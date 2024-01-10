<?php
namespace App\Classes;

class Routes
{
    public $routes = [];


    public function __construct()
    {
        
    }


    public function addRoute(string $method, string $url, $target): void
    {
        $this->routes[$method][$url] = $target;
    }


    public function matchRoute() 
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        echo "$method<br>";
        echo "$url<br>";
        if (isset($this->routes[$method])) {
            print_r($this->routes[$method]);
            echo "<br>";
            foreach ($this->routes[$method] as $routeUrl => $target) {
                print_r($routeUrl);
                print_r("<br>");
                var_dump($target);
                print_r("<br>");
                // Simple string comparison to see if the route URL matches the requested URL
                if ($routeUrl === $url) {
                    call_user_func($target);
                }
            }
        }
        // throw new Exception('Route not found');
    }
}