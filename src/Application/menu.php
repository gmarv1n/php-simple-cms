<?php
/**
 * src/Application/menu.php
 * 
 * Файлик со структурой Меню, которое 
 * используется классом MenuBuilder
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.05.2021
 */
return [
    "Main Page" => "/",
    "Category One" => ["/categories/category-one", [
        "Page One" => "/categories/category-one/page-one",
        "Page Two" => "/categories/category-one/page-two",
    ]],
    "Author" => "/author",
    "Contacts" => "/contacts",
];
