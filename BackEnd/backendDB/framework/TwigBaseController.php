<?php
require_once "BaseController.php"; // обязательно импортим BaseController

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = ""; // шаблон страницы
    protected \Twig\Environment $twig ; // ссылка на экземпляр twig, для рендернига
    
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }

    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $menu = [ // добавил список словариков
            [
                 "title" => "Спатифиллум",
         
                 "url-main" => "/Spathiphyllum",
                 "url-image" => "/Spathiphyllum/image",
                 "url-info" => "/Spathiphyllum/info",
             ],
             [
                 "title" => "Антуриум",
                 "url-main" => "/Anthurium",
                 "url-image" => "/Anthurium/image",
                 "url-info" => "/Anthurium/info",
             ]
             ,
             [
                 "title" => "Шеффлера",
                 "url-main" => "/Scheffler",
                 "url-image" => "/Scheffler/image",
                 "url-info" => "/Scheffler/info",
             ]
         ];
        $context['menu'] = $menu; // добавляем title в контекст
        return $context;
    }
    
    // функция гет, рендерит результат используя $template в качестве шаблона
    // и вызывает функцию getContext для формирования словаря контекста
    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}