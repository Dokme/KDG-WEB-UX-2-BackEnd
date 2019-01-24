<?php
    function __autoload($className) {
	    include 'classes/' . $className . '.php';
    }

    $new	 = 275;
    $unit	 = 96;
    
    $percent = new Percent($new, $unit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse:collapse;
        }

        td {
            padding:6px;
            border:1px solid #666666;
        }

        td:last-child {
            text-align:right;
        }
	</style>
</head>
<body>
    <table>
        <caption>Hoe staat <?= $new ?> in verhouding tot <?= $unit ?>?</caption>
        <tr>
            <td>Relatief</td>
            <td><?= $percent->relative ?></td>
        </tr>
        <tr>
            <td>Procentueel</td>
            <td><?= $percent->hundred ?>%</td>
        </tr>
        <tr>
            <td>Nominaal</td>
            <td><?= $percent->nominal ?></td>
        </tr> 
    </table>
</body>
</html>