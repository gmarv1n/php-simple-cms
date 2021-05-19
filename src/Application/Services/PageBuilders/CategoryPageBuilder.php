<?php
/**
 * CategoryPageBuilder class
 * 
 * Билдер страниц категорий
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.05.2021
 */
namespace src\Application\Services\PageBuilders;
use src\Application\Services\PageBuilders\PageBuilder;

class CategoryPageBuilder extends PageBuilder
{
    private $categoryName;
    private $pageName;

    // Инициализируем конструктором родителя,
    // и для этого потомка 2 доп свойства: имя категории и имя страницы,
    // которое может быть null для индексных страниц
    public function __construct(string $categoryName, ?string $pageName)
    {
        parent::__construct();
        $this->categoryName = $categoryName;
        $this->pageName = $pageName;
    }

    // 2 вида массива с СЕО, в зависимости конкретный это шаблон
    // или индексный
    public function loadHeader()
    {
        $pageHeaderContent = [];
        if ($this->pageName != null) {
            $pageHeaderContent = $this->headerContent["categories"][$this->categoryName]["categoryPages"][$this->pageName];
        } else {
            $pageHeaderContent = $this->headerContent["categories"][$this->categoryName];
        }

        require("src/Views/templates/header.php");

    }

    // Грузим вид - конкретная страницы или индексная страница, пишется
    // в contentDirectory и реквайрится в шаблоне
    public function loadContent()
    {
        $contentDirectory = "";
        if ($this->pageName != null) {
            $contentDirectory = "src/Views/categories/".$this->categoryName."/".$this->pageName.".php";
        } else {
            $contentDirectory = "src/Views/categories/".$this->categoryName."/index.php";
        }
        require_once("src/Views/templates/categoryPageContent.php");
    }
}