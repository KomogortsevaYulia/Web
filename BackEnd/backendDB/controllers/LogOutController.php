<?php
require_once '../framework/TwigBaseController.php';
class LogOutController extends TwigBaseController {

    public function get(array $context) {
      $_SESSION["is_logged"] = false;
      $context['is_logged'] = false;
      header('Location: /login');
      exit; 
    }

}