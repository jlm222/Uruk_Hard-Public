<?php

class Pages extends Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->comicModel = $this->model('Comic', $this->dbh);
        $this->navModel = $this->model('Nav', $this->dbh);
    }

    public function index()
    {
        // Gets latest comic data
        $comic = $this->comicModel->getComicQuery('index');

        // Gets nav data for navbar
        $navData = [
            'nav_first' => URLROOT . 'pages/first',
            'nav_prev' => $this->navModel->getPrevIdForIndexComic(),
            'nav_next' => '',
            'nav_latest' => ''
        ];
        $comicData = $this->setComicData($comic);

        // Merges comic and nav data
        $data = $comicData + $navData;
        $this->view('pages/index', $data);
    }

    public function comic($post_id)
    {
        // Gets current comic data
        $comicCurrent = $this->comicModel->getComicQuery($post_id);
        $comicFirst = $this->comicModel->getComicQuery('first');
        $comicLatest = $this->comicModel->getComicQuery('index');

        // Redirects to first/index page if comic is first/latest
        if($comicCurrent['post_id'] === $comicFirst['post_id']) redirect('pages/first');
        if($comicCurrent['post_id'] === $comicLatest['post_id']) redirect('');
        
        if($post_id < $comicFirst['post_id'] || $post_id > $comicLatest['post_id']) 
        redirect('pages/error');  
        
        // Gets nav data for navbar
        $navData = [
            'nav_first' => URLROOT . 'pages/first',
            'nav_prev' => $this->navModel->comicPrevQuery($post_id),
            'nav_next' => $this->navModel->comicNextQuery($post_id),
            'nav_latest' => URLROOT
        ];
        $comicData = $this->setComicData($comicCurrent);

        // Merges comic and nav data
        $data = $comicData + $navData;
        $this->view('pages/comic', $data);
    }

    public function first()
    {
        // Gets first comic
        $comic = $this->comicModel->getComicQuery('first');

        // Gets nav data for navbar
        $navData = [
            'nav_first' => '',
            'nav_prev' => '',
            'nav_next' => $this->navModel->getNextIdForFirstComic(),
            'nav_latest' => URLROOT
        ];
        $comicData = $this->setComicData($comic);

        // Merges comic and nav data
        $data = $comicData + $navData;
        $this->view('pages/first', $data);
    }

    public function login()
    {
        // Initialises required variables as empty
        $data = [
            'username' => '',
            'password' => ''
        ];
        $this->view('admin/login', $data);
    }

    // Sets Comic Display Data
    private function setComicData($comic)
    {
        return [
            'post_id' => $comic['post_id'], 
            'post_image' => $comic['post_image'], 
            'post_secret_image' => $comic['post_secret_image'], 
            'post_alt_text' => $comic['post_alt_text'], 
            'post_hover_text' => $comic['post_hover_text'], 
            'post_title' => $comic['post_title'], 
            'post_date' => $this->formatDate($comic['post_date']),
            'jpg_link' => COMICFOLDER . "{$comic['post_id']}/{$comic['post_image']}",
            'webp_link' => COMICFOLDER . "{$comic['post_id']}/" . substr_replace($comic['post_image'], 'webp', strpos($comic['post_image'], '.') + 1),
            'jpg_secret_link' => COMICFOLDER . "{$comic['post_id']}/{$comic['post_secret_image']}",
            'webp_secret_link' => COMICFOLDER . "{$comic['post_id']}/" . substr_replace($comic['post_secret_image'], 'webp', strpos($comic['post_secret_image'], '.') + 1),
        ];
    }

    // Reformats Date for display
    private function formatDate($post_date)
    {
        $post_date = new DateTime($post_date);
        return $post_date = $post_date->format("F d, Y");
    }

    public function error()
    {
        $this->view('pages/404');
    }
}