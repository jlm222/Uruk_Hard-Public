<?php   
    $comicDisplay = new ComicDisplay($pdo);
    $comicArr = $comicDisplay->comicDisplayIndex();

    unset($comicDisplay);
?>