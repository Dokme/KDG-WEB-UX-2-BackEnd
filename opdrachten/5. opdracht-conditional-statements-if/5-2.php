<?php 
    $min = '1';
    $max = '7';
    $getal = rand($min, $max);
    $dag = "onbekende dag";

    if ($getal == 1) {
        $dag = "maandag";
    }
    if ($getal == 2) {
        $dag = "dinsdag";
    }
    if ($getal == 3) {
        $dag = "woensdag";
    }
    if ($getal == 4) {
        $dag = "donderdag";
    }
    if ($getal == 5) {
        $dag = "vrijdag";
    }
    if ($getal == 6) {
        $dag = "zaterdag";
    }
    if ($getal == 7) {
        $dag = "zondag";
    }

    $dagCap = strtoupper($dag);
    $dagCapExceptA = str_replace('A', 'a', $dagCap);
    $laatsteApos = strrpos($dagCap, 'A');
    $dagCapExceptLaatsteA = substr_replace($dagCap, 'a', $laatsteApos, 1);
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
    <p><?php echo $getal ?> geeft <?php echo $dagCap ?></p>
    <p><?php echo $dagCapExceptA ?></p>
    <p><?php echo $dagCapExceptLaatsteA ?></p>
</body>
</html>