<?php
/**
 * SinglePagebuilder class
 * 
 * Билдер простых не ветвленых
 * страниц
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.05.2021
 */
namespace src\Application\Services\PageBuilders;
use src\Application\Services\PageBuilders\PageBuilder;

class SinglePageBuilder extends PageBuilder
{
    private $pageName;

    // В конструкторе инициализируем своство
    // этого потомка - имя страницы
    public function __construct(string $pageName)
    {
        parent::__construct();
        $this->pageName = $pageName;
    }

    // Грузим СЕО с хедером
    public function loadHeader()
    {
        $pageHeaderContent = $this->headerContent[$this->pageName];
        require("src/Views/templates/header.php");
    }

    // Грузим саму страницу, в зависимости от того что
    // за страница
    public function loadContent()
    {
        $contentDirectory = "";
        if ($this->pageName != "") {
            $contentDirectory = "src/Views/".$this->pageName.".php";
        } else {
            $contentDirectory = "src/Views/index.php";
        }
        require_once("src/Views/templates/singlePageContent.php");
    }
}