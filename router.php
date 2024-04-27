<?php


$routes = glob(__DIR__ . "/pages/*.php");

$pages  = array_map(function($page) {
   return basename($page, ".php");
},$routes);

foreach ($routes as $route) {
    
    if ($path ===  basename($route, ".php")) {
        
        require($route);

        return;
    }

}

echo '<h1>404 | Page Not Found</h1>';
