<?php

class Archive 
{
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    // Gets total number of pages
    public function getPageTotal() {
        $this->db->query("SELECT COUNT(post_id) FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP");
        return $this->db->fetchColumn();
    }

    // Grabs pages from database and displays on page
    public function displayQuery($offset, $per_page) {
        $this->db->prepare("SELECT post_id, post_image, post_secret_image, post_status, post_title, post_date, post_alt_text, post_hover_text FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP LIMIT :offset, :per_page");
        $this->db->bind('offset', $offset);
        $this->db->bind('per_page', $per_page);
        return $this->db->fetchAllRows();
    }        
}