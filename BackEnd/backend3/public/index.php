<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек
$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
// $image = ""; убираем

$context = []; // наш словарик, данные для шаблона принято называть контекстом

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/Spathiphyllum#", $url)) {
    $title = "Спатифиллум";
    $template = "_object.twig";
  
    ////////////////////////////////////
    if (preg_match("#/Spathiphyllum/image#", $url)) {
       
        $template = "image.twig";
        $context['image'] = "/images/img-Spatif.jpg"; // передаем в контекст ключ image
    } elseif (preg_match("#/Spathiphyllum/info#", $url)) {
        
        $template = "sp_info.twig";
    }
} elseif (preg_match("#/Anthurium#", $url)) {
    $title = "Антуриум";
    $template = "_object.twig";
    
    if (preg_match("#/Anthurium/image#", $url)) {
       
        $context['image'] = "/images/img-Anthurium.jpg"; // передаем в контекст ключ image
    
        $template = "image.twig";
    } elseif (preg_match("#/Anthurium/info#", $url)) {
        
        $template = "an_info.twig";
    }
}

// название не пихаю в контекст в роутере,
// потому что это отдельная сущность, общая для всех
$context['title'] = $title;

// ну и рендерю
echo $twig->render($template, $context);
?>