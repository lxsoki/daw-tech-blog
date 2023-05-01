<?php 
    session_start();
    include "dbcon.php";
    if (isset($_POST['registerBtn'])) {
        if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['password']))) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);

            // check if email already exists
            $checkEmailQuery = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
            $checkEmailQueryResult = mysqli_query($conn, $checkEmailQuery);

            if(mysqli_num_rows($checkEmailQueryResult) > 0) {
                $_SESSION['status'] = "Email already exists!";
                header("Location: ../index.php");
                exit(0);
            } else {
                // register the new user
                $registerQuery = "INSERT INTO users (email, password, username) VALUES ('$email', '$password', '$username')";
                $registerQueryResult = mysqli_query($conn, $registerQuery);

                if ($registerQueryResult) {
                    $row = mysqli_fetch_array($registerQueryResult);
                    $_SESSION['authenticated'] = true;
                    $_SESSION['auth_user'] = [
                        'email' => $email,
                        'id' => $row['id'],
                        'username' => $username,
                    ];
                    $_SESSION['status'] = "You are now registered!";
                    header("Location: ../user-page.php");
                    exit(0);
                } else {
                    $_SESSION['status'] = "Email already exists!";
                    header("Location: ../index.php");
                    exit(0);
                }
            }

            // $registerQuery = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            // $register_query_result = mysqli_query($conn, $registerQuery);
        }
    }
