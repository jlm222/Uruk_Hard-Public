<?php require "inc/admin_header.php"; ?>
<?php require "inc/admin_navigation.php"; ?>

<main class="col-md-10 ms-sm-auto mt-md-3 px-md-4 ">
<h2 class="row col-md-8 alert alert-danger">You sure you wanna do this?</h2>

    <div class="row g-3 mt-2 mt-md-0 ">
        <div class="col-md-6 col-lg-4">
            <h2><?= $data['post_title']; ?></h2>
        </div>
    </div>

    <div class="row g-3 mt-2 mt-md-0 ">
        <div class="col-md-6 col-lg-4 col-sm-7">
            <img width="300rem" height="auto" src="<?= URLROOT; ?>/images/comics/<?= $data['post_id']; ?>/<?= $data['post_image']; ?>" alt="">
        </div>
    </div>
        
    <form class="col-sm-1 mt-5" action="<?= URLROOT; ?>/posts/deletePost/<?= $data['post_id']; ?>" method="POST">
                <h2 class="mb-3">Delete?</h2>
            <div class="col-2 d-grid gap-5">
                <button type="submit" class="btn-lg btn btn-danger px-5" name="post_id" value="<?= $data['post_id']; ?>">Yes</button>
                <a href="<?= URLROOT; ?>/admin" class="btn-lg btn btn-secondary">No</a>
            </div>
        </div>
    </form>

</main>

<?php require "inc/admin_footer.php"; ?>