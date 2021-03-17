<?php require "includes/admin_header.php"; ?>
<?php require "includes/admin_navigation.php"; ?>


<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 mt-md-4">

<?php 
if(isset($_GET['src'])) {
    $p_id = trim($_GET['p_id']);
    $successMsg = "<p class='alert alert-success col-6 col-lg-4'>Post Added. 
    <a href='../comic.php?p_id={$p_id}'>View Post</a> or <a href='index.php'>View All Posts</a></p>";
    
    echo $successMsg;
} 
?>

<form action="POST/add_post_query.php" method="POST" enctype="multipart/form-data">
    <div class="row g-3 mt-2 mt-md-0">
        <div class="col-md-6 col-lg-4">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" required autofocus>
        </div>
    </div>
  
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="post_image" class="form-label">Upload Image</label>
            <input name="image" type="file" class="form-control" id="post_image" accept="image/*" required>
            <p class="text-muted">Short and simple filenames, no spaces. <br> If required use underscores/hyphens for example "test_image" or "test-image" <br><br>
            Reduce filesize to at least 500kb or less, preferably lowest possible while retaining quality </p>
        </div>
    </div>

    <div class="row g-3 mt-0">
        <div class="col-md-6 col-lg-4">
            <label for="post_date" class="form-label">Publish Date/Time (UTC/GMT)  <br> Format must be: <br>&nbsp;  YYYY-MM-DD HH:MM (24H)</label> 
            <input type="text" class="form-control" id="post_date" name="post_date" value="<?php date_default_timezone_set("UTC"); echo date("Y-m-d H:i", time()); ?>"  required>
             
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_status" class="form-label">Status</label>
            <select name="post_status" id="post_status" class="form-select">
                <option value="published" selected>published</option>
                <option value="draft">draft</option>
            </select>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_alt_text" class="form-label">Image Alt Text</label>
            <textarea type="text" name="post_alt_text" id="post_alt_text" class="form-control" rows="5" cols="30" placeholder="Alternative text for screenreaders and SEO"></textarea>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_hover_text" class="form-label">Image Hover Text</label>
            <textarea type="text" name="post_hover_text" id="post_hover_text" class="form-control" rows="2" cols="30" placeholder="Text that appears when hovering over image (255 character limit)"></textarea>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </div>

</form>
</main>

<?php require "includes/admin_footer.php"; ?>