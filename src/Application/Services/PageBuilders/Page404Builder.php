<?php
/**
 * Page404Builder class
 * 
 * Билдер страницы 404
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Services\Pagebuilders;
use src\Application\Services\PageBuilders\PageBuilder;

class Page404Builder extends PageBuilder
{
    private $nonexistentName;

    public function __construct(string $nonexistentName)
    {
        parent::__construct();
        $this->nonexistentName = $nonexistentName;
    }

    // Отправляем 404ый заголовок
    public function loadHeader()
    {
        header("HTTP/1.0 404 Not Found");
        $pageHeaderContent = $this->headerContent["page404"];
        require("src/Views/templates/header.php");

    }

    public function loadContent()
    {
        $nonexistentName = $this->nonexistentName;
        $contentDirectory = "src/Views/page404.php";
        require_once("src/Views/templates/singlePageContent.php");
        
    }
}