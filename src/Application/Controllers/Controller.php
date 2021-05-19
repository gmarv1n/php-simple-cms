<?php
/**
 * Controller class
 * 
 * Абстрактный контроллер
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Controllers;

abstract class Controller
{
    // У каждого контроллера есть билдер,
    // но у каждого - свой
    protected $pageBuilder;

    // Страницы загружаем тоже по разному
    abstract public function loadPage(): void;
}