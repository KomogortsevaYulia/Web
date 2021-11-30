<?php
require_once "BasePlantsTwigController.php";

class ObjectUpdateController extends BasePlantsTwigController {
    public $template = "update.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT * FROM types");
        $context['types'] = $query->fetchAll();
        $id = $this->params['id']; // заменил $_POST 

        $sql =<<<EOL
SELECT * FROM flowers WHERE id = :id
EOL; // сформировали запрос
        
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();
        $data = $query->fetch();
        $context['object'] = $data;
        
        return $context;
    }

    public function post(array $context) { // добавили параметр
            // получаем значения полей с формы
            $id = $this->params['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $info = $_POST['info'];
           
            // вытащил значения из $_FILES
            $tmp_name = $_FILES['image']['tmp_name'];
            $name =  $_FILES['image']['name'];
             
            
            if($_FILES['image']['name']==''){
                $sql = <<<EOL
                UPDATE `flowers` SET `title`= :title, `description`= :description, `type`= :type, `info`= :info WHERE `id`= :id
                EOL;
                $query = $this->pdo->prepare($sql);
             }else{
                move_uploaded_file($tmp_name, "../public/media/$name");
                $image_url = "/media/$name"; // формируем ссылку без адреса сервера
                $sql = <<<EOL
                UPDATE `flowers` SET `title`= :title, `description`= :description, `type`= :type, `info`= :info,`image`= :image_url  WHERE `id`= :id
                EOL;
                $query = $this->pdo->prepare($sql);
                $query->bindValue("image_url", $image_url); // подвязываем значение ссылки к переменной  image_url
             }
            
            $query->bindValue("id", $id);
            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);
           
            $query->execute();

            // а дальше как обычно
            $context['message'] = 'Вы успешно изменили объект';
            $context['id'] = $id;
            
            $this->get($context);
    }
}