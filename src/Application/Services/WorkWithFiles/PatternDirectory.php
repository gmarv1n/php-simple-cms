<?php
/**
 * PatternDirectory class
 * 
 * Класс, который храгнит директорию конкретного
 * шаблона
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Services\WorkWithFiles;

abstract class PatternDirectory
{
    protected $directory;

    // В конструкторе принимаем тип паттернов и имя паттерна
    public function __construct(string $patternType, string $patternName)
    {
        $this->directory = $GLOBALS["ROOT"]."/src/Patterns/".$patternType."/".$patternName."/";
    }

    // Чото как то не потребовался метод
    public function getClassList(): array
    {
        return array_diff(scandir($this->directory), array('..', '.'));
    }
}