<?php 

if(isset($_POST['update_post'])) {
    require_once "../../includes/db.php";
    require_once "../includes/admin_functions.php"; 
    
    $post_id = $_POST['post_id'];
    $post_title = $_POST['post_title'];
    $post_status = $_POST['post_status'];
    $post_date = $_POST['post_date'];
    $post_alt_text = $_POST['post_alt_text'];
    $post_hover_text = $_POST['post_hover_text'];
    $old_image = $_POST['old_image'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    if(empty($post_image)) {
        $post_image = $old_image;
    } else {
        $imageFilePath = "../../images/comics/{$post_id}/{$post_image}";
            move_uploaded_file($post_image_temp, $imageFilePath);

            //// Creates a thumbnail of the comic
            thumbnailImage($imageFilePath, $post_image, $post_id);
    }
    
    $sql = "UPDATE posts SET post_title = :post_title, post_date = :post_date, post_status = :post_status, post_alt_text = :post_alt_text, post_hover_text = :post_hover_text, post_image = :post_image WHERE post_id = :post_id ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_title' => $post_title, 'post_date' => $post_date, 'post_status' => $post_status, 'post_alt_text' => $post_alt_text, 'post_hover_text' => $post_hover_text, 'post_image' => $post_image, 'post_id' => $post_id]);
    
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
    
    header( "Location: ../edit_post.php?src=success&p_id={$post_id}");
    exit();

}

        
?>