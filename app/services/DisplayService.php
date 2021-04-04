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
                $this->data[$this->loopCounter] = $comicArr;
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
            $post_image = substr_replace($row['post_image'], "_thumb.jpg", -4);
            // Link to comic
            $comicLink = URLROOT . "/pages/comic/{$row['post_id']}";

            return [ 
                'post_id' => $row['post_id'],
                'post_title' => $row['post_title'],
                'post_image' => $post_image,
                'post_date' => $post_date,
                'post_status' => $row['post_status'],
                'post_alt_text' => $row['post_alt_text'],
                'post_hover_text' => $row['post_hover_text'],
                'post_link' => $comicLink
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