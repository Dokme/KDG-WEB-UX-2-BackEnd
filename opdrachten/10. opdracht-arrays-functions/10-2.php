<?php 
    $dieren = array('grasmier','wegmier','faraomier','vuurmier','spookmier','houtmier');
    $dierenGesorteerd = asort($dieren);

    $zoogdieren = array('reuzenmiereneter','dwergmiereneter','boommiereneters');
    $mierenEnHunEters = array_merge($dieren, $zoogdieren );
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
    <p><?php var_dump($mierenEnHunEters) ?></p>
</body>
</html>