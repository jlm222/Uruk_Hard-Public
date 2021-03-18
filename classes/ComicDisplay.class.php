<?php
    class ComicDisplay {
        
        //  Properties 
        private $conn;

        //  Get database access 
        public function __construct(\PDO $pdo) {
            $this->conn = $pdo;
        }

        ///// Creates assoc array of selected comic columns, in order to pass out of function for echoing
        public function createComicArr($row) {
            $post_date = $row['post_date'];
            $post_date = new DateTime($post_date);
            $post_date = $post_date->format("F d, Y");
            
            return $comicArr = array('post_id' => $row['post_id'], 'post_image' => $row['post_image'], 'post_alt_text' => $row['post_alt_text'], 'post_hover_text' => $row['post_hover_text'], 'post_title' => $row['post_title'], 'post_date' => $post_date);
        }

        ///// Latest comic query
        public function comicDisplayIndex() {
            $row = $this->conn->query("SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id DESC LIMIT 1")->fetch();
            $this->latest_post_id = $row['post_id'];
            return $this->createComicArr($row);
        }
        
        ///// First comic query
        public function comicDisplayFirst() {
            $row = $this->conn->query("SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP ORDER BY post_id LIMIT 1")->fetch();
            return $this->createComicArr($row);
        }

        ///// Current comic query via comic.php, not first.php / index.php
        public function comicDisplay($post_id) {
            $stmt = $this->conn->prepare("SELECT * FROM posts WHERE post_id = :post_id AND post_status = 'published' AND post_date < CURRENT_TIMESTAMP"); 

            $stmt->execute(['post_id' => $post_id]);

            $stmt = $stmt->fetch();  
           
            return $this->createComicArr($stmt);
        }

}
?>