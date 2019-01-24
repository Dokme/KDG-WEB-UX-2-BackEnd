<?php
    $fruit = 'kokosnoot';
    $fruitLengte = strlen($fruit);
    $o = 'o';
    $posFirstOinFruit = strpos($fruit, $o);
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
    <p><?php echo $fruitLengte ?></p>
    <p><?php echo $posOinFruit ?></p>
</body>
</html>