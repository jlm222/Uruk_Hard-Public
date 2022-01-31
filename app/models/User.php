<?php

class User 
{
    private $db;
    
    public function __construct($db) 
    {
        $this->db = $db;
    }

    // Login User
    public function login($username, $password)
    {
        $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->fetchRow();

        if(!$row) {
            return false;
        } 

        if(!password_verify($password, $row['user_password'])){
            return false;
        } 
        
        return $row;
    }
}