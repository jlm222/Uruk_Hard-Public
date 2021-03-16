<?php 

///// PREVIOUS COMIC NAV FOR INDEX PAGE
function indexPrevComic($pdo) {

    $sql = "SELECT post_id FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id DESC LIMIT 1,1";
    $stmt = $pdo->query($sql);

   $prev_post_id = $stmt->fetchColumn(); 
   echo $prev_post_id;
}

///// PREVIOUS COMIC NAV
function prevComic($post_id, $pdo) {

    $sql = "SELECT post_id FROM posts WHERE post_id = (SELECT max(post_id) FROM posts WHERE post_id < :post_id) AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id]);

    //// Gets single field(post_id) of the row
    $prev_post_id = $stmt->fetchColumn();
     
    if($prev_post_id == 1) {echo "first.php" ;} else {echo "comic.php?p_id={$prev_post_id}" ;}
}

///// NEXT COMIC NAV
function nextComic($post_id, $latest_post_id, $pdo) {

    $sql = "SELECT post_id FROM posts WHERE post_id = (SELECT min(post_id) FROM posts WHERE post_id > :post_id) AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id]);

    //// Gets single field(post_id) of the row
    $next_post_id = $stmt->fetchColumn();

    if($next_post_id == $latest_post_id) {echo "index.php" ;} else {echo "comic.php?p_id={$next_post_id}" ;}
}

///// NEXT COMIC NAV FOR FIRST COMIC PAGE
function nextComicFirst($first_post_id) {
    echo "comic.php?p_id=" . ($first_post_id + 1);
}

///// CHECKS FOR FIRST/LAST COMIC, RETURNS THE CORRECT PAGE FOR EACH ARCHIVE ITEM
function archiveCheck($post_id, $loopCounter, $numRows) {
    if ($loopCounter == 1) {echo 'first.php';} 
    else if ($loopCounter == $numRows) {echo 'index.php';}
    else {echo "comic.php?p_id={$post_id}" ;}
}

///// AUTOMATICALLY CREATES A THUMBNAIL FROM UPLOADED COMICS, PLACES IN COMIC IMAGE FOLDER
function thumbnailImage($imagePath, $post_image, $post_id) {
    $thumb = new \Imagick(realpath($imagePath));

    $thumb->resizeImage(600,0,Imagick::FILTER_LANCZOS,1);

    $thumbFileName = substr_replace($post_image, "_thumb.jpg", -4);
    $thumbFilePath = "images/comics/{$post_id}/{$thumbFileName}";
    fopen($thumbFilePath, "w");

    $thumb->writeImage(realpath($thumbFilePath));

    $thumb->destroy();
}

?>