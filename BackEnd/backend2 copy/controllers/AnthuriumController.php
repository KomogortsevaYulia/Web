<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class AnthuriumController extends TwigBaseController {
    public $title = "Антуриум"; // название страницы
    public $template = "_object.twig"; // шаблон страницы
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
       
        $context = parent::getContext(); // вызываем родительский метод
        $context['name'] = "Anthurium";
        $context['title'] = $this->title; // добавляем title в контекст
        #$context['menu'] = $menu; // добавляем title в контекст
        return $context;
    }
    
}