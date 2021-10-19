<?php
require_once "../controllers/SchefflerController.php";

class SchefflerImageController extends SchefflerController {
    public $template = "image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
            $context['image'] = "/images/img-Scheffler.jpg";
        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Scheffler-info.php");
        $context['type'] = "картинка";
        return $context;
    }
}