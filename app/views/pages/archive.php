<?php require APPROOT . '/views/inc/header.php'; ?>
<main class="archive">
    <h1 class="archive__title">Archive</h1>
    <ul class="archive__list">
<?php foreach($data as $row) : ?>
<li class="archive__item">
    <h4 class="archive__dates"><?= $row['post_date']; ?>&nbsp;</h4>
    <h3 class="archive__titles">&nbsp;&nbsp;<?= $row['post_title']; ?></h3>
    <a href="<?= $row['post_link']; ?>" class="archive__link">
        <img src="images/comics/<?= $row['post_id']; ?>/<?= $row['post_image']; ?>" alt="<?= $row['post_alt_text']; ?>" class="archive__img"
        title="<?= $row['post_hover_text'] ;?>">
    </a>
</li>
<?php endforeach; ?>
    </ul>
</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>