<?php
require_once '../framework/BaseMiddleware.php';
class LoginRequiredMiddeware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context) {
         // сверяем с корректными
         if ($_SESSION['is_logged']==false) {
            
            exit; // прерываем выполнение скрипта
        }
    }
}