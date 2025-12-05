<?php
require_once dirname(__DIR__) . '/app/config/config.php';

$router = require APP_PATH . '/routes.php';

<<<<<<< HEAD
$router->dispatch($_SERVER['REQUEST_URI'] ?? '/', $_SERVER['REQUEST_METHOD'] ?? 'GET');
=======
$router->dispatch($_SERVER['REQUEST_URI'] ?? '/', $_SERVER['REQUEST_METHOD'] ?? 'GET');
>>>>>>> 69d50687bdaa8b564b0b892cf1e4d3aa79f9bf58
