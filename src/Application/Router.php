<?php
/**
 * Router class
 * 
 * Роутер приложения, обидает в точке входа
 * index.php
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application;

class Router
{
    // Метод для загрузки контроллера
    public function loadController(): void
    {
        // РеквестУРИ -  берет и обрутает обрубает слеши у УРИ
        // из суперглобального массива 
        $requestURI = trim($_SERVER["REQUEST_URI"], "/");
        // Разбиваем по слешу на массив
        $requestArray = explode("/", $requestURI);
        // Нулевой элемент $requestArray содержит роут, который
        // или совпадает с роутами или нет, тогда дальше будет 404
        $currentRoute = $requestArray[0];

        // забираем массив роутс из файлика с роутами
        $routes = require_once("src/Application/routes.php");
        
        // Записываем путь к контроллеру 404
        $controllerPath = "\\src\\Application\\Controllers\\Page404Controller";

        // Если роут находится в списке роутов, тогда переписываем $controllerName
        foreach ($routes as $route => $controller) {
            if ($currentRoute == $route) {
                $controllerPath = "\\src\\Application\\Controllers\\".$routes[$route];
            }
        }
        // Создаем объект контроллера и передаем ему разбитый URI
        $controller = new $controllerPath($requestArray);
        
        // Вызываем метод загрузки страницы контроллера
        $controller->loadPage();
    }
}