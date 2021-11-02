<?php
require_once "BasePlantsTwigController.php"; 

class MainController extends BasePlantsTwigController {
    public $template = "main.twig";
    public $title = "Главная";
    // добавим метод getContext()
    public function getContext(): array
    {
        $context = parent::getContext();
        
        if(isset($_GET['type'])){
            $query = $this->pdo->prepare("SELECT * FROM flowers WHERE type=:type");
            $query->bindValue("type",$_GET['type']);
            $query->execute();
        }else{
            $query = $this->pdo->query("SELECT * FROM flowers");
        
        }
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['flowers'] = $query->fetchAll();

        return $context;
    }
}