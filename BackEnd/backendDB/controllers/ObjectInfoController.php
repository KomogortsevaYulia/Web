<?php

class ObjectInfoController extends ObjectController {
    public $template = "info.twig";
    public function getContext(): array
    {
        $context = parent::getContext();
        
        // создам запрос, под параметр создаем переменную my_id в запросе
        $query = $this->pdo->prepare("SELECT info,id FROM flowers WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос

        // тянем данные
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['text'] = $data['info'];
        $context['type'] = "текст";
        return $context;
    }
}