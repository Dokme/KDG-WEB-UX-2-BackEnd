<?php
    $boodschappenlijstje = array('koffie', 'grasmaaier', 'fietspomp', 'platenspeler');
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
    <ul>
        <?php $boodschappenCounter = 0; ?>
        <?php while (isset($boodschappenlijstje [$boodschappenCounter])): ?>
            
            <li><?= $boodschappenlijstje [$boodschappenCounter] ?></li>
            <?php $boodschappenCounter +=1; ?>

        <?php endwhile ?>
    </ul>
</body>
</html>