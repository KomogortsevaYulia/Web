<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once '../middlewares/LoginRequiredMiddeware.php';
require_once '../middlewares/HistoryMiddeware.php';
// require_once '../framework/BaseRestController.php';
require_once "../controllers/MainController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/Controller404.php"; // добавил
require_once "../controllers/ObjectController.php"; // добавил 
require_once "../controllers/SearchController.php"; // добавил 
require_once "../controllers/ObjectCreateController.php"; // добавил 
require_once "../controllers/TypesCreateController.php"; // добавил 
require_once "../controllers/TypesController.php"; // добавил 
require_once "../controllers/ObjectDeleteController.php"; // добавил
require_once "../controllers/ObjectUpdateController.php"; // добавил

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, ["debug" => true ]);

$twig->addExtension(new \Twig\Extension\DebugExtension()); 

$pdo = new PDO("mysql:host=localhost;dbname=plants;charset=utf8", "root", "");

$router = new Router($twig, $pdo);

$router->add("/", MainController::class);
$router->add("/flower/(?P<id>\d+)", ObjectController::class)->middleware(new HistoryMiddeware());
$router->add("/search", SearchController::class)->middleware(new HistoryMiddeware());
$router->add("/flower/create", ObjectCreateController::class)->middleware(new LoginRequiredMiddeware())->middleware(new HistoryMiddeware());
$router->add("/types/create", TypesCreateController::class)->middleware(new LoginRequiredMiddeware());
$router->add("/types", TypesController::class);
$router->add("/flower/(?P<id>\d+)/delete", ObjectDeleteController::class)->middleware(new LoginRequiredMiddeware());
$router->add("/flower/(?P<id>\d+)/edit", ObjectUpdateController::class)->middleware(new LoginRequiredMiddeware());


// $router->add("/flower-api", BaseRestController::class);
// $router->add("/flower-api/(?P<id>\d+)", BaseRestController::class);
// $router->add("/flower-api/(?P<id>\d+)/edit", BaseRestController::class);
// $router->add("/flower-api/create", BaseRestController::class);
$router->get_or_default(Controller404::class);

