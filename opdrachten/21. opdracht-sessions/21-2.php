<?php
    session_start();

    if ( isset( $_POST['submit'] ) )
    {
        $_SESSION['deel1']['email'] =   $_POST['email'];
        $_SESSION['deel1']['nickname'] =   $_POST['nickname'];
    }

    $regData1['deel1']   = $_SESSION['deel1'];

    $straat			=	( isset( $_SESSION['deel2']['straat'] ) ) ? $_SESSION['deel2']['straat'] : '';
    $nummer 		=	( isset( $_SESSION['deel2']['nummer'] ) ) ? $_SESSION['deel2']['nummer'] : '';
    $gemeente		=	( isset( $_SESSION['deel2']['gemeente'] ) ) ? $_SESSION['deel2']['gemeente'] : '';
    $postcode		=	( isset( $_SESSION['deel2']['postcode'] ) ) ? $_SESSION['deel2']['postcode'] : '';
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
    <a href="21-1.php?session=destroy">Vernietig sessie</a>

    <h1>Registratiegegevens</h1>
    <ul>
    <?php foreach($regData1['deel1'] as $data => $value ): ?>
        <li><?=$data?>:<?= $value ?></li>
    <?php endforeach ?>
    </ul>
    <h1>Deel 2: adresgegevens</h1>
    <form action="21-3.php" method="POST">
        <ul>
            <li>
                <label for="straat">straat</label>
                <input type="text" name="straat" id="straat" value="<?= $straat ?>" placeholder="straat" <?= ( isset    ($_GET['focus'])    &&      ($_GET['focus'] == "straat")      ) ? 'autofocus' : '' ?>>
            </li>
            <li>
                <label for="nummer">nummer</label>
                <input type="text" name="nummer" id="nummer" value="<?= $nummer ?>" placeholder="nummer" <?= ( isset    ($_GET['focus'])    &&      ($_GET['focus'] == "nummer")      ) ? 'autofocus' : '' ?>>
            </li>
            <li>
                <label for="gemeente">gemeente</label>
                <input type="text" name="gemeente" id="gemeente" value="<?= $gemeente ?>" placeholder="gemeente" <?= ( isset    ($_GET['focus'])    &&      ($_GET['focus'] == "gemeente")      ) ? 'autofocus' : '' ?>>
            </li>
            <li>
                <label for="postcode">postcode</label>
                <input type="text" name="postcode" id="postcode" value="<?= $postcode ?>" placeholder="postcode" <?= ( isset    ($_GET['focus'])    &&      ($_GET['focus'] == "postcode")      ) ? 'autofocus' : '' ?>>
            </li>
        </ul>
        <input type="submit" value="Volgende" name="submit">
    </form>
</body>
</html>