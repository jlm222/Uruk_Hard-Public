<?php 

//// CHECKBOXES QUERY LOGIC
if(isset($_POST['submit'])) {
    if(isset($_POST['checkBoxArray'])) {
        foreach ($_POST['checkBoxArray'] as $checkBox_post_id) {
             $bulk_options = $_POST['bulk_options'];

            switch($bulk_options) {
                case 'published':
                    $sql = "UPDATE posts SET post_status = :status WHERE post_id = :post_id";
                    $pdo->prepare($sql)->execute(['status' => $bulk_options, 'post_id' => $checkBox_post_id]);
                    break;
                case 'draft':
                    $sql = "UPDATE posts SET post_status = :status WHERE post_id = :post_id";
                    $pdo->prepare($sql)->execute(['status' => $bulk_options, 'post_id' => $checkBox_post_id]);
                    break;
                case 'delete':
                    $sql = "DELETE FROM posts WHERE post_id = ?";
                    $pdo->prepare($sql)->execute([$checkBox_post_id]);
                    break;
            }
        }
    }
}

?>