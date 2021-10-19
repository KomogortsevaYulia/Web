<?php
require_once "../controllers/SpathiphyllumController.php";

class SpathiphyllumInfoController extends SpathiphyllumController {
    public $template = "info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Spathiphyllum-info.php");
        $context['type'] = "текст";
        return $context;
    }
}