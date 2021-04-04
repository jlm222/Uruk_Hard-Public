<nav class="nav">
    <ul class="nav__list">

        <?php if($data['nav_prev'] !== '') : ?>
        <li class="nav__item  nav__item--hand1">
            <a href="<?= URLROOT; ?>/pages/first" class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/first.png" class="nav__img hand-icon" alt="Link to First Comic">
                First
            </a>
        </li> 
        <li class="nav__item  nav__item--arrow1">
            <a href="<?= $data['nav_prev'] == $data['nav_first'] ? URLROOT . '/pages/first' : URLROOT . '/pages/comic/' . $data['nav_prev']; ?>"  class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/prev.png" class="nav__img arrow-icon" alt="Link to Previous Comic">
                Prev
            </a>
        </li>
        <?php else : ?>
        <li class="nav__item nav__item--disabled nav__item--hand1">
            <p class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/first.png" class="nav__img hand-icon" alt="Disabled Link to First Comic">
                First
            </p>
        </li> 
        <li class="nav__item nav__item--disabled nav__item--arrow1">
            <p class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/prev.png" class="nav__img arrow-icon" alt="Disabled Link to Previous Comic">
                Prev
            </p>
        </li>
        <?php endif; ?>



        <li class="nav__item nav__item--scroll">
            <a href="<?= URLROOT; ?>/archives" class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/archive.png" class="nav__img archive-icon" alt="Link to Archive">
                Archive
            </a>
        </li>


        
        <?php if($data['nav_latest'] !== '') : ?>
        <li class="nav__item nav__item--arrow2">
            <a href="<?= $data['nav_next'] == $data['nav_latest'] ? URLROOT : URLROOT . '/pages/comic/' . $data['nav_next']; ?>" class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/next.png" class="nav__img arrow-icon" alt="Link to Next Comic">
                Next
            </a>
        </li>
        <li class="nav__item  nav__item--hand2">
            <a href="<?= URLROOT; ?>" class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/last.png" class="nav__img hand-icon" alt="Link to Newest Comic">
                Last
            </a>
        </li>
        <?php else : ?>
        <li class="nav__item nav__item--disabled nav__item--arrow2">
            <p class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/next.png" class="nav__img arrow-icon" alt="Disabled Link to Next Comic">
                Next
            </p>
        </li>
        <li class="nav__item nav__item--disabled nav__item--hand2">
            <p class="nav__link">
                <img src="<?= URLROOT; ?>/images/icons/prepped/last.png" class="nav__img hand-icon" alt="Disabled Link to Newest Comic">
                Last
            </p>
        </li>
        <?php endif; ?>

    </ul>
</nav>