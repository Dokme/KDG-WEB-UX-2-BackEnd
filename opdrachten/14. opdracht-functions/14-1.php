<?php 
    function berekenSom($getal1, $getal2) {
        $som = $getal1 + $getal2;

        return $som;
    }

    function vermenigvuldig($getal1, $getal2) {
        $product = $getal1 * $getal2;

        return $product;
    }

    function isEven($getal) {
        $alDanNietEven = false;
        if ($getal % 2 == 0) {
            $alDanNietEven = true;
        }

        return $getal;
    }

    function stringOps($tekst) {
        $tekstLengte = strlen($tekst);
        $tekstToUpper = strtoupper($tekst);

        return $tekstLengte;
        return $tekstToUpper;
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
    <?=berekenSom(4,7)?>
    <?=vermenigvuldig(4,7)?>
    <?=isEven(5)?>
    <?=stringOps('Hello World')?>
</body>
</html>