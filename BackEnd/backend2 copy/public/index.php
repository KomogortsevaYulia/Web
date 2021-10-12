<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/SpathiphyllumController.php"; // добавим в самом верху ссылку на наш контроллер
require_once "../controllers/SchefflerController.php"; // добавим в самом верху ссылку на наш контроллер
// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек
$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";


$context = []; // наш словарик, данные для шаблона принято называть контекстом

$controller = null; // создаем переменную под контроллер


if ($url == "/") {
    $controller = new MainController($twig);
    
} elseif (preg_match("#/Spathiphyllum#", $url)) {
    #$title = "Спатифиллум";
    #$template = "_object.twig";
 
    #$context['name'] = "Spathiphyllum"; 
    $controller = new SpathiphyllumController($twig); // тут просто контроллер создаем
    
    if (preg_match("#/Spathiphyllum/image#", $url)) {
        $context['image'] = "/images/img-Spatif.jpg"; // передаем в контекст ключ image
        $template = "image.twig";
        $context['type'] = "картинка";
    } elseif (preg_match("#/Spathiphyllum/info#", $url)) {
        $template = "info.twig";
        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Spathiphyllum-info.php"); // передаем в контекст ключ image
        $title = "Главная";
        $context['type'] = "текст";
    }
} elseif (preg_match("#/Anthurium#", $url)) {
    $title = "Антуриум";
    $template = "_object.twig";
    $context['name'] = "Anthurium"; // передаем в контекст ключ image
    if (preg_match("#/Anthurium/image#", $url)) {
        $context['image'] = "/images/img-Anthurium.jpg"; // передаем в контекст ключ image
        $template = "image.twig";
        $context['type'] = "картинка";
    } elseif (preg_match("#/Anthurium/info#", $url)) {
        $template = "info.twig";
        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Anthurium-info.php"); // передаем в контекст ключ image
        $context['type'] = "текст";
    }

}
elseif (preg_match("#/Scheffler#", $url)) {
    #$title = "Шеффлера";
    #$template = "_object.twig";
    
    #$context['name'] = "Scheffler"; // передаем в контекст ключ image
    $controller = new SchefflerController($twig); // тут просто контроллер создаем
    
    if (preg_match("#/Scheffler/image#", $url)) {
        $context['image'] = "/images/img-Scheffler.jpg"; // передаем в контекст ключ image
        $template = "image.twig";
        $context['type'] = "картинка";
    } elseif (preg_match("#/Scheffler/info#", $url)) {
        $template = "info.twig";
        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Scheffler-info.php"); // передаем в контекст ключ image
        $context['type'] = "текст";
    }
}

// название не пихаю в контекст в роутере,
// потому что это отдельная сущность, общая для всех
//$context['title'] = $title;
#$context['menu'] = $menu;
// ну и рендерю
//echo $twig->render($template, $context);
if ($controller) {
    $controller->get();
}