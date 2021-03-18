<?php session_start() ?>

<?php
    session_unset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['user_role']);
    session_destroy();

    header("Location: ../signin.php");
?>