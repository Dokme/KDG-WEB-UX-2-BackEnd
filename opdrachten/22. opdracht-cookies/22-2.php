<?php
    $userInfoFile = file_get_contents('userinfo.txt');
    $userData	  = JSON_decode( $userInfoFile, true );

    $message = false;
    $isAuth  = false;

    if (isset($_POST['submit'])) {
		foreach ($userData as $id => $user) {
			if ($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']) {
				$cookieTime	= (isset($_POST['rememberMe']) ? (time() + 60*60*24*30) : time() + 3600);
                setcookie('authenticated', $id, $cookieTime);
                $isAuth     = true;
				break;
			} else {
                $isAuth     = false;
				$message    = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
			}
		}	
	}

	if (isset($_COOKIE['authenticated'])) {
		$userId		= $_COOKIE['authenticated'];
		$message    = 'Hallo ' . $userData[$userId]['username'] . ', fijn dat je er weer bij bent!';
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
        <form action="22-2.php" method="POST">
            <ul>
                <li>
                    <label for="username">gebruikersnaam </label>
                    <input type="username" name="username" id="username" placeholder="gebruikersnaam">
                </li>
                <li>
                    <label for="password">paswoord</label>
                    <input type="password" name="password" id="password" placeholder="paswoord">
                </li>
                <li>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Mij onthouden</label>
                </li>
            </ul>
            <input type="submit" value="Submit" name="submit">
        </form>
    <?php else: ?>
        <br>
        <br>
        <a href="22-2.php?logout=true">Uitloggen</a>
	<?php endif ?>
</body>
</html>