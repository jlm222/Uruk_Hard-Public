<?php
    class Archives extends Controller {
        public function __construct(){
            parent::__construct();
            $this->archiveModel = $this->model('Archive', $this->dbh);
            $this->displayService = $this->service('DisplayService');
        }
        
        // PROPERTIES
        private $count;
        private $page = 1;
        private $offset = 0;
        private $per_page = 20;
        private $data = [];

        
        // METHODS 
        public function index(){
            $this->displayArchive();
            $this->page;
            $this->view('pages/archive', $this->data);
        }

        public function displayArchive() {
            $displayQuery = $this->archiveModel->displayQuery($this->offset, $this->per_page);
            $this->setCount();
            // Gets archive comics
            $this->data = $this->displayService->displayComicsArchive($displayQuery);
        }

        
        private function setCount(){
            $this->count = ceil(($this->archiveModel->getPageTotal()) / $this->per_page);
        }

        // Sets offset for pager
        public function setOffset() {
            $this->offset = ($this->page - 1) * $this->per_page;
        }

        // Sets current page
        public function setPage($page) {
            $this->page = $page;
        }
    }