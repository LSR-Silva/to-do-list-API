<?php
require __DIR__ . '\..\vendor\autoload.php';

use Slim\Factory\AppFactory;
use App\Controllers\TasksController;

$app = AppFactory::create();

// GET METHODS
$app->get('/', TasksController::class . ':list');

// POST METHODS
$app->post('/create', TasksController::class . ':create');
$app->post('/progress', TasksController::class . ':update_task_progress');

$app->run();

?>