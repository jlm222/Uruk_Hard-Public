<?php require "../includes/session.inc.php"; ?>

<?php

if(isset($_POST["p_id"])) {
    require "../../includes/db.inc.php";
    
    $post_id = trim($_POST["p_id"]);
    
    $stmt = $pdo->prepare("DELETE FROM posts WHERE post_id = ?");

    // Attempt to execute the prepared statement
    if($stmt->execute([$post_id])){
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
        
        // Record deleted successfully. Redirect to index
        header("location: ../index.php");
        exit();
    } else {
        header('Location: error.php');
        exit();
    }
    
    ///// WIP -- remove image directory when post is deleted
    // array_map('unlink', glob($imageDir . "/*.*"));
    // rmdir($imageDir);
}
?>