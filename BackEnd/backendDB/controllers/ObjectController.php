<?php
require_once "BasePlantsTwigController.php";
class ObjectController extends BasePlantsTwigController {
    public $template = "_object.twig"; // указываем шаблон

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

        if(isset($_GET['show'])){
            if($_GET['show']=='image'){
                $template = "image.twig";
                // передаем описание из БД в контекст
                $context['image'] = $data['image'];
                $context['type'] = "картинка";
                print_r($context['image']);
            }elseif($_GET['show']=='info'){
                $template = "info.twig";
                // передаем описание из БД в контекст
                $context['text'] = $data['info'];
                $context['type'] = "текст";
                print_r($context['text']);
            }
            
        }else{
            // передаем описание из БД в контекст
            $context['description'] = $data['description'];
            $context['my_id'] = $data['id'];
        }
        
        return $context;
    }
}