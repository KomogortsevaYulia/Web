<?php
require_once "../framework/TwigBaseController.php";
 
class BasePlantsTwigController extends TwigBaseController {
    
    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT DISTINCT type FROM flowers order by 1");
        $types = $query->fetchAll();
        $context['types'] = $types;
        $context['is_logged'] = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;
        return $context;
    }
}