<?php
    $maxTafels = 10;
	$maxProduct	= 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
		.oneven
		{
			background-color : lightgreen;
		}
	</style>
</head>
<body>
    <table>
        <?php for($tafel = 0; $tafel < $maxTafels; $tafel++): ?>
            <tr>	
                <?php for($product = 1; $product <= $maxProduct; $product++): ?>
                    <td class="<?= ( ( $tafel % $product % 2 ) > 0 ) ? 'oneven' : '' ?>"><?= $tafel * $product ?></td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
	</table>
</body>
</html>