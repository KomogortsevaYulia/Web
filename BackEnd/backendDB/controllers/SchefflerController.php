<?php
require_once "TwigBaseController.php"; // обязательно импортим BaseController

class SchefflerController extends TwigBaseController {
    public $title = "Шеффлера"; // название страницы
    public $template = "_object.twig"; // шаблон страницы
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
       
        $context = parent::getContext(); // вызываем родительский метод
        $context['name'] = "Scheffler";
        $context['title'] = $this->title; // добавляем title в контекст
        #$context['menu'] = $menu; // добавляем title в контекст
        return $context;
    }
    
}