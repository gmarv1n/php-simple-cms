<nav class="navbar navbar-expand-md navbar-dark bg-dark col-sm-12 col-md-3 col-lg-3 align-items-start">
  <div class="container-fluid justify-content-start my-0 p-0 my-sm-0">
    <span class="upper-header-text col d-flex justify-content-start d-md-none">
        <a <? if($_SERVER["REQUEST_URI"] != "/") { echo 'href="/"';} ?> class="m-0 p-0 d-flex col justify-content-start">
                    <img src="/resources/images/mobilelogo.jpg" class="logotype <? if($_SERVER["REQUEST_URI"] != "/") { echo 'logotype-opacity-hover';} ?>" title="Сайт phppatterns.ru" alt="phppatterns.ru">
                </a>
    </span>
    <span class="d-flex flex-shrink-1 justify-content-end">
        <button class="navbar-toggler col my-sm-0 my-xs-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </span>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-column my-0 nav-pills w-100">
      <? // Проносимся цилом по массиву меню ?>
        <? foreach ($menuArray as $title => $link): ?>
            <? if (is_array($link)): ?>
                <li class="nav-item">
                    <? // При выводе проверяем, находимся ли мы на этой конкретной странице
                    // и если да - то добавляем класс menu-highlighted пункту меню, чтобы подсветить ?>
                    <a class="nav-link py-md-0 ps-2 ps-sm-2 ps-md-2 <? if ($link[0] === $currentURI) echo 'active';?>" aria-current="<? if ($link[0] === $currentURI) echo 'page'; ?>" href="<? echo $link[0]; ?>"><? echo $title; ?></a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-column">
                        <? foreach ($link[1] as $nestedTitle => $nestedLink): ?>
                            <li class="nav-item">
                                <a class="nav-link ps-4 ps-sm-4 ps-md-4 py-md-0 <? if ($nestedLink === $currentURI) echo 'active'; ?>" aria-current="<? if ($nestedLink === $currentURI) echo 'page'; ?>" href="<? echo $nestedLink; ?>"><? echo $nestedTitle; ?></a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </li>
                <? else: ?>
                <? // Просто выводим тайтл и ссылку, если это не паттерн ?>
                <li class="nav-item "><a class="nav-link py-md-0 ps-2 ps-sm-2 ps-md-2 <? if ($link === $currentURI) echo 'active'; ?>"  aria-current="<? if ($link === $currentURI) echo 'page'; ?>" href="<? echo $link; ?>"><? echo $title; ?></a></li> 
            <? endif; ?>
        <? endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
