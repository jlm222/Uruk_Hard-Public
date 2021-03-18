<?php
    class ComicNav {

        //  Properties 
        private $conn;
        public $firstPostId;
        public $latestPostId;
        private $commonQuery = "SELECT post_id FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id";

        //  Get database access 
        public function __construct(\PDO $pdo) {
            $this->conn = $pdo;
        }

        // Next comic nav for first comic page
        public function nextComicFirst() {
            return $this->conn->query($this->commonQuery . " LIMIT 1,1")->fetchColumn();
        }

        // Previous comic nav for index page 
        public function indexPrevComic() {            
            return $this->conn->query($this->commonQuery . " DESC LIMIT 1,1")->fetchColumn();
        }

        // Gets first post id, used for previous comic nav
        public function firstPostId() {
            $this->firstPostId = $this->conn->query($this->commonQuery . " LIMIT 1")->fetchColumn();
            return $this->firstPostId;
        }

        // Previous comic nav
        public function prevComic($post_id) {
            $sql = "SELECT max(post_id) FROM posts WHERE post_id < :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['post_id' => $post_id]);

            $prev_post_id = $stmt->fetchColumn();
            
            if($prev_post_id == $this->firstPostId) {
                return "first.php"; 
            } else {
                return "comic.php?p_id={$prev_post_id}";
            } 
        }

        // Gets latest post id, used for next comic nav
        public function latestPostId() {
            $this->latestPostId = $this->conn->query($this->commonQuery . " DESC LIMIT 1")->fetchColumn();
            return $this->latestPostId;
        }

        // Next comic nav
        public function nextComic($post_id) {
            $sql = "SELECT min(post_id) FROM posts WHERE post_id > :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['post_id' => $post_id]);

            $next_post_id = $stmt->fetchColumn();

            if($next_post_id == $this->latestPostId()) {
                return "index.php";
            } else {
                return "comic.php?p_id={$next_post_id}";
            }
        }  
}
?>