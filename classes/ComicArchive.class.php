<?php 
    class ComicArchive {
        
        // CHECKS FOR FIRST/LAST COMIC, RETURNS THE CORRECT PAGE FOR EACH ARCHIVE ITEM
        public function archiveCheck($post_id, $loopCounter, $numRows) {
            if ($loopCounter == 1) {echo 'first.php';} 
            else if ($loopCounter == $numRows) {echo 'index.php';}
            else {echo "comic.php?p_id={$post_id}" ;}
        }

        // AUTOMATICALLY CREATES A THUMBNAIL FROM UPLOADED COMICS, PLACES IN COMIC IMAGE FOLDER
        public function createThumb($imagePath, $post_image, $post_id) {
            $thumb = new \Imagick(realpath($imagePath));

            $thumb->resizeImage(600,0,Imagick::FILTER_LANCZOS,1);

            $thumbFileName = substr_replace($post_image, "_thumb.jpg", -4);
            $thumbFilePath = "images/comics/{$post_id}/{$thumbFileName}";
            fopen($thumbFilePath, "w");

            $thumb->writeImage(realpath($thumbFilePath));

            $thumb->destroy();
        }
    }
?>