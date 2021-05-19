<?php
/**
 * SinglePageController class
 * 
 * Контроллер для одиночных страниц
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Controllers;
use src\Application\Controllers\Controller;
use src\Application\Services\PageBuilders\SinglePageBuilder;

class SinglePageController extends Controller
{
    private $pageName;
    
    // Инициализируем контроллер синглпейджбилдером
    // и именем страницы 
    public function __construct($requestArray)
    {
        $this->pageName = $requestArray[0];
        $this->pageBuilder = new SinglePageBuilder($this->pageName);
    }
    public function loadPage(): void
    {
        $this->pageBuilder->buildPage();
    }
}