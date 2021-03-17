<main class="comic">
    <section class="comic__container">

        <img src="images/comics/<?= $comicArr['post_id']; ?>/<?= $comicArr['post_image']; ?>"  class="comic__img" alt="<?= $comicArr['post_alt_text']; ?>" 
        title="<?php if (empty($comicArr['post_hover_text'])) {echo $comicArr['post_title'];} else {echo $comicArr['post_hover_text'];}  ?>" >
        
        <div class="comic__under">
            <div class="comic__info">
                <h1 class="comic__title"><?= $comicArr['post_title']; ?></h1>
                <h2 class="comic__date">on <?= $comicArr['post_date']; ?></h2>
            </div>

            <div class="comic-secret">
                <div class="comic-secret__img"></div>
            </div>
                
        </div>
    </section>
</main>

<?php unset($comicArr); ?>