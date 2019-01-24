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
    <link rel="stylesheet" type="text/css" href="login.css">

    <title>To Do - Login</title>
</head>
<body>
    <div>
        <div class="login-page">
            <div class="form">

                <?php if ( $message ): ?>
                    <div class="<?= $message["type"] ?>">
                        <?= $message['text'] ?>
                    </div>
                <?php endif ?>

                <?php include ('errors.php'); ?>

                <form method="POST" class="login-form">
                    <div class="form-group mb-2">
                        <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username ?>">
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mb-2 btn-block">Login</button>
                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>