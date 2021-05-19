<?php
/**
 * src/Application/routes.php
 * 
 * Массив с роутами, юзается в классе Router
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
return [
    "" => "SinglePageController",
    "author" => "SinglePageController",
    "contacts" => "SinglePageController",
    "categories" => "CategoriesController"
];