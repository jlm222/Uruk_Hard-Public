<?php require "includes/admin_header.php"; ?>
<?php require "includes/admin_navigation.php"; ?>

<?php

if (($_GET['p_id'])) {

    $post_id = trim($_GET['p_id']);

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = ?");
    $stmt->execute([$post_id]);
            
    $row = $stmt->fetch();
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_image = $row['post_image'];
    $post_status = $row['post_status'];
    $post_date = $row['post_date'];

    //// Change name to get thumbnail
    $post_image = substr_replace($post_image, "_thumb.jpg", -4);

    //// Formats Date to Sortable Format
    $formatted_date = new DateTime($post_date);
    $post_date = $formatted_date->format("Y/m/d");

    $imageDir = "../images/comics/$post_id";

    // Close statement
    unset($stmt);
        
    // Close connection
    unset($pdo);
}

?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 mt-md-4 ">
<h2 class="row col-md-8 alert alert-danger">You sure you wanna do this?</h2>

    <div class="row g-3 mt-2 mt-md-0 ">
        <div class="col-md-6 col-lg-4">
            <h2><?= $post_title; ?></h2>
        </div>
    </div>

    <div class="row g-3 mt-2 mt-md-0 ">
        <div class="col-md-6 col-lg-4 col-sm-7">
            <img width="300rem" height="auto" src="../images/comics/<?= $post_id; ?>/<?= $post_image; ?>" alt="">
        </div>
    </div>
        
    <form class="col-sm-1 mt-5" action="POST/delete_query.php" method="POST">
                <h2 class="mb-3">Delete?</h2>
            <div class="col-2 d-grid gap-5">
                <button type="submit" class="btn-lg btn btn-danger px-5" name="p_id" value="<?= trim($_GET["p_id"]); ?>">Yes</button>
                <a href="index.php" class="btn-lg btn btn-secondary">No</a>
            </div>
        </div>
    </form>

</main>

<?php require "includes/admin_footer.php"; ?>