<?php 
    class ComicArchive {
        // PDO Connection
        private $conn;

        //  Get database access 
        public function __construct(\PDO $pdo) {
            $this->conn = $pdo;
        }

        // Properties
        private $per_page = 20;
        private $page = 1;
        private $offset;
        private $count;
        private $loopCounter = 0;

        // Sets offset for pager
        private function setOffset() {
            ($this->page - 1) * $this->per_page;
        }

        // Gets total number of pages, divides by per_page
        private function getPageTotal() {
            $sql = "SELECT COUNT(post_id) FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP";
            $stmt = $this->conn->query($sql);

            $count = $stmt->fetchColumn();
            unset($stmt);
            
            $this->count = ceil($count / $this->per_page);
        }
        
        // Checks for first/last comic, returns the correct page link
        private function archiveCheck($post_id, $loopCounter, $count) {
            if ($loopCounter == 1) {echo 'first.php';} 
            else if ($loopCounter == $count) {echo 'index.php';}
            else {echo "comic.php?p_id={$post_id}" ;}
        }

        // Grabs pages from database and displays on page
        private function displayArchive() {
            $sql = "SELECT * FROM posts WHERE post_status = 'published' AND post_date < CURRENT_TIMESTAMP LIMIT :offset, :per_page";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['offset' => $this->offset, 'per_page' => $this->per_page]);

            while($row = $stmt->fetch()) {                
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status'];
                $post_date = $row['post_date'];
                $post_alt_text = $row['post_alt_text'];
                $post_hover_text = $row['post_hover_text'];
        
                //// Formats Date to Readable Format
                $formatted_date = new DateTime($post_date);
                $post_date = $formatted_date->format("Y - M d");
        
                //// Change name to get thumbnail
                $post_image = substr_replace($post_image, "_thumb.jpg", -4);
                
                //// For checking if first or last loop/comic
                $this->loopCounter++;
                
                ?>
                
                <li class="archive__item">
                    <h4 class="archive__dates"><?= $post_date; ?>&nbsp;</h4>
                    <h3 class="archive__titles">&nbsp;&nbsp;<?= $post_title; ?></h3>
                    <a href="<?php $this->archiveCheck($post_id, $this->loopCounter, $this->count); ?>" class="archive__link">
                        <img src="images/comics/<?= $post_id; ?>/<?= $post_image; ?>" alt="<?= $post_alt_text; ?>" class="archive__img" 
                        title="<?= $post_hover_text ;?>">  
                    </a>
                </li>

                <?php
            }
        }

        public function fullArchiveFunc($page) {
            $this->page = ($page);
            $this->setOffset();
            $this->getPageTotal();
            $this->displayArchive();
        }
        

        // Automatically creates a thumbnail from uploaded comics, places in comic image folder
        public function createThumb($imagePath, $post_image, $post_id) {
            $thumb = new \Imagick(realpath($imagePath));

            $thumb->resizeImage(600,0,Imagick::FILTER_LANCZOS,1);

            $thumbFileName = substr_replace($post_image, "_thumb.jpg", -4);
            $thumbFilePath = "images/comics/{$post_id}/{$thumbFileName}";
            fopen($thumbFilePath, "w");

            $thumb->writeImage(realpath($thumbFilePath));

            $thumb->destroy();
        }
    }
?>