<?php require "includes/db.inc.php"; ?>
<?php require "includes/autoloader.inc.php"; ?>

<?php require "includes/header.inc.php"; ?>

<main class="archive">
    <h1 class="archive__title">Archive</h1>
    <ul class="archive__list">

<?php
    if(isset($_GET['page'])) {
        $page = trim($_GET['page']);
    } else {
        $page = "1";
    }

    $comicArchive = new ComicArchive($pdo);

    $comicArchive->fullArchiveFunc($page);
   
    unset($comicArchive);
?>  
       
    </ul>
</main>

<?php require "includes/footer.inc.php"; ?>