<?php 
    class Comic {
        private $db;

        public function __construct($connection){
            $this->db = $connection;
        }

        // METHODS
        // Current comic query via comic.php
        public function getComicQuery($post_id) {
            $this->db->prepare("SELECT * FROM posts WHERE post_id = :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP"); 
            $this->db->bind('post_id', $post_id);
            return $this->db->fetchRow();
        }

        // Latest comic query
        public function getComicIndexQuery() {
            $this->db->query("SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id DESC LIMIT 1");
            return $this->db->fetchRow();
        }

        // First comic query
        public function getComicFirstQuery() {
            $this->db->query("SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id LIMIT 1");
            return $this->db->fetchRow();
        }

        // First comic query
        public function adminDisplay() {
            $this->db->query("SELECT * FROM posts ORDER BY post_id DESC");
            return $this->db->fetchAllRows();
        }

    }