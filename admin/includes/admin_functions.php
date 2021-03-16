<?php

function comicFolder($post_id) {
    $post_id = "../../images/comics/{$post_id}";

    if(!is_dir($post_id)) {
        mkdir($post_id);
    }
}

function thumbnailImage($imagePath, $post_image, $post_id) {
    $thumb = new \Imagick(realpath($imagePath));

    $thumb->resizeImage(600,0,Imagick::FILTER_LANCZOS,1);

    //// Finds the position of the '.' in the filename
    $position = strrpos($post_image, '.');

    $thumbFileName = substr_replace($post_image, "_thumb", ($position), 0);
    $thumbFilePath = "../../images/comics/{$post_id}/{$thumbFileName}";
    fopen($thumbFilePath, "w");

    $thumb->writeImage(realpath($thumbFilePath));

    $thumb->destroy();
}

?>