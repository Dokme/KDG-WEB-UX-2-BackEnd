<?php 
    $dieren = array('grasmier','wegmier','faraomier','vuurmier','spookmier','houtmier');
    $aantalDieren = count($dieren);
    
    $teZoekenDier = 'grasmier';
    $teZoekenDierGevonden = in_array($teZoekenDier, $dieren);

    if($teZoekenDierGevonden == true) {
        $tekst = 'gevonden';
    }
    else {
        $tekst = 'niet gevonden';
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
    <p><?php echo $aantalDieren ?></p>
    <p>Te zoeken dier <?php echo $teZoekenDier ?> is <?php $tekst ?></p>
</body>
</html>