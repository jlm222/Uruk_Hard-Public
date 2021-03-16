<?php require_once "includes/db.php" ?>
<?php require_once "includes/functions.php" ?>
<?php require_once "includes/header.php" ?>


<main class="archive">
    <h1 class="archive__title">Archive</h1>
    <ul class="archive__list">

<?php

    // List items per page
    $per_page = 20;

    if(isset($_GET['page'])) {
        $page = trim($_GET['page']);
    } else {
        $page = "1";
    }

    if($page == "" || $page == 1) {
        $page_1 = 0;
    } else {
        $page_1 = ($page * $per_page) - $per_page;
    }

    $sql = "SELECT COUNT(post_id) FROM posts WHERE post_status = 'published'";
    $stmt = $pdo->query($sql);

    // numRows used for archiveCheck() below, count used for dividing total posts into desired $per_page quantity
    $numRows = $count = $stmt->fetchColumn();

    $count = ceil($count / $per_page);

    $sql = "SELECT * FROM posts WHERE post_status = 'published' LIMIT :page_1, :per_page" ;
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['page_1' => $page_1, 'per_page' => $per_page]);

    $loopCounter = 0;
    while($row = $stmt->fetch()) {
        global $loopCounter;
        global $numRows;
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_image = $row['post_image'];
        $post_status = $row['post_status'];
        $post_date = $row['post_date'];
        $post_alt_text = $row['post_alt_text'];
        $post_hover_text = $row['post_hover_text'];

        //// Formats Date to Readable Format
        $formatted_date = new DateTime($post_date);
        $post_date = $formatted_date->format("Y - M d");

        //// Change name to get thumbnail
        $post_image = substr_replace($post_image, "_thumb.jpg", -4);
        
        //// For checking if first or last loop/comic
        $loopCounter++;

?>  

        <li class="archive__item">
            <h4 class="archive__dates"><?= $post_date; ?>&nbsp;</h4>
            <h3 class="archive__titles">&nbsp;&nbsp;<?= $post_title; ?></h3>
            <a href="<?php archiveCheck($post_id, $loopCounter, $numRows); ?>" class="archive__link">
                <img src="images/comics/<?= $post_id; ?>/<?= $post_image; ?>" alt="<?= $post_alt_text; ?>" class="archive__img" 
                title="<?= $post_hover_text ;?>">  
            </a>
        </li>

    <?php  } 

        // Close statement
        unset($stmt);
            
        // Close connection
        unset($pdo);
        
    ?>

    </ul>
</main>


<!-- Pager to be implemented in the future, for the moment not needed -->

<!-- <ul class="pager">
        <?php
            // for ($i=1; $i <= $count; $i++) { 
            //     if ($i == $page) {
            //         echo "<li class='pager__item'><a class='active_link' href='archive.php?page={$i}'>{$i}</a></li>";
                
            //     } else {
            //         echo "<li class='pager__item'><a class='' href='archive.php?page={$i}'>{$i}</a></li>";
            //     }
            // }
        ?>
        </ul> -->



<?php include "includes/footer.php" ?>
