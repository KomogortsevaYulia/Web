<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/SpathiphyllumController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/SchefflerController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/AnthuriumController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/Controller404.php"; // добавил
require_once "../controllers/ObjectController.php"; // добавил 
require_once "../controllers/ObjectInfoController.php"; // добавил 
require_once "../controllers/ObjectImageController.php"; // добавил 

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension()); // и активируем расширение

$pdo = new PDO("mysql:host=localhost;dbname=plants;charset=utf8", "root", "");
$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/Anthurium", AnthuriumController::class);
$router->add("/Scheffler", SchefflerController::class);
$router->add("/Spathiphyllum", SpathiphyllumController::class);
// помните нашу регулярку, которую выше, делали, собственно вот сюда ее и загнали
$router->add("/flower/(?P<id>\d+)", ObjectController::class); 
$router->add("/flower/(?P<id>\d+)/info", ObjectInfoController::class); 
$router->add("/flower/(?P<id>\d+)/image", ObjectImageController::class);
$router->get_or_default(Controller404::class);

