<?php 
    session_start();
    
    $logoutOption = false;
    $hashLoginPassword = false;
    
    if (!isset($_COOKIE['Login'])) {
        $_SESSION["errorlogin"] = "U moet eerst inloggen.";
        header("Location: login-form.php");
    }

    if(isset($_POST['submit-login'])) {
        $hashLoginPassword = hash("sha512", $_POST['password']);
        
        if (checkValuesInDB($_POST['gebruiker'], $hashLoginPassword)) {
            $logoutOption = true;
        } elseif (!checkValuesInDB($_POST['gebruiker'], $hashLoginPassword)) {
            $logoutOption = false;
            header("Location: login-form.php");
        }
    }

    if (isset($_COOKIE['Login'])) {
        $CookieValue = explode(',', $_COOKIE['Login']);
        
        if (!checkValuesInDB($CookieValue[0], $CookieValue[1])) {
            unset($_COOKIE['Login']);
            header("Location: login-form.php");
        } elseif(checkValuesInDB($CookieValue[0], $CookieValue[1])) {
            $_SESSION["errorlogin"] = "foute login";
            $logoutOption = true;
        }
    }

    function checkValuesInDB($email, $password) {
        $correctValues   = false;
        
        $connection      = new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );
        
        $emailCheckQuery = 'SELECT hashed_password  FROM `users` WHERE email= :email' ;
        $emailCheck      = $connection->prepare($emailCheckQuery);
        $emailCheck->bindValue(':email', $email);
        $emailCheck->execute();

        $result = array();
        $dataResult = array();
        
        while ($row = $emailCheck->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
            
        $rows = $emailCheck->rowCount();
        
        if ($rows > 0) {
            $array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');
            
            $key   = array_search('green', $array);
            $key   = array_search('red', $array);
            $key   = array_search($password, $result[0]);
            
            if ($key) {
                $correctValues = true;
            }
        }
        
        return $correctValues;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <?php if($logoutOption): ?>
        <form action="login-form.php" method="post">
            <button type="submit" name="uitloggen">Uitloggen</button>
        </form>
    <?php endif ?>
</body>
</html>