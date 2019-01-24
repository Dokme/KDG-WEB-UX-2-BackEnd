<?php
	$maxTafels = 10;
	$maxProduct	= 10;
	$tafels	= array();

	for ($tafelCounter = 0; $tafelCounter <= $maxTafels; $tafelCounter++)
	{
		$producten = array();

		for ($productCounter = 0; $productCounter <= $maxTafels; $productCounter++)
		{
			$producten[] = $tafelCounter * $productCounter;
		}

		$tafels[$tafelCounter] = $producten;
	}
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
        <?php foreach ($tafels as $producten): ?>
            <tr>
                <?php foreach ($producten as $product ): ?>
                    <td class="<?= ( $product % 2 > 0 ) ? 'oneven' : '' ?>"><?= $product ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
	</table>
</body>
</html>