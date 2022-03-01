<?php
require_once "BasePlantsTwigController.php";
class ObjectController extends BasePlantsTwigController {
    public $template = "_object.twig"; // указываем шаблон

    public function getTemplate() {
        if(isset($_GET['show'])){
            if($_GET['show']=='image'){
                return "image.twig";
                
            } elseif($_GET['show']=='info'){
                return "info.twig";
            }
        }
        return parent::getTemplate();
    }

    public function getContext(): array
    {
        $context = parent::getContext();
        // создам запрос, под параметр создаем переменную my_id в запросе
        $query = $this->pdo->prepare("SELECT title,image,type,info,description,id FROM flowers WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос
        // тянем данные
        $data = $query->fetch();

        $context['my_id'] = $data['id'];
        $context['description'] = $data['description'];
        $context['title'] = $data['title'];
        
        $query = $this->pdo->prepare("SELECT name FROM types WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $data['type']);
        $query->execute(); // выполняем запрос
        // тянем данные
        $data1 = $query->fetch();
        $context['name_types'] = $data1['name'];

        if(isset($_GET['show'])){
            if($_GET['show']=='image'){
                // передаем описание из БД в контекст
                $context['image'] = $data['image'];
                $context['type'] = "картинка";
            }elseif($_GET['show']=='info'){
                // передаем описание из БД в контекст
                $context['text'] = $data['info'];
                $context['type'] = "текст";
            }
        }
        return $context;
    }
}