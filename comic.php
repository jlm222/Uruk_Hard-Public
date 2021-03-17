<?php require "includes/db.inc.php"; ?>
<?php require "includes/autoloader.inc.php" ?>

<?php require "includes/header.inc.php"; ?>
<?php require "includes/navigation.inc.php"; ?>

<?php
    ////// DISPLAYS COMIC BASED ON CURRENT POST ID
        $comicDisplay = new ComicDisplay($pdo);
        $comicArr = $comicDisplay->comicDisplay($post_id); // Post Id used from navigation above

        unset($comicDisplay);
?>

<?php require "includes/comic_display.inc.php"; ?>

<?php require "includes/footer.inc.php" ?>