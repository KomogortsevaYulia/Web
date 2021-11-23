<?php
require_once "BaseTypesTwigController.php";

class TypesCreateController extends BaseTypesTwigController {
    public $template = "create_types.twig";

    public function post(array $context) { // добавили параметр
        
            // получаем значения полей с формы
            $title = $_POST['title'];

    
            // вытащил значения из $_FILES
            $tmp_name = $_FILES['image']['tmp_name'];
            $name =  $_FILES['image']['name'];
            
            // используем функцию которая проверяет
            // что файл действительно был загружен через POST запрос
            // и если это так, то переносит его в указанное во втором аргументе место
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name"; // формируем ссылку без адреса сервера

            // создаем текст запрос
            $sql = <<<EOL
INSERT INTO types(name, image)
VALUES(:title, :image_url) -- передаем переменную в запрос
EOL;
    
            $query = $this->pdo->prepare($sql);
            $query->bindValue("title", $title);
            $query->bindValue("image_url", $image_url); // подвязываем значение ссылки к переменной  image_url
            $query->execute();

            // а дальше как обычно
            $context['message'] = 'Вы успешно создали объект';
            $context['id'] = $this->pdo->lastInsertId();

            $this->get($context);
    }
}