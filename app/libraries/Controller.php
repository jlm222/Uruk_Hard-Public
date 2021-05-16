<?php
    /*
    Base Controller
    Loads the models and views
    */
    class Controller {
        protected $dbh;

        // Load dbh model
        protected function __construct(){
            $this->dbh = $this->model('Dbh');
        }

        // Load model
        public function model($model, $connection = null) {
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // Instantiate model
            return new $model($connection);
        }

        // Load view
        public function view($view, $data = []) {
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                // View does not exist
                exit('View does not exist');
            }
        }

        // Load service
        public function service($service) {
            // Check for view file
            if(file_exists('../app/services/' . $service . '.php')) {
                require_once '../app/services/' . $service . '.php';
                 // Instantiate service
                return new $service();
            } else {
                // Service does not exist
                exit('Service does not exist');
            }
        }
    }