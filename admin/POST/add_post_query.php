<?php

////// ADD POST TO DATABASE
if(isset($_POST['submit'])) {
    
        require "../../includes/db.inc.php";
        require "../includes/admin_functions.php"; 
        
        $post_title = $_POST['post_title'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_date = $_POST['post_date'];
        $post_status = $_POST['post_status'];
        $post_alt_text = $_POST['post_alt_text'];
        $post_hover_text = $_POST['post_hover_text'];
        
        $post_date = date("Y-m-d H:i:s", strtotime($post_date));
        
        
        $sql = "INSERT INTO posts (post_title, post_image, post_date, post_status, post_alt_text, post_hover_text) VALUES (:post_title, :post_image, :post_date, :post_status, :post_alt_text, :post_hover_text)";

        $stmt = $pdo->prepare($sql)->execute(['post_title' => $post_title, 'post_image' => $post_image, 'post_date' => $post_date, 'post_status' => $post_status, 'post_alt_text' => $post_alt_text, 'post_hover_text' => $post_hover_text]);
        
        $post_id = $pdo->lastInsertId();

        //// Creates folder for post ID if doesn't exist
        comicFolder($post_id);

        //// Moves image to comic folder
        $imageFilePath = "../../images/comics/{$post_id}/{$post_image}";
        move_uploaded_file($post_image_temp, $imageFilePath); 

        //// Creates a thumbnail of the comic
        thumbnailImage($imageFilePath, $post_image, $post_id);

        // Close statement
        unset($stmt);
    
        // Close connection
        unset($pdo);
    
        header( "Location: ../add_post.php?src=success&p_id={$post_id}");
        exit();
    }

?>