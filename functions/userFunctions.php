<?php

function existsActiveUserSession() 
{
    return session_status() === 2;
}

function existsLoggedUser()
{

    return isset($_SESSION['loggedUser']) && isset($_SESSION['loggedUserRole']);
}

function logUserOut()
{
    if (existsLoggedUser()) {
        $loggedUser = $_SESSION['loggedUserName'];
        
        unset($_SESSION['loggedUser']);
        unset($_SESSION['loggedUserRole']);

        if(existsLoggedUser()) {
            echo "Failed to log out user: $loggedUser";
        } else {
            echo "Successfully logget user out" . "<br>" . $loggedUser;
        }
    } else {
        echo "No user to log out!"  . "<br>";
    }
}

function showLoggedUser() 
{    
    if(existsLoggedUser()) {
        echo "Logged in user" . "<br>"
            . "UserName: " . $_SESSION['loggedUserName']
            . " Role: " . $_SESSION['loggedUserRole']  . "<br>" . "<br>";
    } else {
        echo "No logged in user!"  . "<br>" . "<br>";
    }
}
?>