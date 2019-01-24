<?php 
    $jaartal = 2018;
    $isSchrikkeljaar = false;

    if (($jaartal % 4 == 0) && (($jaartal % 100 != 0) || ($jaartal % 400 == 0))) {
        $isSchrikkeljaar = true;
    } else {
        $isSchrikkeljaar = false;
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
    <p><?php echo $jaartal ?> is <?php echo $isSchrikkeljaar ? 'een schrikkeljaar' : 'geen schrikkeljaar' ?></p>
</body>
</html>