<?php
require_once "../controllers/SpathiphyllumController.php";

class SpathiphyllumImageController extends SpathiphyllumController {
    public $template = "image.twig";
      
    public function getContext(): array
    {
        $context = parent::getContext(); 
            $context['image'] = "/images/img-Spatif.jpg";
        $context['text'] = file_get_contents("C:/Yulia/Study/3_course/Web/BackEnd/backend1/views/Spathiphyllum-info.php");
        $context['type'] = "картинка";
        return $context;
    }
}