<?php
require_once "../framework/TwigBaseController.php";
 
class BaseTypesTwigController extends TwigBaseController {
    
    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT * FROM types");
        $context['types'] = $query->fetchAll();
        $context['is_logged'] = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;
        return $context;
    }
}