<?php
/**
 * /index.php
 * 
 * Точка входа
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
// Подгружаем автолоадер и роутер
require_once("src/Application/autoload.php");
use src\Application\Router;

// Не помню для чего это, где то юзает. Хер ли просто константу не заюзал не помню :)
$GLOBALS["ROOT"] = __DIR__;

// Создаем роутер и подгружаем контроллер
$router = new Router();
$router->loadController();