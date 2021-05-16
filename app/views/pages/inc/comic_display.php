<main class="comic">
    <section class="comic__container">
        <picture>
            <source
                type="image/webp"
                srcset="<?= "{$data['webp_link']}"; ?>"
            />
            <source
                type="image/jpeg"
                srcset="<?= "{$data['jpg_link']}"; ?>"  class="comic__img" width="1000" height="800" alt="<?= $data['post_alt_text']; ?>"
            />
            <img src="<?= "{$data['jpg_link']}"; ?>"  class="comic__img" width="1000" height="800" alt="<?= $data['post_alt_text']; ?>"
            title="<?php if (empty($data['post_hover_text'])) {echo $data['post_title'];} else {echo $data['post_hover_text'];}  ?>" >
        </picture>

        <div class="comic__under">
            <div class="comic__info">
                <h1 class="comic__title"><?= $data['post_title']; ?></h1>
                <h2 class="comic__date">&nbsp;&nbsp;on <?= $data['post_date']; ?></h2>
            </div>
        </div>
    </section>

    <section class="secret">
        <div class="secret__panel-container hidden">

            <?php if(!empty($data['post_secret_image'])) : ?>
        <picture>
            <source
                type="image/webp"
                srcset="<?= $data['webp_secret_link']; ?>"
            />
            <source
                type="image/jpeg"
                srcset="<?= $data['jpg_secret_link']; ?>"
            />
            <img loading="lazy" id="secret__panel" class="secret__panel " src="<?= $data['jpg_secret_link']; ?>">
        </picture>
            <?php endif; ?>

        </div>
        <div class="secret__img-container">
            <picture>
                <source type="image/webp" srcset="<?= ICONFOLDER; ?>durin.webp">
                <source type="image/jpeg" srcset="<?= ICONFOLDER; ?>durin.jpg">
                <img loading="lazy" src="<?= ICONFOLDER; ?>durin.jpg" class="secret__img-durin durin-dark" alt="Click Durin's Door for a Secret Panel" width="352" height="194">
            </picture>
        </div>
    </section>
</main>