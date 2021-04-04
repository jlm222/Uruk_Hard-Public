<main class="comic">
    <section class="comic__container">
        <img src="<?= URLROOT; ?>/images/comics/<?= $data['post_id']; ?>/<?= $data['post_image']; ?>"  class="comic__img" alt="<?= $data['post_alt_text']; ?>" 
        title="<?php if (empty($data['post_hover_text'])) {echo $data['post_title'];} else {echo $data['post_hover_text'];}  ?>" >
        <div class="comic__under">
            <div class="comic__info">
                <h1 class="comic__title"><?= $data['post_title']; ?></h1>
                <h2 class="comic__date">on <?= $data['post_date']; ?></h2>
            </div>
            <div class="comic-secret">
                <div class="comic-secret__img"></div>
            </div>        
        </div>
    </section>
</main>
