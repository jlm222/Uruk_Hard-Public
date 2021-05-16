<?php
    class Posts extends Controller {
        public function __construct(){
            parent::__construct();
            $this->postModel = $this->model('Post', $this->dbh);
            $this->imageService = $this->service('ImageService');
        }

        public function addPost(){
            if(!($_SERVER['REQUEST_METHOD'] == 'POST') && !isset($_POST['submit'])) {
                redirect('pages/error');
            }

            $postArr = filter_var_array([
                'post_image' => $_FILES['images']['name'][0],
                'post_secret_image' => $_FILES['images']['name'][1],
                'post_title'  => $_POST['post_title'], 
                'post_date'   => $_POST['post_date'], 
                'post_status'  => $_POST['post_status'], 
                'post_alt_text'  => $_POST['post_alt_text'], 
                'post_hover_text' => $_POST['post_hover_text'] 
                ], 
                FILTER_SANITIZE_STRING
            );

            [$oldImageName, $oldSecretImageName] = [$postArr['post_image'], $postArr['post_secret_image']];
            
            // Saves filenames as .jpg in database, as uploaded images are converted to jpg before saving             
            $postArr['post_image'] = $this->changeFileExtToJpg($postArr['post_image']);
            if(!empty($postArr['post_secret_image'])) {
                $postArr['post_secret_image'] = $this->changeFileExtToJpg($postArr['post_secret_image']);
            }
            // Adds post to database
            $this->postModel->addPostQuery($postArr);

            // Gets last inserted post ID
            $post_id = $this->postModel->getPostID();

            // Creates folder, converts images, creates thumbnail
            $this->imageService->convertPostImage($post_id, $postArr['post_image'], $_FILES['images']['tmp_name'][0]);
            
            if(!empty($postArr['post_secret_image'])) {
                $this->imageService->convertSecretImage($post_id, $postArr['post_secret_image'], $_FILES['images']['tmp_name'][1]);
            } 

            unset($this->imageService);

            // Redirect to same page with success message
            redirect("admin/addPost/$post_id");
            
            // Redirects to same page with success message
            // $postSuccessRedirect = URLROOT . "/admin/addPost/$post_id";

            // echo "<script type='text/JavaScript'>
            // console.log('TESTESTESTSET');
            // window.location.replace('$postSuccessRedirect');
            // </script>";
        }

        public function editPost(){
            if(!($_SERVER['REQUEST_METHOD'] == 'POST') && !isset($_POST['submit'])) {
                return redirect('pages/error');
            }

            // Sanitizes POST data
            $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
            $postArr = filter_var_array([
                'post_title'  => $_POST['post_title'], 
                'post_image' => $_FILES['images']['name'][0],
                'post_secret_image' => $_FILES['images']['name'][1],
                'post_date'   => $_POST['post_date'], 
                'post_status'  => $_POST['post_status'], 
                'post_alt_text'  => $_POST['post_alt_text'], 
                'post_hover_text' => $_POST['post_hover_text'],
                'old_image' => $_POST['old_image'],
                'old_secret_image' => $_POST['old_secret_image']
                ], 
                FILTER_SANITIZE_STRING
            );
            // Formats date
            $post_date = date("Y-m-d H:i:s", strtotime($postArr['post_date']));
            // Sets remaining variables
            $postArr['post_date'] = $post_date;
            $postArr['post_id'] = $post_id;
                   
            
            
            
            if(!empty($postArr['post_image'])) {
                $postArr['post_image'] = $this->changeFileExtToJpg($postArr['post_image']);
                $this->imageService->convertPostImage($post_id, $postArr['post_image'], $_FILES['images']['tmp_name'][0]);
            } else {
                // Uses old image if no new image uploaded
                $postArr['post_image'] = $postArr['old_image'];
            }
            
            if(!empty($postArr['post_secret_image'])) {
                $postArr['post_secret_image'] = $this->changeFileExtToJpg($postArr['post_secret_image']);
                $this->imageService->convertSecretImage($post_id, $postArr['post_secret_image'], $_FILES['images']['tmp_name'][1]);
            } else {
                // Uses old image if no new image uploaded
                $postArr['post_secret_image'] = $postArr['old_secret_image'];
            }

            // Adds post to database
            $this->postModel->editPostQuery($postArr);

            // Redirect to same page with success message
            redirect("admin/editPost/{$postArr['post_id']}/success");
        }
        

        public function post(){
            if(!($_SERVER['REQUEST_METHOD'] == 'POST')) {
                redirect('admin');
            }

            if(isset($_POST['checkBoxArray'])) {
                foreach ($_POST['checkBoxArray'] as $post_id) {
                    $option = $_POST['option'];

                    switch($option) {
                        case 'published':
                            $this->postModel->postPublish($post_id);
                            break;
                        case 'draft':
                            $this->postModel->postDraft($post_id);
                            break;
                        case 'delete':
                            $this->postModel->postDelete($post_id);
                            $this->rrmdir("images/comics/{$post_id}/");
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

            redirect("admin");
        }

        public function deletePost($post_id){
            // Deletes post from database
            $this->postModel->postDelete($post_id);
            $this->rrmdir("images/comics/{$post_id}/");
            redirect("admin");
        } 

        public function changeFileExtToJpg($filename){
            return substr_replace($filename, "jpg", strrpos($filename, '.') + 1);
        }

        // Recursively deletes files/folders
        public function rrmdir($src) {
            $dir = opendir($src);
            while(false !== ( $file = readdir($dir)) ) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    $full = $src . '/' . $file;
                    if ( is_dir($full) ) {
                        $this->rrmdir($full);
                    }
                    else {
                        unlink($full);
                    }
                }
            }
            closedir($dir);
            rmdir($src);
        }
    }