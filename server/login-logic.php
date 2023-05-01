<?php 
session_start();
include "dbcon.php";
    if (isset($_POST['loginBtn'])) {
        if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
            $login_query_result = mysqli_query($conn, $login_query);

            if (mysqli_num_rows($login_query_result) > 0) {
                $row = mysqli_fetch_array($login_query_result);
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'email' => $row['email']
                ];
                $_SESSION['status'] = "You are now logged in!";
                header("Location: ../user-page.php");
                exit(0);

            } else {
                $_SESSION['status'] = "Invalid Email or Password!";
                header("Location: ../index.php");
                exit(0);
            }


        } else {
            $_SESSION['status'] = "All fields are mandatory!";
            header("Location: ../index.php");
            exit(0);
        }
    }

?>