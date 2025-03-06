<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$routes = require("routes.php");

foreach ($routes as $controller) {
    require_once "controller/" . explode("@", $controller)[0] . ".php"; // Use "controller/"
}

if (array_key_exists($uri, $routes)) {
    // Handle static routes
    list($controller, $method) = explode('@', $routes[$uri]);
    $instance = new $controller();
    $instance->$method();
} else {
    // Handle dynamic routes like /show/{id}, /edit/{id}, /update/{id}, and /delete/{id}
    if (preg_match('#^/show/(\d+)$#', $uri, $matches)) {
        $id = $matches[1];
        $instance = new BlogController();
        $instance->show($id);
    } elseif (preg_match('#^/edit/(\d+)$#', $uri, $matches)) {
        $id = $matches[1];
        $instance = new BlogController();
        $instance->edit($id);
    } elseif (preg_match('#^/update/(\d+)$#', $uri, $matches)) {
        $id = $matches[1];
        $instance = new BlogController();
        $instance->update($id);
    } elseif (preg_match('#^/delete/(\d+)$#', $uri, $matches)) { // Added delete route handling
        $id = $matches[1];
        $instance = new BlogController();
        $instance->delete($id);
    } else {
        http_response_code(404);
        echo "Lapa nav atrasta!";
        exit();
    }
}
