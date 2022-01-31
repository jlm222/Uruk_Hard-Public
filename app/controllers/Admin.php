<?php

class Admin extends Controller 
{
    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('pages/login');
        }
        parent::__construct();
        $this->postModel = $this->model('Post', $this->dbh);
        $this->comicModel = $this->model('Comic', $this->dbh);
        $this->displayService = $this->service('DisplayService');
    }

    public function index()
    {
        $comicResultSet = $this->comicModel->adminDisplay();
        $data = $this->displayService->displayComicsAdmin($comicResultSet);
        $this->view('admin/index', $data);
    }

    public function addPost($post_id = [])
    {
        $data = ['post_id' => $post_id];
        $this->view('admin/add_post', $data);
    }

    public function editPost($post_id, $success = '')
    {
        $row = $this->postModel->getPost($post_id);
        $data = [
            'post_id' => $row['post_id'],
            'post_title' => $row['post_title'],
            'post_image' => $row['post_image'],
            'post_secret_image' => $row['post_secret_image'],
            'post_date' => $row['post_date'],
            'post_status' => $row['post_status'],
            'post_alt_text' => $row['post_alt_text'],
            'post_hover_text' => $row['post_hover_text'],
            'success' => $success
        ];
        $this->view('admin/edit_post', $data);
    }

    public function deletePost($post_id)
    {
        $row = $this->postModel->getPost($post_id);
        $data = [
            'post_id' => $row['post_id'],
            'post_title' => $row['post_title'],
            'post_image' => $row['post_image'],
        ];
        $this->view('admin/delete', $data);
    }
}
