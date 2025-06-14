<?php
declare(strict_types = 1);

namespace App\Routes;

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->dispatch(); 
