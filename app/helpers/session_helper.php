<?php

session_start();

function isLoggedIn()
{
    if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['user_role'], )){
        return true;
    } else {
        return false;
    }
}


