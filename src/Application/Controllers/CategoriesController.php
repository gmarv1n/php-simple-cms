<?php
/**
 * CategoriesController class
 * 
 * Контроллер для сраниц категорий
 * 
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.05.2021
 */
namespace src\Application\Controllers;
use src\Application\Controllers\Controller;
use src\Application\Services\PageBuilders\CategoryPageBuilder;
use src\Application\Services\PageBuilders\Page404Builder;

class CategoriesController extends Controller
{
    private $categoryName;
    private $pageName;
    
    // Инициализируем контроллер паттернпейджбилдером,
    // именем категории и именем страницы
    public function __construct($requestArray)
    {
        // Если это страницы категорий, то в массиве будет [1] - имя категории
        // и [2] - имя страницы. Если страница описания индексная, то
        // [2] = null, что предусмотрено :)

        $this->categoryName = $requestArray[1];
        $this->pageName = $requestArray[2];

        $this->setBuilder($requestArray);
    }

    // передаем управление в пейджбилдер
    public function loadPage(): void
    {
        $this->pageBuilder->buildPage();
    }

    // 21.0.2021 выяснилось, что простой
    // обработки 404 страницы в роутере
    // нехватает, поэтому родился етот метод
    // todo: 404 нужно убрать из роутера и
    // вписать абстрактным методом у контроллеров
    private function setBuilder($requestArray): void
    {

        
        $isCategoryName = is_file("src/Views/categories/".$this->categoryName."/index.php");
        $isCertainPageFile = is_file("src/Views/categories/".$this->categoryName."/".$this->pageName.".php");
        if ( isset($requestArray[3])) {
            $this->pageBuilder = new Page404Builder("categories/".$this->categoryName."/".$this->pageName."/".$requestArray[3]);
        } else if ( $isCertainPageFile == false && $isCategoryName == false ) { 
            $this->pageBuilder = new Page404Builder("categories/".$this->categoryName."/".$this->pageName);
        } else if ( $isCategoryName == true && $this->pageName == null ) {
            $this->pageBuilder = new CategoryPageBuilder($this->categoryName, $this->pageName);
        } else if ( $isCategoryName == true && $isCertainPageFile == false) {
            $this->pageBuilder = new Page404Builder("categories/".$this->categoryName."/".$this->pageName);
        }  else {
            $this->pageBuilder = new CategoryPageBuilder($this->categoryName, $this->pageName);
        }
    }
}