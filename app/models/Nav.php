<?php 
    class Nav {
        private $db;
        
        public function __construct($db) {
            $this->db = $db;
        }

        // PROPERTIES
        private $commonNavQuery = "SELECT post_id FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id ";

        // METHODS
        // Gets first post id, used for previous comic nav
        public function comicFirstQuery() {
            $this->db->query($this->commonNavQuery . " LIMIT 1");
            return $this->db->fetchColumn();
        }
        
        // Previous comic nav
        public function comicPrevQuery($post_id) {
            $sql = "SELECT max(post_id) FROM posts WHERE post_id < :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
            $this->db->prepare($sql);
            $this->db->bind('post_id', $post_id);
            return $this->db->fetchColumn();
        }
        
        // Next comic nav
        public function comicNextQuery($post_id) {
            $sql = "SELECT min(post_id) FROM posts WHERE post_id > :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
            $this->db->prepare($sql);
            $this->db->bind('post_id', $post_id);
            return $this->db->fetchColumn();
        }  

        // Next comic nav for first comic page
        public function getNextIdForFirstComic() {
            $this->db->query($this->commonNavQuery . " LIMIT 1,1");
            return $this->db->fetchColumn();
        }

        // Previous comic nav for index page 
        public function getPrevIdForIndexComic() {            
            $this->db->query($this->commonNavQuery . " DESC LIMIT 1,1");
            return $this->db->fetchColumn();
        }
    }