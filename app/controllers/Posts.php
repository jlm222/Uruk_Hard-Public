<?php
    class Posts extends Controller {
        public function __construct(){
            parent::__construct();
            $this->postModel = $this->model('Post', $this->dbh);
            $this->imageService = $this->service('ImageService');
        }

        public function addPost(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_POST['submit'])) {
                    $postArr = filter_var_array([
                        'post_image' => $_FILES['image']['name'],
                        'post_title'  => $_POST['post_title'], 
                        'post_date'   => $_POST['post_date'], 
                        'post_status'  => $_POST['post_status'], 
                        'post_alt_text'  => $_POST['post_alt_text'], 
                        'post_hover_text' => $_POST['post_hover_text'] 
                        ], 
                        FILTER_SANITIZE_STRING
                    );
                    // Format date/time
                    $post_date = date("Y-m-d H:i:s", strtotime($postArr['post_date']));
                    // Adds post to database
                    $this->postModel->addPostQuery($postArr);
                    // Gets last inserted post ID
                    $post_id = $this->postModel->getPostID();
                    // Create folder, move image, create thumbnail
                    $this->imageService->logicImage($post_id, $postArr['post_image'], $_FILES['image']['tmp_name']);
                    // Redirect to same page with success message
                    redirect("admin/addPost/{$post_id}/success");
                } else {
                    redirect('pages/error');
                }
            }
        }

        public function editPost(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_POST['submit'])) {
                    // Sanitize POST data
                    $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
                    $postArr = filter_var_array([
                        'post_title'  => $_POST['post_title'], 
                        'post_image' => $_FILES['image']['name'],
                        'post_date'   => $_POST['post_date'], 
                        'post_status'  => $_POST['post_status'], 
                        'post_alt_text'  => $_POST['post_alt_text'], 
                        'post_hover_text' => $_POST['post_hover_text'],
                        'old_image' => $_POST['old_image']
                        ], 
                        FILTER_SANITIZE_STRING
                    );
                    // Format date
                    $post_date = date("Y-m-d H:i:s", strtotime($postArr['post_date']));
                    // Set remaining variables
                    $postArr['post_date'] = $post_date;
                    $postArr['post_id'] = $post_id;
                    // If no new image uploaded, uses old image
                    if(empty($postArr['post_image'])) {
                        $postArr['post_image'] = $postArr['old_image'];
                    } else {
                        // Create folder, move image, create thumbnail
                        $this->imageService->logicImage($post_id, $postArr['post_image'], $_FILES['image']['tmp_name']);
                    }
                    // Adds post to database
                    $this->postModel->editPostQuery($postArr);
                    // Redirect to same page with success message
                    redirect("admin/editPost/{$postArr['post_id']}/success");
                } else {
                    redirect('pages/error');
                }
            }
        }

        public function post(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['checkBoxArray'])) {
                    foreach ($_POST['checkBoxArray'] as $postId) {
                        $option = $_POST['option'];

                        switch($option) {
                            case 'published':
                                $this->postModel->postPublish($postId);
                                break;
                            case 'draft':
                                $this->postModel->postDraft($postId);
                                break;
                            case 'delete':
                                $this->postModel->postDelete($postId);
                                break;
                        }
                    }
                }
                elseif (isset($_POST['id'])) {
                    $post_id = trim($_POST['id']);
                        if (isset($_POST['published'])) {   
                            $this->postModel->postPublish($post_id);
                        } elseif (isset($_POST['draft'])) {
                            $this->postModel->postDraft($post_id);
                        }
                }
                redirect('admin');
            }
        }

        public function deletePost($post_id){
            // Delete post from database
            $this->postModel->postDelete($post_id);
            redirect("admin");
        } 
    }