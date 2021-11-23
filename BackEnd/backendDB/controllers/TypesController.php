<?php
require_once "BasePlantsTwigController.php"; 

class TypesController extends BasePlantsTwigController {
    public $template = "types.twig";
    public $title = "Главная";
    // добавим метод getContext()
    public function getContext(): array
    {

        $query = $this->pdo->query("SELECT * FROM types");
        $context['types'] = $query->fetchAll();

        return $context;
    }
}