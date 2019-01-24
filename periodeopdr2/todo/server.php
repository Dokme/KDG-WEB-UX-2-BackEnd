<?php
    $isAuth = false;
    $message = false;
    $username = "";
    $email = "";
    $password = "";
    $password_1 = "";
    $password_2 = "";
    $arrayErrors = array();

    try {
        //connect to db
        $db = mysqli_connect('localhost', 'root', '', 'todo');

        //if registration proc
        if (isset($_POST['register'])) {
            $username   = $_POST['username'];
            $email      = $_POST['email'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];

            //no empty fields
            if (empty($username)) {
                array_push($arrayErrors, "Username is required.");
            }
            if (empty($email)) {
                array_push($arrayErrors, "Email is required.");
            }
            if (empty($password_1)) {
                array_push($arrayErrors, "Password is required.");
            }
            if (empty($password_2)) {
                array_push($arrayErrors, "Password confirmation is required.");
            }
            if ($password_1 != $password_2) {
                array_push($arrayErrors, "Passwords don't match.");
            }

            //if no errors, save data
            if (count($arrayErrors) == 0) {
                //$password = md5($password_1); 
                mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_1')");
                $_SESSION['username'] = $username;
                setcookie('authenticated', true, time() + 360);
                $isAuth     = true;
                
                header('location: index.php');
            }
        }

        //login from loginpage
        if (isset($_POST['login'])) {
            $username   = $_POST['username'];
            $password = $_POST['password'];
            
            if (empty($username)) {
                array_push($arrayErrors, "Username is required.");
            }
            if (empty($password)) {
                array_push($arrayErrors, "Password is required.");
            }

            if (count($arrayErrors) == 0) {
                //$password = md5($password);
                $result = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $username;
                    setcookie('authenticated', true, time() + 360);
                    $isAuth = true;
                    header('location: index.php');
                } else {
                    array_push($arrayErrors, "Wrong username/password combination.");
                }
            }
        }

        //logout
        if (isset($_GET['logout'])) {
            session_destroy();
            setcookie( 'authenticated', false, time() - 360);
            $isAuth  = false;
            unset($_SESSION['username']);
            header('location: login.php');
        }

        

    } catch (PDOException $e) {
        $message['type'] = "error";
        $message['text'] = "Fout opgetreden. Waarschijnlijk is de connectie met de database mislukt.";
    }
?>