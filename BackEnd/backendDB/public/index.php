<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/Controller404.php"; // добавил
require_once "../controllers/ObjectController.php"; // добавил 
require_once "../controllers/SearchController.php"; // добавил 
require_once "../controllers/ObjectCreateController.php"; // добавил 

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, ["debug" => true ]);

$twig->addExtension(new \Twig\Extension\DebugExtension()); 

$pdo = new PDO("mysql:host=localhost;dbname=plants;charset=utf8", "root", "");

$router = new Router($twig, $pdo);

$router->add("/", MainController::class);
$router->add("/flower/(?P<id>\d+)", ObjectController::class); 
$router->add("/search", SearchController::class);
$router->add("/flower/create", ObjectCreateController::class);
$router->get_or_default(Controller404::class);

