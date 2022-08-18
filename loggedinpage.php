<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
        echo "<p>Logged In! <a href='signup.php?logout=1'>Log out</a></p>";
        
    } else {
        
        header("Location: signup.php");
        
    }

?>