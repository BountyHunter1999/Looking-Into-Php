<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

// require base_path("Database.php");
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // require base_path("Core/" . $class . ".php");
    require base_path("$class.php");
});

require base_path("bootstrap.php");

// require base_path("Core/router.php");
$router = new \Core\Router();

$routes = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// this will use the _method sent if it exists otherwise follow the request method called
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

