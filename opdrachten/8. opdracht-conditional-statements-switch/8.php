<?php 
    $getal = rand(1, 7);
    $dag;

    switch ($getal) {
        case '1':
            $dag = 'maandag';
            break;
        case '2':
            $dag = 'dinsdag';
            break;
        case '3':
            $dag = 'woensdag';
            break;
        case '4':
            $dag = 'donderdag';
            break;
        case '5':
            $dag = 'vrijdag';
            break;
        case '6':
            $dag = 'zaterdag';
            break;
        case '7':
            $dag = 'zondag';
            break;
        default:
            $dag = 'onbekende dag';
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
    <p><?php echo $getal ?> is <?php echo $dag ?></p>
</body>
</html>