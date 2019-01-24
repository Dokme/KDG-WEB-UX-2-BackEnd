<?php 
    $voornaam = "Dieter";
    $achternaam = "Engels";
    $volledigeNaam = $voornaam . " " . $achternaam;
    $volledigeNaamLengte = strlen($volledigeNaam);
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
    <p><?php echo $volledigeNaam ?></p>
    <p><?php echo $volledigeNaamLengte ?></p>
</body>
</html>