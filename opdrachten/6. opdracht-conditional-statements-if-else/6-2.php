<?php 
    $seconden = 123456789;
    
    $minuut = 60;
    $uur = 60 * $minuut;
    $dag = 24 * $uur;
    $week = 7 * $dag;
    $maand = 31 * $dag;
    $jaar = 12 * $maand;

    $aantalMin = floor($seconden / $minuut); 
    $aantalUren = floor($seconden / $uur);    
    $aantalDagen = floor($seconden / $dag); 
    $aantalWeken = floor($seconden / $week); 
    $aantalMaanden = floor($seconden / $maand); 
    $aantalJaren = floor($seconden / $jaar);
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
    <p><?php echo $seconden ?> telt</p>
    <ul>
        <li>minuten: <?php echo $aantalMin ?></li>
        <li>uren: <?php echo $aantalUren ?></li>
        <li>dagen: <?php echo $aantalDagen ?></li>
        <li>weken: <?php echo $aantalWeken ?></li>
        <li>maanden (31): <?php echo $aantalMaanden ?></li>
        <li>jaren (365): <?php echo $aantalJaren ?></li>
    </ul>
</body>
</html>