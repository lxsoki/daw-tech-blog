<?php 

session_start();
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = 'You need to login first!';
    header("Location: index.php");
    exit(0);
}
?>