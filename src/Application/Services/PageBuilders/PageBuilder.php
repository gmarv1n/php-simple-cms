<?php
/**
 * Pagebuilder class
 * 
 * Абстрактный класс пейджбилдера
 * применен "Шаблонный метод" :)
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.05.2021
 */
namespace src\Application\Services\PageBuilders;
use src\Application\Services\MenuBuilder;

abstract class Pagebuilder
{
    protected $menuBuilder;
    protected $headerContent;

    // Инициализируем класс МенюБилдером
    // и массивом с СЕО
    public function __construct()
    {
        $this->menuBuilder = new MenuBuilder();
        $this->headerContent = require("src/Views/headerTagsContent.php");
    }

    // Выводи хедер - меню - контент - футер
    public function buildPage()
    {
        $this->loadHeader();
        $this->loadMenu();
        $this->loadContent();
        $this->loadFooter();
    }

    // Хедер восновном завязан на СЕО, поэтому
    // у потомков своя реализация
    abstract public function loadHeader();

    // Футер фиксированный
    public function loadFooter()
    {
        require_once("src/Views/templates/footer.php");
    }

    // Меню тож везде одинаковое
    public function loadMenu()
    {
        $this->menuBuilder->renderMenu();
    }

    // Контент у каждого свой, мыж без базы
    // технология NOSQL в действии :)))
    abstract public function loadContent();


}