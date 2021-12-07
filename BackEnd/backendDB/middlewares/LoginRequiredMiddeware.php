<?php
require_once '../framework/BaseMiddleware.php';
class LoginRequiredMiddeware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context) {
        $is_logged=isset($_SESSION['is_logged']) ? $_SESSION['is_logged']: false;
        // сверяем с корректными
         if (!$is_logged) {
            header("Location: /logIn");
            exit; // прерываем выполнение скрипта
        }
    }
}