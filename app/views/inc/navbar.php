<nav class="nav">
    <ul class="nav__list">

        <?php if($data['nav_prev'] !== '') : ?>
        <li class="nav__item nav__item--hand nav__item--hand1 <?php $data['nav_prev'] !== '' ? '' : 'nav__item--disabled' ; ?>">
            <a href="<?= URLROOT; ?>/pages/first">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>first.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>first.jpg">
                    <img src="<?= ICONFOLDER; ?>first.jpg" class="nav__img hand-icon" alt="Link to First Comic">
                </picture>
                <span class="nav__link">First</span> 
            </a>
        </li> 
        <li class="nav__item nav__item--arrow nav__item--arrow1">
            <a href="<?= $data['nav_prev'] == $data['nav_first'] ? URLROOT . '/pages/first' : URLROOT . '/pages/comic/' . $data['nav_prev']; ?>"  class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>prev.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>prev.jpg">
                    <img src="<?= ICONFOLDER; ?>prev.jpg" class="nav__img arrow-icon" alt="Link to Previous Comic" width="232" height="36">
                </picture>
                Back
            </a>
        </li>
        <?php else : ?>
        <li class="nav__item nav__item--disabled nav__item--hand nav__item--hand1">
            <p class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>first.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>first.jpg">
                    <img src="<?= ICONFOLDER; ?>first.jpg" class="nav__img hand-icon" alt="Disabled Link to First Comic">
                </picture>
                First
            </p>
        </li> 
        <li class="nav__item nav__item--disabled nav__item--arrow nav__item--arrow1">
            <p class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>prev.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>prev.jpg">
                    <img src="<?= ICONFOLDER; ?>prev.jpg" class="nav__img arrow-icon" alt="Disabled Link to Previous Comic">
                </picture>
                Back
            </p>
        </li>
        <?php endif; ?>


        <li class="nav__item nav__item--scroll">
            <a href="<?= URLROOT; ?>/archives" class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>archive.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>archive.jpg">
                    <img src="<?= ICONFOLDER; ?>archive.jpg" class="nav__img archive-icon" alt="Link to Archive">
                </picture>
                Archive
            </a>
        </li>

        
        <?php if($data['nav_latest'] !== '') : ?>
        <li class="nav__item nav__item--arrow nav__item--arrow2">
            <a href="<?= $data['nav_next'] == $data['nav_latest'] ? URLROOT : URLROOT . '/pages/comic/' . $data['nav_next']; ?>" class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>next.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>next.jpg">
                    <img src="<?= ICONFOLDER; ?>next.jpg" class="nav__img arrow-icon" alt="Link to Next Comic">
                </picture>
                Next
            </a>
        </li>
        <li class="nav__item nav__item--hand nav__item--hand2">
            <a href="<?= URLROOT; ?>" class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>last.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>last.jpg">
                    <img src="<?= ICONFOLDER; ?>last.jpg" class="nav__img hand-icon" alt="Link to Latest Comic">
                </picture>
                Latest
            </a>
        </li>
        <?php else : ?>
        <li class="nav__item nav__item--disabled nav__item--arrow nav__item--arrow2">
            <p class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>next.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>next.jpg">
                    <img src="<?= ICONFOLDER; ?>next.jpg" class="nav__img arrow-icon" alt="Disabled Link to Next Comic">
                </picture>
                Next
            </p>
        </li>
        <li class="nav__item nav__item--disabled nav__item--hand nav__item--hand2">
            <p class="nav__link">
                <picture>
                    <source type="image/webp" srcset="<?= ICONFOLDER; ?>last.webp">
                    <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>last.jpg">
                    <img src="<?= ICONFOLDER; ?>last.jpg" class="nav__img hand-icon" alt="Disabled Link to Latest Comic">
                </picture>
                Latest
            </p>
        </li>
        <?php endif; ?>

    </ul>
</nav>