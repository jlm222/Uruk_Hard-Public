<?php session_start() ?>

<?php
    if(isset($_POST['login'])) {

            if ( !isset($_POST['username'], $_POST['user_password']) ) {
                exit('Please fill in both username and password.');
            }

            $username = trim($_POST['username']);
            $password = trim($_POST['user_password']);

            require "../../includes/db.inc.php";

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? ");
            $stmt->execute([$username]);
        }

        $row = $stmt->fetch();
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_role = $row['user_role'];

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
    

    if(password_verify($password, $db_user_password) ) {

        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: ../index.php");
        exit();

    } else {
        header("Location: ../signin.php");
        exit();
    }

?>
