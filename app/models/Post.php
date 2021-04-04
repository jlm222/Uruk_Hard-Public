<?php
    class Post {
        private $db;

        public function __construct($connection){
            $this->db = $connection;
        }

        public function addPostQuery($postArr){
            $this->db->prepare("INSERT INTO posts (post_title, post_image, post_date, post_status, post_alt_text, post_hover_text) VALUES (:post_title, :post_image, :post_date, :post_status, :post_alt_text, :post_hover_text)");
            $this->db->bind('post_title', $postArr['post_title']);
            $this->db->bind('post_image', $postArr['post_image']);
            $this->db->bind('post_date', $postArr['post_date']);
            $this->db->bind('post_status', $postArr['post_status']);
            $this->db->bind('post_alt_text', $postArr['post_alt_text']);
            $this->db->bind('post_hover_text', $postArr['post_hover_text']);
            $this->db->execute();
        }

        public function editPostQuery($postArr){
            $this->db->prepare("UPDATE posts SET post_title = :post_title, post_date = :post_date, post_status = :post_status, post_alt_text = :post_alt_text, post_hover_text = :post_hover_text, post_image = :post_image WHERE post_id = :post_id ");
            $this->db->bind('post_title', $postArr['post_title']);
            $this->db->bind('post_image', $postArr['post_image']);
            $this->db->bind('post_date', $postArr['post_date']);
            $this->db->bind('post_status', $postArr['post_status']);
            $this->db->bind('post_alt_text', $postArr['post_alt_text']);
            $this->db->bind('post_hover_text', $postArr['post_hover_text']);
            $this->bindExecute($postArr['post_id']);
        }

        public function getPostID(){
            return $this->db->getInsertId();
        }

        public function postPublish($post_id){
            $this->db->prepare("UPDATE posts SET post_status = 'published' WHERE post_id = :post_id");
            $this->bindExecute($post_id);
        }

        public function postDraft($post_id){
            $this->db->prepare("UPDATE posts SET post_status = 'draft' WHERE post_id = :post_id");
            $this->bindExecute($post_id);
        }

        public function postDelete($post_id){
            $this->db->prepare("DELETE FROM posts WHERE post_id = :post_id");
            $this->bindExecute($post_id);
        }

        public function getPost($post_id){
            $this->db->prepare("SELECT * FROM posts WHERE post_id = :post_id");
            $this->db->bind('post_id', $post_id);
            return $this->db->fetchRow();
        }

        public function bindExecute($post_id){
            $this->db->bind('post_id', $post_id);
            $this->db->execute();
        }

        
}