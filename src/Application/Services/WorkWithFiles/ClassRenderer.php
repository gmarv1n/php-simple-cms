<?php
/**
 * ClassRenderer class
 * 
 * Класс для отрисовки файлов,
 * наследник PatternDirectory (такая
 * структура вроде не понадобилась,
 * но пусть будет)
 *
 * @author Gregory Yatsukhno <codejournaldev@gmail.com>
 * @version 19.04.2021
 */
namespace src\Application\Services\WorkWithFiles;
use src\Application\Services\WorkWithFiles\PatternDirectory;

class ClassRenderer extends PatternDirectory
{
    // Отрисовываем через функцию highlight_file()
    // класс из реализации шаблона по имени файла

    public function renderFile(string $fileName): void
    {
        $fileString = $this->directory.$fileName;
        $file = fopen($fileString, 'r');

        // Оставил закаменченым, на случай если захочу
        // еще номер строки прикондолюбить

        // echo "<pre>";
        // while(!feof($file)) {
        //     $line = fgets($file);
        //     $coloredLine = highlight_string($line, true);
        //     echo htmlentities($line);
        // }
        // echo "</pre>";
        
        // Передалал под вывод в шаблоне
        require("src/Views/classRenderTemplate.php");

        //echo highlight_file($fileString, true);
        fclose($file);
    }
}