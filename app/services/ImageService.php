<?php
    class ImageService {
        public function logicImage($post_id, $post_image, $post_image_temp){
            // Creates folder for post ID if folder doesn't exist
            $this->comicFolder($post_id);
            // Set variables for functions
            $imageFilePath = "images/comics/{$post_id}/{$post_image}";
            // Move image to folder
            move_uploaded_file($post_image_temp, $imageFilePath);
            // Creates a thumbnail of the comic
            $this->thumbnailImage($imageFilePath, $post_image, $post_id);
        }

        public function comicFolder($post_id) {
            $postDir = "images/comics/{$post_id}";
            if(!is_dir($postDir)) {
                mkdir($postDir);
            }
        }

        public function thumbnailImage($imagePath, $post_image, $post_id) {
            $thumb = new \Imagick(realpath($imagePath));
        
            $thumb->resizeImage(600,0,\Imagick::FILTER_LANCZOS,1);
        
            //// Finds the position of the '.' in the filename
            $position = strrpos($post_image, '.');
        
            $thumbFileName = substr_replace($post_image, "_thumb", $position, 0);
            $thumbFilePath =  "images/comics/{$post_id}/{$thumbFileName}";
            fopen($thumbFilePath, "w");
        
            $thumb->writeImage(realpath($thumbFilePath));
        
            $thumb->destroy();
        }
    }