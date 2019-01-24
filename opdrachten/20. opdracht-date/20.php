<?php
    setlocale( LC_ALL, 'nld_nld');
    $timestamp = mktime(22, 35, 25, 01, 21, 1904);
    $date      = strftime('%d %B %Y, %H:%M:%S %p', $timestamp);
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
    <p><?php echo $date ?></p>
</body>
</html>