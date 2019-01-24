<?php
    session_start();

    $hashed         = false;
    $randomPassword = false;

    if (isset($_POST['genereer'])) {
        $randomPassword                     = generatePassword();
        $_SESSION['registreer']['email']    = $_POST['email'];
        $_SESSION['registreer']['password'] = $randomPassword ;

        header("Location: registratie-form.php");
    }

    if (isset($_POST['registreer'])) {
        $_SESSION['registreer']['email']    = $_POST['email'];
        $_SESSION['registreer']['password'] = $_POST['password'];
    
        if (!filter_var($_SESSION['registreer']['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Onjuist e-mailadres.";
            header("Location: registratie-form.php");
        } else {
            checkForEmailInDB($_SESSION['registreer']['email']);
        }  
    }

    function checkForEmailInDB($email) {
        $connection	= new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');

        $emailCheckQuery = 'SELECT email FROM users WHERE email = :email';
        $emailCheck = $connection->prepare($emailCheckQuery);

        $emailCheck->bindValue(':email', $email);
        $emailCheck->execute();

        $rows = $emailCheck->rowCount();
        
        if ($rows > 0) {
            $_SESSION['error']['gebruikt'] = "gebruikt";
            header("Location: registratie-form.php");
        } else {
            insertInfoInDB($email);
        }
    }

    function insertInfoInDB($email) {
        $salt            = uniqid(mt_rand(), true);
        $saltPassword    = $salt . $_SESSION['registreer']['email'];

        $hashed = hash("sha512", $_POST['password']);

        $connection	     = new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
        $insertQuery     = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet) VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )';
        $emailCheckQuery = 'INSERT INTO `users`(`email`, `salt`, `hashed_password`,`last_login_time` ) VALUES (:email, :salt, :hashedpassword, NOW())';

        $emailCheck      = $connection->prepare($emailCheckQuery);
        
        $emailCheck->bindValue(':email', $email);
        $emailCheck->bindValue(':salt', $salt);
        $emailCheck->bindValue(':hashedpassword', $hashed);

        $emailCheck->execute();     
    
        $cookieSalt      = uniqid(mt_rand(), true);
        $cookieConcat    = $email . $salt;
        $CookieEmailHash = hash("sha512", $cookieConcat );
        
        $CookieValue     = $email . ',' . $hashed;

        setcookie('Login', $CookieValue, time() + (86400 * 30));
        header("Location: dashboard.php");
    }

    function generatePassword() {
        $paswordLength = 8;  
        $alphabet      = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass          = array();
        $alphaLength   = strlen($alphabet) - 1;
        
        for ($i = 0; $i < $paswordLength; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }

        return implode($pass);
    }
?>