<?php $comicNav = new ComicNav($pdo); ?>

<nav class="nav">
    <ul class="nav__list">
       
        <li class="nav__item nav__item--disabled nav__item--hand1">
            <p class="nav__link">
                <img src="images/icons/prepped/first.png" class="nav__img hand-icon" alt="Disabled Link to First Comic">
                First
            </p>
        </li> 

        <li class="nav__item nav__item--disabled nav__item--arrow1">
            <p class="nav__link">
                <img src="images/icons/prepped/prev.png" class="nav__img arrow-icon" alt="Disabled Link to Previous Comic">
                Prev
            </p>
        </li>

        <li class="nav__item nav__item--scroll">
            <a href="archive.php" class="nav__link">
                <img src="images/icons/prepped/archive.png" class="nav__img archive-icon" alt="Link to Archive">
                Archive
            </a>
        </li>

        <li class="nav__item nav__item--arrow2">
            <a href="comic.php?p_id=<?= $comicNav->nextComicFirst(); ?>" class="nav__link">
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

<?php unset($comicNav); ?>