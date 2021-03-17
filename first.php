<?php require "includes/db.inc.php" ?>
<?php require "includes/autoloader.inc.php" ?>

<?php require "includes/header.inc.php" ?>
<?php require "includes/navigation_first.inc.php" ?>


<?php 
    $comicDisplay = new ComicDisplay($pdo);
    $comicArr = $comicDisplay->comicDisplayFirst();

    unset($comicDisplay);
?>

<?php require "includes/comic_display.inc.php"; ?>
    
<?php require "includes/footer.inc.php" ?>