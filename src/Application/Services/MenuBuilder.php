<?php
/**
 * MenuBuilder class
 * 
 * Класс для постройки меню,
 * хранится в пейджбилдере
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Services;

class MenuBuilder
{
    private $menuArray;

    // Инициализируем массив из файлика
    public function __construct()
    {
        $this->menuArray = require("src/Application/menu.php");
    }

    // Рендерим меню
    public function renderMenu()
    {
        // $currentURI нужен для логики отображения меню
        // в виде
        $currentURI = $_SERVER["REQUEST_URI"];
        $menuArray = $this->menuArray;
        require("src/Views/templates/menu.php");
    }
}