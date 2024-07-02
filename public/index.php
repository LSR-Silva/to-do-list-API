<?php
require __DIR__ . '\..\vendor\autoload.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

use Slim\Factory\AppFactory;
use App\Controllers\TasksController;

$app = AppFactory::create();

// GET METHODS
$app->get('/', TasksController::class . ':list');

// POST METHODS
$app->post('/create', TasksController::class . ':create');

$app->run();

?>