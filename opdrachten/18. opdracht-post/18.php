<?php
    $username	=	'stijn';
	$password 	=	'azerty';
	$message	=	'Gelieve in te loggen';

	if (isset($_POST['submit']))
	{
		if ($_POST['username'] == $username && $_POST['password'] == $password)
		{
			$message = 'Welkom';
		}
		else
		{
			$message = 'Er ging iets mis tijdens het inloggen. Probeer opnieuw.';
		}
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
    <h1>Log in</h1>
    <p><?php echo $message ?></p>

    <form action="18.php" method="POST">
		
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="stijn">
			</li>
			<li>
				<label for="password">Pasword:</label>
				<input type="password" name="password" id="password" value="azerty">
			</li>
		</ul>

		<input type="submit" name="submit" value="Send">

	</form>
</body>
</html>