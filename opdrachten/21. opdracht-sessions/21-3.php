<?php
    session_start();

    if ( isset( $_POST['submit'] ) )
    {
        $_SESSION['deel2']['straat'] = $_POST['straat'];
        $_SESSION['deel2']['nummer'] = $_POST['nummer'];
        $_SESSION['deel2']['gemeente'] = $_POST['gemeente'];
        $_SESSION['deel2']['postcode'] = $_POST['postcode'];
    }

    $regData1['deel1']   = $_SESSION['deel1'];
    $regData2['deel2']   = $_SESSION['deel2'];

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
    <h1>Overzichtspagina</h1>

    <a href="21-1.php?session=destroy">Vernietig sessie</a>

    <?php foreach($regData1['deel1'] as $data => $value ): ?>
        <li><?=$data?>:<?= $value ?> <a href="21-1.php?focus=<?= $data ?>">wijzig</a> </li>
    <?php endforeach ?>

    <?php foreach($regData2['deel2'] as $data => $value ): ?>
        <li><?=$data?>:<?= $value ?> <a href="21-2.php?focus=<?= $data ?>">wijzig</a> </li>
    <?php endforeach ?>
</body>
</html>