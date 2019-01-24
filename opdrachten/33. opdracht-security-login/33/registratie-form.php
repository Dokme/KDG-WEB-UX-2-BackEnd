<?php
    session_start();
    
    $email      = '';
    $password   = '';
    $message    = false;
    $wrong      = false;
    $usedEmail  = false;
    
    if (isset($_SESSION['registreer'])) {
        $email      = $_SESSION['registreer']['email'];
        $password   = $_SESSION['registreer']['password'];
    }

    if (isset($_SESSION['error'])) {
        $wrong = true;
    }

    if (isset($_SESSION['error']['email'])) {
        $usedEmail = true;
        $message   =$_SESSION['error']['email'];
    }

    if (isset($_SESSION['error']['gebruikt'])) {
        $usedEmail = true;
        $message   = $_SESSION['error']['gebruikt'];
        echo $message;
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
        .wrong {
            background-color: red;
        }
    </style>
</head>
<body>
    <form action="registratie-process.php" method="POST">
        <?php if ($message): ?>
            <div class="<?= $message["type"] ?>">
                <?= $message['text'] ?>
            </div>
        <?php endif ?>

        <li>
            <label for="email" class= " <?= ($wrong)? "wrong": '' ?>">e-mail</label>
            <input type="text" name="email" value="<?= $email ?>" >
        </li>
        <li>
            <label for="password">paswoord</label>
            <input type="text" name="password" value="<?=$password ?>">
        </li>
        <button type="submit" name="genereer" value="genereer">Genereer een paswoord</button>
        <li>
            <button type="submit" name="registreer" value="hallo">Registreer</button>
        </li>
    </form>
</body>
</html>