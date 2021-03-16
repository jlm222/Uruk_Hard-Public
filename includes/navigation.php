<?php
    //// SELECTS LATEST POST FOR nextComic NAV FUNCTION
    if($_GET['p_id']) {
        $post_id = trim($_GET['p_id']);

        $sql = "SELECT post_id FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id DESC LIMIT 1";
        $stmt = $pdo->query($sql);

        $latest_post_id = $stmt->fetchColumn();
    }   
?>

<nav class="nav">
    <ul class="nav__list">

        <li class="nav__item  nav__item--hand1"><a href="first.php" class="nav__link"><img src="images/icons/prepped/first.png" class="nav__img hand-icon" alt="Link to First Comic">First</a></li> 

        <li class="nav__item  nav__item--arrow1"><a href="<?php prevComic($post_id, $pdo); ?>"  class="nav__link"><img src="images/icons/prepped/prev.png" class="nav__img arrow-icon" alt="Link to Previous Comic">Prev</a></li>

        <li class="nav__item nav__item--scroll"><a href="archive.php" class="nav__link"><img src="images/icons/prepped/archive.png" class="nav__img archive-icon" alt="Link to Archive">Archive</a></li>

        <li class="nav__item nav__item--arrow2"><a href="<?php nextComic($post_id, $latest_post_id, $pdo); ?>" class="nav__link"><img src="images/icons/prepped/next.png" class="nav__img arrow-icon" alt="Link to Next Comic">Next</a></li>

        <li class="nav__item  nav__item--hand2"><a href="index.php" class="nav__link"><img src="images/icons/prepped/last.png" class="nav__img hand-icon" alt="Link to Newest Comic">Last</a></li>

    </ul>
</nav>