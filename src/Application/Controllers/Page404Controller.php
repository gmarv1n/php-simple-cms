<?php
/**
 * Page404Controller class
 * 
 * Контроллер 404ой
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Controllers;
use src\Application\Controllers\Controller;
use src\Application\Services\PageBuilders\Page404Builder;

class Page404Controller extends Controller
{
    private $nonexistentName;

    // Инициализируем контроллер реквест массивом из
    // роутера и создаем строителя 404 страницы
    public function __construct($requestArray)
    {
        // строка $nonexistentName будет выводиться на 404 странице
        $this->nonexistentName = $requestArray[0];
        $this->pageBuilder = new Page404Builder($this->nonexistentName);
    }
    public function loadPage(): void
    {
        $this->pageBuilder->buildPage();
    }
}