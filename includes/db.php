<?php
    // When deployed to website, below must be uncommented for secure access to database credentials
    // require_once "/home/u787774305/domains/urukhardplayhard.com/external_includes/config.ini";

    // Local server settings
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'uruk');
    define('CHARSET', 'utf8mb4');
    
    $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=" . CHARSET;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try{
        $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(\PDOException $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
?>
