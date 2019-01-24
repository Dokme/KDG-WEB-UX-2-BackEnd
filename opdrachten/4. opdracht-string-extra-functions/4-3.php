<?php
    $lettertje = 'e';
    $cijfertje = '3';
    $langsteWoord = 'zandzeepsodemineralenwatersteenstralen';

    $replaceEs = str_replace($lettertje, $cijfertje, $langsteWoord);
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
    <p><?php echo $replaceEs ?></p>
</body>
</html>