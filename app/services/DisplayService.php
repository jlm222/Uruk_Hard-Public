<?php
    class DisplayService {
        private $data = [];
        private $loopCounter = 0;

        public function displayComicsArchive($displayQuery){
            foreach($displayQuery as $row) {
                // Formate date
                $post_date = $this->dateFormatArchive($row);
                // Get thumbnail path & page link
                $comicArr = $this->displayLogic($post_date, $row);
                // Use loop counter to insert $comicArr into $data array
                // This is because it's quicker computationally than array_push
                $this->data['comic_data'][$this->loopCounter] = $comicArr;
                $this->loopCounter++;
            }
            return $this->data;
        }

        public function displayComicsAdmin($displayQuery){
            foreach($displayQuery as $row) {
                // Formate date
                $post_date = $this->dateFormatAdmin($row);
                // Get thumbnail path & page link      
                $comicArr = $this->displayLogic($post_date, $row);
                // Use loop counter to insert $comicArr into $data array
                // This is because it's quicker computationally than array_push
                $this->data[$this->loopCounter] = $comicArr;
                $this->loopCounter++;
            }
            return $this->data;
        }

        public function displayLogic($post_date, $row){
            // Change name to get thumbnail
            $post_image = substr_replace($row['post_image'], "_thumb.jpg", strrpos($row['post_image'], '.'));
            $post_secret_image = $row['post_secret_image'];

            return [ 
                'post_id' => $row['post_id'],
                'post_title' => $row['post_title'],
                'post_image' => $post_image,
                'post_secret_image' => $post_secret_image,
                'post_date' => $post_date,
                'post_status' => $row['post_status'],
                'post_alt_text' => $row['post_alt_text'],
                'post_hover_text' => $row['post_hover_text'],
                'post_link' => URLROOT . "/pages/comic/{$row['post_id']}",
                'img_link' => COMICFOLDER . "{$row['post_id']}/{$post_image}",
                'secret_img_link' => COMICFOLDER . "{$row['post_id']}/{$post_secret_image}",
                'form_action' => URLROOT . "/posts/post",
                'edit_link' => URLROOT . "/admin/editPost/{$row['post_id']}",
                'delete_link' => URLROOT . "/admin/deletePost/{$row['post_id']}"
            ];
        }

        public function dateFormatArchive($row){
            $formatted_date = new DateTime($row['post_date']);
            return $formatted_date->format("Y - M d");
        }

        public function dateFormatAdmin($row){
            $formatted_date = new DateTime($row['post_date']);
            return $formatted_date->format("Y/m/d");
        }
}