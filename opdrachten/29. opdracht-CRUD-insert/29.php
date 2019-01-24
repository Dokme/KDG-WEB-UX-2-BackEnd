<?php
    $message = false;

    if (isset($_POST['submit'])) {
        try {
            $db  = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' );
            
            $brouwerQueryString = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
                                    VALUES (:brnaam, :adres, :postcode, :gemeente, :omzet)';
            
            $brouwerStatement = $db->prepare($brouwerQueryString);
            
            $brouwerStatement->bindValue(':brnaam', $_POST['brnaam']);
            $brouwerStatement->bindValue(':adres', $_POST['adres']);
            $brouwerStatement->bindValue(':postcode', $_POST['postcode']);
            $brouwerStatement->bindValue(':gemeente', $_POST['gemeente']);
            $brouwerStatement->bindValue(':omzet', $_POST['omzet']);
            
            $added = $brouwerStatement->execute();

            if($added) {
                $last_id         = $db->lastInsertId();
                $message['type'] = "success";
                $message['text'] = "Toegevoegd aan de database als nummer ". $last_id . ".";
                
            } else {
                $message['type'] = "error";
                $message['text'] = "Niet toegevoegd aan de database.";
            }            
        }
        catch (PDOException $e) {
            $message['type'] = "error";
            $message['text'] = "Fout opgetreden.";
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
    <style>
        .error {
            background-color: red;
        }

        .success {
            background-color: green;
        }
    </style>
</head>
<body>
    <h1>Voeg een brouwer toe</h1>

    <?php if ( $message ): ?>
		<div class="<?= $message["type"] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <ul>
            <li>
                <label for="brouwernaam">Brouwernaam</label>
                <input type="text" id="brouwernaam" name="brouwernaam">
            </li>
            <li>
                <label for="adres">adres</label>
                <input type="text" id="adres" name="adres">
            </li>
            <li>
                <label for="postcode">postcode</label>
                <input type="text" id="postcode" name="postcode">
            </li>
            <li>
                <label for="gemeente">gemeente</label>
                <input type="text" id="gemeente" name="gemeente">
            </li>
            <li>
                <label for="omzet">omzet</label>
                <input type="text" id="omzet" name="omzet">
            </li>
        </ul>
        <input type="submit" name="submit">
    </form>
</body>
</html>