<?php
require_once "../controllers/SchefflerController.php";

class ShefflerInfoController extends SchefflerController {
    public $template = "info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Scheffler-info.php");
        $context['type'] = "текст";
        return $context;
    }
}