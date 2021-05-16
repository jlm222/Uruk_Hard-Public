<?php
    class ImageService {

        private $jpgFilePath;
        private $webpFilePath;

        public function convertPostImage($post_id, $filename, $tempPostImage){
            // Creates folder for post ID if folder doesn't exist
            $this->createComicFolder($post_id);
            $this->commonImageLogic($post_id, $filename, $tempPostImage);
            $this->createThumbnailImage($this->jpgFilePath, $filename, $post_id);
        }

        public function convertSecretImage($post_id, $filename, $tempPostImage){
            $this->commonImageLogic($post_id, $filename, $tempPostImage);
        }

        public function commonImageLogic($post_id, $filename, $tempPostImage) {
            // Sets filepaths for conversion/saving to folder
            $this->setFilepaths($post_id, $filename);
            // Converts and saves images
            $this->convertToJpg($tempPostImage, $this->jpgFilePath);
            $this->convertToWebp($tempPostImage, $this->webpFilePath);
        }
        
        public function convertToJpg($tempPostImage, $filepath, $compression_quality = 80) {
            $imagick = new \Imagick($tempPostImage);

            if($imagick->getImageFormat() == 'PNG') {
                // Fixes transparent background
                $imagick->setImageBackgroundColor('white');
                $imagick = $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);
            }

            $imagick->setImageCompressionQuality($compression_quality);
            $imagick->resizeImage(1000,0,\Imagick::FILTER_LANCZOS,1);
            $imagick->setImageFormat('jpg');
            
            $imagick->writeImageFile(fopen($filepath, 'w'));
            $imagick->clear();   
        }
            
        public function convertToWebp($tempPostImage, $filepath, $compression_quality = 80) {
            $imagick = new \Imagick($tempPostImage);
            
            $imagick->resizeImage(1000,0,\Imagick::FILTER_LANCZOS,1);
            $imagick->setImageCompressionQuality($compression_quality);
            $imagick->setOption('webp:method', '6');
            $imagick->setImageFormat('webp');

            if($imagick->getImageFormat() == 'PNG') {
                $imagick->setImageAlphaChannel(imagick::ALPHACHANNEL_ACTIVATE);
                $imagick->setBackgroundColor(new ImagickPixel('transparent'));
                $imagick->setOption('webp:method', '6');
                $imagick->setOption('webp:lossless', 'false');
                $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
            }

            $imagick->writeImageFile(fopen($filepath, 'w'));
            $imagick->clear();
        }
        
        public function createThumbnailImage($imagePath, $post_image, $post_id) {
            $imagick = new \Imagick(realpath($imagePath));
            
            $imagick->resizeImage(600,0,\Imagick::FILTER_LANCZOS,1);
            
            $thumbFileName = substr_replace($post_image, "_thumb", strrpos($post_image, '.'), 0);
            $thumbFilePath =  "images/comics/{$post_id}/{$thumbFileName}";
            $imagick->setImageCompressionQuality(70);
            
            $imagick->writeImageFile(fopen($thumbFilePath, "w"));
            $imagick->clear();
        }
        
        public function createComicFolder($post_id) {
            $postDir = "images/comics/{$post_id}";
            if(!is_dir($postDir)) {
                mkdir($postDir);
            }
        }

        public function changeFileExtToWebp($filename){
            return substr_replace($filename, "webp", strrpos($filename, '.') + 1);
        }

        public function setFilepaths($post_id, $filename) {
            $this->jpgFilePath = "images/comics/{$post_id}/{$filename}";
            $this->webpFilePath = "images/comics/{$post_id}/{$this->changeFileExtToWebp($filename)}";
        }
    }