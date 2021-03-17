<?php
    class ComicDisplay {
        
        //  Properties 
        private $conn;

        //  Get database access 
        public function __construct(\PDO $pdo) {
            $this->conn = $pdo;
        }

        ///// CREATES ASSOC ARRAY OF SELECTED COMIC COLUMNS, IN ORDER TO PASS OUT OF FUNCTION FOR ECHOING
        public function createComicArr($row) {
            $post_date = $row['post_date'];
            $post_date = new DateTime($post_date);
            $post_date = $post_date->format("F d, Y");
            
            return $comicArr = array('post_id' => $row['post_id'], 'post_image' => $row['post_image'], 'post_alt_text' => $row['post_alt_text'], 'post_hover_text' => $row['post_hover_text'], 'post_title' => $row['post_title'], 'post_date' => $post_date);
        }

        ///// LATEST COMIC QUERY
        public function comicDisplayIndex() {
            $row = $this->conn->query("SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id DESC LIMIT 1")->fetch();
            $this->latest_post_id = $row['post_id'];
            return $this->createComicArr($row);
        }
        
        ///// FIRST COMIC QUERY
        public function comicDisplayFirst() {
            $row = $this->conn->query("SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id LIMIT 1")->fetch();
            return $this->createComicArr($row);
        }

        ///// CURRENT COMIC QUERY VIA comic.php, NOT first.php / index.php
        public function comicDisplay($post_id) {
            $stmt = $this->conn->prepare("SELECT * FROM posts WHERE post_id = :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP"); 

            $stmt->execute(['post_id' => $post_id]);

            $stmt = $stmt->fetch();  
           
            return $this->createComicArr($stmt);
        }

}
?>