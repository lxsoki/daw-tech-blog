<?php

    session_start();
    unset($_SESSION['authenticated']);
    unset($_SESSION['auth_user']);
    $_SESSION['status'] = "You are now logged out!";
    header("Location: ../index.php");

?>