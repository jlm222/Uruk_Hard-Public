<?php require "inc/admin_header.php"; ?>
<?php require "inc/admin_navigation.php"; ?>

<main class="col-md-10 ms-sm-auto mt-md-3 px-md-4 ">

<?php if(!empty($data['success'])) : ?>
    <p class='alert alert-success col-md-6 col-lg-4 fs-6 mt-sm-3 mt-md-2'>Post Updated. 
        <a href="<?= URLROOT; ?>/pages/comic/<?= $data['post_id']; ?>">View Post</a> or head back to the <a href='<?= URLROOT; ?>/admin'>Dashboard</a>
    </p>
<?php endif; ?>

<form action="<?= URLROOT; ?>/posts/editPost"  method="POST" enctype="multipart/form-data" class="pb-4">
    <div class="row g-3 mt-2 mt-md-0">
        <div class="col-md-6 col-lg-4">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post_title" name="post_title" value="<?= $data['post_title']; ?>" required autofocus>
        </div>
    </div>
  
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="post_image" class="form-label">Upload Image</label>
            <input name="images[]" type="file" class="form-control" id="post_image" accept="image/*">
            <p class="text-muted">If left empty it will stay as current image</p>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="post_secret_image" class="form-label">Upload Secret Image</label>
            <input name="images[]" type="file" class="form-control" id="post_secret_image" accept="image/*">
            <p class="text-muted">If left empty it will stay as current image</p>
        </div>
    </div>

    <div class="row g-3 mt-0">
        <div class="col-md-6 col-lg-4">
            <label for="post_date" class="form-label">Publish Date/Time <span class="not-bold text-muted">(UTC/GMT)</span>  
            <br><em><span class="not-bold"> Format must be: </span></em><br>&nbsp;  YYYY-MM-DD HH:MM (24H)</label> 
            <input type="text" class="form-control" id="post_date" name="post_date" value="<?= substr_replace($data['post_date'], '', -3); ?>"  required>    
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_status" class="form-label">Status</label>
            <select name="post_status" id="post_status" class="form-select">
                <option value="published" selected><?= $data['post_status']; ?></option>
                <option value="draft"><?= $not_status = ($data['post_status'] == 'published') ? 'draft' : 'published'; ?></option>
            </select>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_alt_text" class="form-label">Image Alt Text <span class="not-bold text-muted">(Resizable text box, bottom right corner)</span></label>
            <textarea type="text" name="post_alt_text" id="post_alt_text" class="form-control" rows="5" cols="30" placeholder="Alternative text for screenreaders and SEO"><?= $data['post_alt_text']; ?></textarea>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6 col-lg-4">
            <label for="post_hover_text" class="form-label">Image Hover Text <span class="not-bold text-muted">(when you mouse over the image)</span></label>
            <textarea type="text" name="post_hover_text" id="post_hover_text" class="form-control" rows="2" cols="30" placeholder="Image Hover Text"><?= $data['post_hover_text']; ?></textarea>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </div>

    <input type="hidden" name="post_id" value="<?= $data['post_id']; ?>"> 
    <input type="hidden" name="old_image" value="<?= $data['post_image']; ?>"> 
    <input type="hidden" name="old_secret_image" value="<?= $data['post_secret_image']; ?>"> 

</form>
</main>

<?php require "inc/admin_footer.php"; ?>