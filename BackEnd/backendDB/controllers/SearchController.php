<?php
require_once "BasePlantsTwigController.php"; 

class SearchController extends BasePlantsTwigController {
    public $template = "search.twig";
   
    public function getContext(): array
    {
        $context = parent::getContext();
        $type=isset($_GET['type']) ? $_GET['type']:'';
        $title=isset($_GET['title']) ? $_GET['title']:'';

        $sql =<<<EOL
        SELECT * 
        from flowers
        WHERE (:title=''OR title like CONCAT('%',:title,'%')) and (type=:type)
EOL;
        $query=$this->pdo->prepare($sql);
        $query->bindValue("title",$title);
        $query->bindValue("type",$type);
        $query->execute();

        $context['flowers']=$query->fetchAll();
        
        return $context;
    }
}