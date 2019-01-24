<?php 
    session_start();

    $message = false;

    if(isset($_SESSION["errorlogin"])) {
        $message = $_SESSION["errorlogin"];
    }
    
    if (isset($_POST['uitloggen'])) {
        unset($_COOKIE['login']);
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .error {
            background-color: red;
        }
    </style>
</head>
<body>
    <?php if ($message): ?>
        <p class="error"> <?= $message ?> </p>
    <?php endif ?>
    
    <form action="dashboard.php" method="POST">
        <li>
            <label for="e-mail">e-mail</label>
            <input type="e-mail" name="e-mail">
        </li>   
        <li>
            <label for="password">paswoord</label>
            <input type="text" name="password">
        </li>
        <button type="submit" name="submit-login">Inloggen</button>
    </form>
    <p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a>.</p>
</body>
</html>