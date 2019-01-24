<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="./resources/style.css">
</head>
<body>
    <form action="" method="POST">
        <?php
            if (isset($msg)) {
                echo '<div class="alert">';
                echo $msg;
                echo '</div>';
            }
        ?>
        <h1>Please sign in</h1>
        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" name="email" placeholder="Email address" required>
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" placeholder="Password" required>
        <button type="submit" name"submit"> Sign in</button>
    </form>
</body>
</html>