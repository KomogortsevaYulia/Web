<?php
require_once '../framework/TwigBaseController.php';
class LogInController extends TwigBaseController {
    public $template = "logIn.twig"; // указываем шаблон

    public function post(array $context) {
         // берем значения которые введет пользователь
         $user = isset($_POST['user']) ? $_POST['user'] : '';
         $password = isset($_POST['password']) ? $_POST['password'] : '';
         
        
         // создам запрос, под параметр создаем переменную my_id в запросе
         $query = $this->pdo->prepare("SELECT * FROM users WHERE username= :user and password =:password");
         // подвязываем значение в my_id 
         $query->bindValue("user", $user);
         $query->bindValue("password", $password);
         $query->execute(); // выполняем запрос
         // тянем данные
         $data = $query->fetch();

         // сверяем с корректными
         if ($data) {
            $_SESSION['is_logged']=true;
            $context['is_logged'] = true;
            header('Location: /');
         }else{
            $_SESSION['is_logged']=false;
            $context['message'] = 'Неверные данные';
            $context['is_logged'] = false;
            $this->get($context);
        }
    }

}