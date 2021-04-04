<?php
    class Pages extends Controller {
        public function __construct(){
            parent::__construct();
            $this->comicModel = $this->model('Comic', $this->dbh);
            $this->navModel = $this->model('Nav', $this->dbh);
        }

        public function index(){
            // Get latest comic data
            $comic = $this->comicModel->getComicIndexQuery();
            // Get nav data for navbar
            $navData = [
               'nav_first' => URLROOT . 'pages/first',
               'nav_prev' => $this->navModel->comicPrevIdForIndexQuery(),
               'nav_next' => '',
               'nav_latest' => ''
            ];
            // Merge comic and nav data
            $data = $this->mergeData($comic, $navData);
            $this->view('pages/index', $data);
        }

        public function comic($post_id){
            // Get current comic data
            $comicCurrent = $this->comicModel->getComicQuery($post_id);
            $comicFirst = $this->comicModel->getComicFirstQuery();
            $comicLatest = $this->comicModel->getComicIndexQuery();
            // Redirects to first/index page if comic is first/latest
            if($comicCurrent == $comicFirst) {redirect('pages/first');}
            elseif($comicCurrent == $comicLatest) {redirect('');}     
            
            // Get nav data for navbar
            $navData = [
                'nav_first' => URLROOT . 'pages/first',
                'nav_prev' => $this->navModel->comicPrevQuery($post_id),
                'nav_next' => $this->navModel->comicNextQuery($post_id),
                'nav_latest' => URLROOT
            ];
            // Merge comic and nav data
            $data = $this->mergeData($comicCurrent, $navData);
            $this->view('pages/comic', $data);
        }

        public function first(){
            // Get first comic
            $comic = $this->comicModel->getComicFirstQuery();
            // Get nav data for navbar
            $navData = [
                'nav_first' => '',
                'nav_prev' => '',
                'nav_next' => $this->navModel->comicNextIdForFirstQuery(),
                'nav_latest' => URLROOT
            ];
            // Merge comic and nav data
            $data = $this->mergeData($comic, $navData);
            $this->view('pages/first', $data);
        }

        public function login(){
            // Init required variables as empty
            $data = [
                'username' => '',
                'password' => ''
            ];
            $this->view('admin/login', $data);
        }

        // Sets Comic Display Data and merges with Nav Data
        private function mergeData($comic, $navData){
            $comicData = [
                'post_id' => $comic['post_id'], 
                'post_image' => $comic['post_image'], 
                'post_alt_text' => $comic['post_alt_text'], 
                'post_hover_text' => $comic['post_hover_text'], 
                'post_title' => $comic['post_title'], 
                'post_date' => $this->formatDate($comic['post_date']),
            ];
            return array_merge($comicData, $navData);
        }

        // Reformats Date for display
        private function formatDate($post_date){
            $post_date = new DateTime($post_date);
            return $post_date = $post_date->format("F d, Y");
        }
}