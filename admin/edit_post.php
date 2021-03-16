<?php require_once "includes/admin_header.php"; ?>
<?php require_once "includes/admin_navigation.php"; ?>


<?php
    if(!trim($_GET['p_id'])) {
        header('Location: ../error.php');
        exit();
    } else if(trim($_GET['p_id'])) {
        $p_id = trim($_GET['p_id']);
    }

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = ?"); 
    $stmt->execute([$p_id]);

    $row = $stmt->fetch();
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_status = $row['post_status'];
    $post_date = $row['post_date'];
    $post_alt_text = $row['post_alt_text'];
    $post_hover_text = $row['post_hover_text'];

    $post_image = $row['post_image'];
    $old_image = $post_image;

    $post_date = date("Y-m-d H:i:s", strtotime($post_date));

    // Close statement
    unset($stmt);
        
    // Close connection
    unset($pdo);
?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 mt-md-4">

<?php 
if(isset($_GET['src'])) {
    $p_id = trim($_GET['p_id']);
    $successMsg = "<p class='alert alert-success col-6 col-lg-4'>Post Added. 
    <a href='../comic.php?p_id={$post_id}'>View Post</a> or <a href='index.php'>View All Posts</a></p>";
    
    echo $successMsg;
} 
?>

<form action="POST/edit_query.php" method="POST" enctype="multipart/form-data">
    <div class="row g-3 mt-2 mt-md-0">
        <div class="col-md-6 col-lg-4">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" required autofocus value="<?= $post_title; ?>"> 
        </div>
    </div>
  
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="post_image" class="form-label">Upload Image</label>
            <input name="image" type="file" class="form-control" id="post_image" accept="image/*">
            <p class="text-muted">If left empty it will stay as current image</p>
        </div>
    </div>

    <div class="row g-3 mt-0">
        <div class="col-md-6 col-lg-4">
            <label for="post_date" class="form-label">Publish Date/Time (UTC/GMT)  <br> Format must be: <br>&nbsp;  YYYY-MM-DD HH:MM (24H)</label> 
            <input type="text" class="form-control" id="post_date" name="post_date" value="<?php date_default_timezone_set("UTC"); echo substr_replace($post_date, '', -3)  ; ?>"  required>
             
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_status" class="form-label">Status</label>
            <select name="post_status" id="post_status" class="form-select">
                <option value="published" selected><?= $post_status; ?></option>
                <option value="draft"><?= $not_status = ($post_status == 'published') ? 'draft' : 'published'; ?></option>
            </select>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_alt_text" class="form-label">Image Alt Text</label>
            <textarea type="text" name="post_alt_text" id="post_alt_text" class="form-control" rows="5" cols="30" placeholder="Alternative text for screenreaders and SEO" value=""><?= $post_alt_text; ?></textarea> 
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_hover_text" class="form-label">Image Hover Text - (255 character limit)</label>
            <textarea type="text" name="post_hover_text" id="post_hover_text" class="form-control" rows="2" cols="30" placeholder="Text that appears when hovering over image (255 character limit)"><?= $post_hover_text;?></textarea>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
        </div>
    </div>

    <input type="hidden" name="post_id" value="<?= $post_id; ?>"> 
    <input type="hidden" name="old_image" value="<?= $old_image; ?>"> 

</form>
</main>
<?php include "includes/admin_footer.php"; ?>