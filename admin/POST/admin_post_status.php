<?php 
 
if (isset($_POST['id'])) {

    $post_id = trim($_POST['id']);

    //// Update database entry to published
    if (isset($_POST['published'])) {    
        $pdo->prepare("UPDATE posts SET post_status = 'published' WHERE post_id = :post_id")->execute(['post_id' => $post_id]);
    }

    //// Update database entry to draft
    else if (isset($_POST['draft'])) {    
        $pdo->prepare("UPDATE posts SET post_status = 'draft' WHERE post_id = :post_id")->execute(['post_id' => $post_id]);
    }
}

?>