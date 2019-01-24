<?php

	session_start();

	function __autoload($classname) {
		require_once($classname . '.php');
	}

	if (isset($_POST['submit'])) {
		$email		                        =	$_POST['email'];
		$password	                        =	$_POST['password'];

		$_SESSION['login']['email']		    =	$email;
		$_SESSION['login']['password']      =	$password;

		$isEmail	                        =	filter_var($email, FILTER_VALIDATE_EMAIL);

		if (!$isEmail) {
			$emailError = new Message( "error", "Geen geldig e-mailadres."); 
			
			header('location: login-form.php');
        } 
        
        if ($password == '') {
			new Message( "error", "Geen geldig paswoord."); 
			
			header('location: login-form.php');
		} else {
			$connection	= new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');

			$db         = new Database($connection);

			$userData	= $db->query('SELECT * FROM users WHERE email = :email', array(':email' => $email));

			if (isset($userData['data'][0])) {
				var_dump($_POST);
				var_dump($userData['data'][0]);
				
				$salt 		         = $userData['data'][0]['salt'];
				$passwordDb          = $userData['data'][0]['password'];

				$newlyHashedPassword = hash('sha512', $salt . $password);

				if ($newlyHashedPassword == $passwordDb) {
					$loginUser = User::createCookie($salt, $email);

					if ($loginUser) {
						$registrationSuccess = new Message("success", "U bent ingelogd.");
						header('location: dashboard.php');
					}
				} else {
					$userExistsMessage = new Message('error', 'Fout, probeer opnieuw.');
					header('location: login-form.php');
				}
			} else {
				$userExistsMessage = new Message('error', 'Fout, probeer opnieuw.');
				header('location: login-form.php');
			}
		}
	}
?>