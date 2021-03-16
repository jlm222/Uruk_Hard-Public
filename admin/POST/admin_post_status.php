<?php 

//// Update database entry to published
if(isset($_POST['published'])) {
    $post_id = trim($_POST['id']);

    $pdo->prepare("UPDATE posts SET post_status = 'published' WHERE post_id = :post_id")->execute(['post_id' => $post_id]);
}

//// Update database entry to draft
if(isset($_POST['draft'])) {
    $post_id = trim($_POST['id']);

    $pdo->prepare("UPDATE posts SET post_status = 'draft' WHERE post_id = :post_id")->execute(['post_id' => $post_id]);
}
                   
?>