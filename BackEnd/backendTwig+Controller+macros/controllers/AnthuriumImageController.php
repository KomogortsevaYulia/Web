<?php
require_once "../controllers/AnthuriumController.php";

class AnthuriumImageController extends AnthuriumController {
    public $template = "image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
        $context['image'] = "/images/img-Anthurium.jpg";
        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Anthurium-info.php");
        $context['type'] = "картинка";
        return $context;
    }
}