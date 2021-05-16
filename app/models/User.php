<?php
    class User {
        private $db;
        
        public function __construct($db) {
            $this->db = $db;
        }

        // Login User
        public function login($username, $password){
            $this->db->prepare('SELECT * FROM users WHERE username = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->fetchRow();

            if(!$row) {
                return false;
            } else {
                $hashed_password = $row['user_password'];
                if(password_verify($password, $hashed_password)){
                    return $row;
                } else {
                    return false;
                }
            }
        }

        // Find user by username
        public function findUserByUsername($username){
            $this->db->prepare('SELECT * FROM users WHERE username = :username');
            // Bind value
            $this->db->bind(':username', $username);

            $row = $this->db->fetchColumn();

            // Check row
            if($row) {
                return true;
            } else {
                return false;
            }
        }

    }