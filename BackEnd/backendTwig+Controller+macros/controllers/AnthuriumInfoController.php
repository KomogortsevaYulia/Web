<?php
require_once "../controllers/AnthuriumController.php";

class AnthuriumInfoController extends AnthuriumController {
    public $template = "info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Anthurium-info.php");
        $context['type'] = "текст";
        return $context;
    }
}