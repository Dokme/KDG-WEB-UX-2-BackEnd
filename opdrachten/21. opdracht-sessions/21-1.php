<?php
	session_start();

	$email		    =	( isset( $_SESSION['deel1']['email'] ) ) ? $_SESSION['deel1'] ['email'] : '';
    $nickname		=	( isset( $_SESSION['deel1']['nickname'] ) ) ? $_SESSION['deel1'] ['nickname'] : '';
    
    if ( isset( $_GET['session'] ) )
    {
        if ( $_GET['session']  == 'destroy' )
        {
            session_destroy( );
            header( 'location: 21-1.php' );
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
    <h1>Deel 1: registratiegegevens</h1>

    <a href="21-1.php?session=destroy">Vernietig sessie</a>

    <form action="21-2.php" method="POST">
        <ul>
            <li>
                <label for="email">email</label>
                <input type="email" name="email" id="email" value="<?= $email?>" placeholder="email" <?= ( isset    ($_GET['focus'])    &&      ($_GET['focus'] == "email")      ) ? 'autofocus' : '' ?>>
            </li>
            <li>
                <label for="nickname">nickname</label>
                <input type="text" name="nickname" id="nickname" value="<?= $nickname?>" placeholder="nickname" <?= ( isset    ($_GET['focus'])    &&      ($_GET['focus'] == "nickname")      ) ? 'autofocus' : '' ?>>
            </li>
        </ul>
        <input type="submit" value="Volgende" name="submit">
    </form>
</body>
</html>