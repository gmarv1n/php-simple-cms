<div class="col-sm-12 col-md-3 col-lg-3">
    <ul>
        <? // Проносимся цилом по массиву меню ?>
        <? foreach ($menuArray as $title => $link): ?>
            <? // Проверяем является ли ссылка типом шаблонов, 
            //выводим ссылку на тип шаблона, а потом запускаем
            // цикл по шаблонам ?>
            <? if (is_array($link)): ?>
                <li>
                    <? // При выводе проверяем, находимся ли мы на этой конкретной странице
                    // и если да - то добавляем класс menu-highlighted пункту меню, чтобы подсветить ?>
                    <a class="<? if ($link[0] === $currentURI) echo 'menu-highlighted'; ?>" href="<? echo $link[0]; ?>"><? echo $title; ?></a>
                    <ul>
                        <? foreach ($link[1] as $nestedTitle => $nestedLink): ?>
                            <li><a class="<? if ($nestedLink === $currentURI) echo 'menu-highlighted'; ?>" href="<? echo $nestedLink; ?>"><? echo $nestedTitle; ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </li>

            <? else: ?>
            <? // Просто выводим тайтл и ссылку, если это не паттерн ?>
            <li><a class="<? if ($link === $currentURI) echo 'menu-highlighted'; ?>" href="<? echo $link; ?>"><? echo $title; ?></a></li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
</div>

