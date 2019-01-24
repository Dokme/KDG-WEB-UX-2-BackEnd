<?php 
    $getallen = array(1,2,3,4,5);
    $product = array_product($getallen);

    $onevenGetallen = array();

    foreach ($getallen as $value) {
        if ($value % 2 != 0) {
            $onevenGetallen = $value;
        }
    }

    $getallen2 = array_reverse($getallen);

    $somGetallenArrays =  array();

    foreach ($getallen as $key => $getal) {
        $getal1 = $getal;
        $getal2 = $getallen2[$key];

        $somGetallenArrays[] = $getal1 + $getal2;
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
    <p><?php echo $product ?></p>
    <p><?php var_dump($onevenGetallen) ?></p>
    <p><?php var_dump($somGetallenArrays) ?></p>
</body>
</html>