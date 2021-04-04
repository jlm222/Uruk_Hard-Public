<?php 
    class Users extends Controller {
        public function __construct(){
            parent::__construct();
            $this->userModel = $this->model('User', $this->dbh);
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {              
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'username' => trim($_POST['username']), 
                    'password' => trim($_POST['password']), 
                    'username_err' => '', 
                    'password_err' => '', 
                    'err' => ''
                ];

                // Validate Email
                if(empty($data['username'])) {
                    $data['username_err'] = 'Please enter username';
                }
                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Make sure errors are empty
                if(empty($data['username_err']) && empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                    if($loggedInUser) {
                        // Create Session
                        $this->createUserSession($loggedInUser);
                        redirect('admin');
                    } else {
                        $data['err'] = 'Incorrect username/password, please try again.';
                        $this->loadLoginWithData($data);
                    }
                } else {
                    // Load view with errors
                    $this->loadLoginWithData($data);
                }
            } else {
                // Init Data
                $data = [
                    'email' => '', 
                    'password' => '', 
                    'email_err' => '', 
                    'password_err' => '', 
                ];

                // Load view
                $this->loadLoginWithData($data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_role'] = $user['user_role'];
            $_SESSION['username'] = $user['username'];
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_role']);
            unset($_SESSION['username']);
            session_destroy();
            redirect('admin/login');
        }

        // Reloads the login page with error data
        public function loadLoginWithData($data){
            return $this->view('admin/login', $data);
        }
    }