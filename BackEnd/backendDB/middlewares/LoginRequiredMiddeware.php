<?php
require_once '../framework/BaseMiddleware.php';
class LoginRequiredMiddeware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context) {
         // берем значения которые введет пользователь
         $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
         $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
         
        
         // создам запрос, под параметр создаем переменную my_id в запросе
         $query = $controller->pdo->prepare("SELECT * FROM users WHERE username= :user and password =:password");
         // подвязываем значение в my_id 
         $query->bindValue("user", $user);
         $query->bindValue("password", $password);
         $query->execute(); // выполняем запрос
         // тянем данные
         $data = $query->fetch();

         // сверяем с корректными
         if ($data['id']=='') {
             // если не совпали, надо указать такой заголовок
             // именно по нему браузер поймет что надо показать окно для ввода юзера/пароля
             header('WWW-Authenticate: Basic realm="Space objects"');
             http_response_code(401); // ну и статус 401 -- Unauthorized, то есть неавторизован
             exit; // прерываем выполнение скрипта
         }
    }
}