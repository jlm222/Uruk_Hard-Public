<?php
    if(trim($_GET['p_id'])) {
        $post_id = trim($_GET['p_id']);

        $comicNav = new ComicNav($pdo);

        $firstPostId = $comicNav->firstPostId();
        $latestPostId = $comicNav->latestPostId();
        $prevPostId = $comicNav->prevComic($post_id);
        $nextPostId = $comicNav->nextComic($post_id);

        unset($comicNav);

        if ($post_id == $firstPostId) {
            header("Location: first.php");
        } else if ($post_id == $latestPostId) {
            header("Location: index.php");
        } else if ($post_id > $latestPostId || $post_id < $firstPostId) {
            header("Location: error.php");
        }

    } else {
        header("Location: error.php");
    }
?>

<nav class="nav">
    <ul class="nav__list">

        <li class="nav__item  nav__item--hand1">
            <a href="first.php" class="nav__link">
                <img src="images/icons/prepped/first.png" class="nav__img hand-icon" alt="Link to First Comic">
                First
            </a>
        </li> 

        <li class="nav__item  nav__item--arrow1">
            <a href="<?= $prevPostId; ?>"  class="nav__link">
                <img src="images/icons/prepped/prev.png" class="nav__img arrow-icon" alt="Link to Previous Comic">
                Prev
            </a>
        </li>

        <li class="nav__item nav__item--scroll">
            <a href="archive.php" class="nav__link">
                <img src="images/icons/prepped/archive.png" class="nav__img archive-icon" alt="Link to Archive">
                Archive
            </a>
        </li>

        <li class="nav__item nav__item--arrow2">
            <a href="<?= $nextPostId; ?>" class="nav__link">
                <img src="images/icons/prepped/next.png" class="nav__img arrow-icon" alt="Link to Next Comic">
                Next
            </a>
        </li>

        <li class="nav__item  nav__item--hand2">
            <a href="index.php" class="nav__link">
                <img src="images/icons/prepped/last.png" class="nav__img hand-icon" alt="Link to Newest Comic">
                Last
            </a>
        </li>

    </ul>
</nav>