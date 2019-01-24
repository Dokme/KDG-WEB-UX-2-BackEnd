<?php
    $isValid = false;
    $message = getMessage();

    try {
        if (isset($_POST['submit'])) {
            if (isset($_POST['code'])) {
                if (strlen($_POST['code']) !== 8) {
                    throw new Exception ('VALIDATION-CODE-LENGTH');
                } else {
                    $isValid = true;
                }
            } else {
                throw new Exception('SUBMIT-ERROR');
            }

        }
        
    } catch (Exception $e) {
        $messageCode    = $e->getMessage();
        $message        = array();
        $createMessage  = false;

        switch ($messageCode) {
			case 'SUBMIT-ERROR':
				$message['type'] = 'error';
				$message['text'] = 'Er werd met het formulier geknoeid';
				break;

			case 'VALIDATION-CODE-LENGTH':
				$message['type'] = 'error';
				$message['text'] = 'De kortingscode heeft niet de juiste lengte';
				$createMessage	 = true;
				break;
        }
        
        if ($createMessage) {
			createMessage($message);
		}

		logToFile($message);
    }

    function getMessage() {
		$message	= FALSE;

		if (isset($_SESSION['message'])) {
			$message = $_SESSION['message'];
			unset( $_SESSION['message']);
		}

		return $message;
    }

    function createMessage($message) {
		$_SESSION['message'] = $message;
	}
    
    function logToFile($message) {
		$date           = '[' . date('H:i:s', time()) . ' ' . date('d:m:Y', time()) . ']';
		$ip             = $_SERVER['REMOTE_ADDR'];
		$errorString	= $date . ' - ' . $ip . ' - type:[' . $message['type'] . '] ' . $message['text'] . "\n\r";

		file_put_contents('log.txt', $errorString, FILE_APPEND);
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
		<h2>Vul uw kortingscode in</h2>
		<?php if ($message): ?>
			<div class="<?= $message['type'] ?>"><?= $message['text']?></div>	
		<?php endif ?>
        <?php if (!$isValid): ?>
            <form action="27.php" method="POST">
                <label for="korting">Kortingscode</label>
                <input type="text" name="code" id="code">
                <input type="submit" name="submit" value='sumbit'>
            </form>
        <?php else: ?>
			<p>Korting toegekend!</p>
		<?php endif ?>
</body>
</html>