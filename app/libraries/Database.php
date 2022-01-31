<?php

/*
PDO Database Class
Connect to database
Create prepared statements
Bind values
Return rows and results
*/
class Database 
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $charset = CHARSET;
    
    protected $pdo;
    protected $stmt;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ";charset=" . $this->charset;
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        // Create PDO instance
        try {
            $this->pdo = new \PDO($dsn, $this->user, $this->pass, $options);
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}