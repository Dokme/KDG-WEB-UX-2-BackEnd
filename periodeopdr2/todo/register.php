<?php
    include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="register.css">

    <title>To Do - Login</title>
</head>
<body>
    <div>
        <div class="login-page">
            <div class="form">

                <?php if ($message): ?>
                    <div class="<?= $message["type"] ?>">
                        <?= $message['text'] ?>
                    </div>
                <?php endif ?>

                <?php include ('errors.php'); ?>

                <form method="POST" class="register-form">
                    <div class="form-group mb-2">
                        <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username ?>">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email ?>">
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="password_1" class="form-control" placeholder="password">
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="password_2" class="form-control" placeholder="confirm password">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary mb-8 btn-block">Register</button>
                    <p class="message">Already registered? <a href="login.php">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>