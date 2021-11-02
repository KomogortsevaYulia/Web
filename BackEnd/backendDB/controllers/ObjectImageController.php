<?php
require_once "../controllers/SchefflerController.php";

class ObjectImageController extends ObjectController {
    public $template = "image.twig";
    public function getContext(): array
    {
        $context = parent::getContext();
        
        // создам запрос, под параметр создаем переменную my_id в запросе
        $query = $this->pdo->prepare("SELECT image,id FROM flowers WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос

        // тянем данные
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['image'] = $data['image'];
        $context['type'] = "картинка";
        return $context;
    }
}