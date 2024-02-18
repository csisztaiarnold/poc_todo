<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\TaskController;
use App\Controllers\UserController;
use MiladRahimi\PhpRouter\Router;

$settings = parse_ini_file(__DIR__ . '/../.env');

// Error and exception handling.
$whoops = new Whoops\Run();
$whoops->register();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());

// The router.
$router = Router::create();
$router->get('/', TaskController::class);
$router->post('/store_task', [TaskController::class, 'storeTask']);
$router->post('/delete_task', [TaskController::class, 'deleteTask']);
$router->post('/edit_task', [TaskController::class, 'editTask']);
$router->post('/update_task_status', [TaskController::class, 'updateTaskStatus']);
$router->post('/return_tasks', [TaskController::class, 'returnTasks']);
$router->get('/login', [UserController::class, 'login']);
$router->get('/logout', [UserController::class, 'logout']);
$router->post('/authenticate', [UserController::class, 'authenticate']);
$router->dispatch();