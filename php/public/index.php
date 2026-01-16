<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\RssController;
use App\Router;

define('PUBLIC_DIR', __DIR__);
$router = new Router();

// Define routes
$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('GET', '/post/{slug}', [PostController::class, 'show']);
$router->addRoute('GET', '/feed', [RssController::class, 'show']);

// Handle the current request
echo $router->resolve();
