<?php 
    $getal = rand(1 ,100);

    $onderGrens;
    $bovenGrens;
    
    if ($getal >= 0 && $Getal < 10) {
        $onderGrens = 0;
        $bovenGrens = 10;  
    } elseif ($getal >= 10 && $Getal < 20) {
        $onderGrens = 10;
        $bovenGrens = 20; 
    } elseif ($getal >= 20 && $Getal < 30) {
        $onderGrens = 20;
        $bovenGrens = 30; 
    } elseif ($getal >= 30 && $Getal < 40) {
        $onderGrens = 30;
        $bovenGrens = 40; 
    } elseif ($getal >= 40 && $Getal < 50) {
        $onderGrens = 40;
        $bovenGrens = 50; 
    } elseif ($getal >= 50 && $Getal < 60) {
        $onderGrens = 50;
        $bovenGrens = 60; 
    } elseif ($getal >= 60 && $Getal < 70) {
        $onderGrens = 60;
        $bovenGrens = 70; 
    } elseif ($getal >= 70 && $Getal < 80) {
        $onderGrens = 70;
        $bovenGrens = 80; 
    } elseif ($getal >= 80 && $Getal < 90) {
        $onderGrens = 80;
        $bovenGrens = 90; 
    } elseif ($getal >= 90 && $Getal < 100) {
        $onderGrens = 90;
        $bovenGrens = 100; 
    }

    $tekst = $getal . 'ligt tussen' . $onderGrens . 'en' . $bovenGrens;
    $omgedraaid = strrev($tekst);
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
    <p><?php echo $getal ?> ligt tussen <?php echo $onderGrens ?> en <?php echo $bovenGrens ?></p>
    
    <p><?php echo $tekst ?></p>
    <p><?php echo $omgedraaid ?></p>
</body>
</html>