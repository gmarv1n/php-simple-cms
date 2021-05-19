# php-simple-cms
Очень простая CMS, написанная по наитию в процессе реализации паттернов GoF, которые в итоге стали сайтом phppatterns.ru. Оттуда, собственно функционал и был выдернут и оформлен в отдельный репозиторий. Базы нет, потом может добавлю. В целом - MVC, но вместо базы массивы. Г%внокод, да :)

## Как юзать?

Предусмотрен вывод вдух типов страниц: одиночная страница с uri типа ```/contacts``` и категоризированных страниц с uri типа ```\category-name\category-page```
### Для добавления одиночной страницы необходимо:
1. Добавить страницу с контентом в корень ```src\Views``` с именем ```pageName.php```
2. Добавить ключ-значение в массив в файле ```src\Views\headerTagsContent.php``` для метатэгов
В таком виде:
```php 
"pageName" => [
    "title" => "Page Name title",
    "description" => "Page Name description",
    "keywords" => "Page Name keywords",
],
```
3. В массив в ```src\Application\menu.php``` добавить ключ значение вида
``` "Page name" => "/pageName", ``` при это значение должно совпадать с именем файла в пункте 1
Сие создаст пункт меню в меню :)
### Для добавления категории и страницы этой категории необходимо:
1. Добавить папку с в ```src\Views\categories\``` с именем ```categoryName```, должен получиться ктаалог ```src\Views\categories\categoryName```
2. В получившийся каталог добавляем ```index.php``` - файл индексной нужное количество страниц новой категории вида ```newPageOne.php``` 
3. Добавить ключ-значение в массив с ключем "categories" в файле ```src\Views\headerTagsContent.php``` для метатэгов
В таком виде:
```php 
"categoryName" => [ // categoryName - этот ключ должен совпадать с названием директории для новой категории в src\Views\categories\
        "title" => "categoryName title",
        "description" => "categoryName description",
        "keywords" => "categoryName keywords",
        "categoryPages" => [
        
        ],
    ],
```
Это контент для метатэгов индексной страницы категории.
Теперь о конкретных страницых:
В массив с ключем ```"categoryPages"``` добавляем кажду страницу:
```php
"categoryPages" => [
    "newPageOne" => [ // newPageOne - этот ключ должен совпадать с именем файла
          "title" => "newPageOnee title",
          "description" => "newPageOne description",
          "keywords" => "newPageOne keywords",
      ],
],
```
4. В массив в ```src\Application\menu.php``` добавить ключ значение вида:
```php
"Category One" => [
            "/categories/categoryName", [ // Это uri для индексной стриницы, обязательно должен совпадать с именем директории категории
                "newPageOne" => "/categories/categoryName/newPageOne", // uri конкретной страницы категории
                ]
    ],
```
Имена ```categoryName/newPageOne``` должны совпадать с именем директории категории и именем файла с контентом соответственно.
**В целом, добавляем по аналогии с исходником.**

## Шаблоны
В ```src\Views\templates``` лежат шаблоны: 
```_menu-template.php``` - вывод меню с минимальным количеством тего, если нужно будет переверстывать,
```categoryPageContent.php``` - шаблон для вывода контента категоризированной страницы,
```footer.php``` - футер,
```header.php``` - хедер,
```manu.php``` - актуальное отверстанное меню, используещеся для вывода,
```singlePageContent.php``` - шаблон для вывода контента одиночной страницы.
Верстка в исходнике на Bootstrap 5 с небольшим ```custom.css```. Подключено по CDN.
