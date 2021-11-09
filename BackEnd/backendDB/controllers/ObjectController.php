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
        $query = $this->pdo->prepare("SELECT image,info,description,id FROM flowers WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос
        // тянем данные
        $data = $query->fetch();

        $context['my_id'] = $data['id'];
        $context['description'] = $data['description'];


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