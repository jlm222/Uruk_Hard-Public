<?php require_once "includes/db.php" ?>
<?php require_once "includes/functions.php" ?>

<?php require_once "includes/header.php" ?>
<?php require_once "includes/navigation_first.php" ?>


<?php 

// Prepare a select statement
$sql = "SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id LIMIT 1";

$stmt = $pdo->query($sql);

// Attempt to execute the prepared statement
    $row = $stmt->fetch(); 

    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_image = $row['post_image'];
    $post_status = $row['post_status'];
    $post_date = $row['post_date'];
    $post_alt_text = $row['post_alt_text'];
    $post_hover_text = $row['post_hover_text'];

    $formatted_date = new DateTime($post_date);
    $post_date = $formatted_date->format("F d, Y");

 // Close statement
 unset($stmt);
    
 // Close connection
 unset($pdo);

?>

<main>
    <section class="comic__container">
        <img src="images/comics/<?= $post_id; ?>/<?= $post_image; ?>"  class="comic__img" alt="<?= $post_alt_text; ?>" 
        title="<?php if (empty($post_hover_text)) {echo $post_title;} else {echo $post_hover_text;}  ?>" >
        
        <div class="comic__under">
            <div class="comic__info">
                <h1 class="comic__title"><?= $post_title; ?></h1>
                <h2 class="comic__date">on <?= $post_date; ?></h2>
            </div>

            <div class="comic-secret">
                <div class="comic-secret__img"></div>
            </div>
        </div>
    </section>
</main>
    
<?php include "includes/footer.php" ?>