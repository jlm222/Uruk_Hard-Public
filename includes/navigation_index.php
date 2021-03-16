<nav class="nav">
    <ul class="nav__list">

        <li class="nav__item nav__item--hand1"><a href="first.php" class="nav__link "><img src="images/icons/prepped/first.png" class="nav__img hand-icon" alt="Link to First Comic">First</a></li> 

        <li class="nav__item nav__item--arrow1"><a href="comic.php?p_id=<?php indexPrevComic($pdo); ?>" class="nav__link"><div class="nav__img-box"></div><img src="images/icons/prepped/prev.png" class="nav__img arrow-icon" alt="Link to Previous Comic">Prev</a></li>

        <li class="nav__item nav__item--scroll"><a href="archive.php" class="nav__link"><img src="images/icons/prepped/archive.png" class="nav__img archive-icon" alt="Link to Archive">Archive</a></li>

        <li class="nav__item nav__item--disabled nav__item--arrow2"><p class="nav__link"><img src="images/icons/prepped/next.png" class="nav__img arrow-icon" alt="Disabled Link to Next Comic">Next</p></li>
        
        <li class="nav__item nav__item--disabled nav__item--hand2"><p class="nav__link"><img src="images/icons/prepped/last.png" class="nav__img hand-icon" alt="Disabled Link to Newest Comic">Last</p></li>
    </ul>
</nav>