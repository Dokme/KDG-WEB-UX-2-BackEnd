<?php
    $userInfoFile = file_get_contents('userinfo.txt');
    $userData	 = explode(',', $userInfoFile);

    $message = false;
    $isAuth  = false;

    if (!isset($_COOKIE['authenticated'])) {
        if (isset($_POST['submit'])) {
            if ($_POST['username'] == $userData[0] && $_POST['password'] == $userData[1]) {
                setcookie('authenticated', true, time() + 360);
                $isAuth     = true;
            } else {
				$message    = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
			}
        }
    } else {
		$message    = 'U bent ingelogd.';
		$isAuth     = true;
    }
    
    if (isset($_GET['logout'])) {
        setcookie( 'authenticated', false, time() - 360);
        $isAuth  = false;
        $message = false;
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
    <?php if (!$isAuth): ?>
        <h1>Inloggen</h1>
    <?php else: ?>
        <h1>Dashboard</h1>
    <?php endif ?>

    <?php if ($message): ?>
		<?=	$message ?>
	<?php endif ?>

    <?php if (!$isAuth): ?>
        <form action="22-1.php" method="POST">
            <ul>
                <li>
                    <label for="username">gebruikersnaam </label>
                    <input type="username" name="username" id="username" placeholder="gebruikersnaam">
                </li>
                <li>
                    <label for="password">paswoord</label>
                    <input type="password" name="password" id="password" placeholder="paswoord">
                </li>
            </ul>
            <input type="submit" value="Submit" name="submit">
        </form>
    <?php else: ?>
        <a href="22-1.php?logout=true">Uitloggen</a>
	<?php endif ?>
</body>
</html>