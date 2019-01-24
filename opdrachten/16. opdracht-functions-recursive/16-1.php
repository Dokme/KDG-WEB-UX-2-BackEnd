<?php
    function berekenKapitaal($startKapitaal, $rente, $termijn)
	{
		static $teller          = 1;
		static $historiek       = array();

		if ($teller <= $termijn)
		{
			$renteBedrag        = floor($startKapitaal * ($rente / 100));
			$nieuwKapitaal      = $startKapitaal + $renteBedrag;
			$historiek[$teller] = 'Het bedrag na ' . $teller . ' jaar is ' . $nieuwKapitaal . '€ met ' . $renteBedrag . '€ rente.';

			++$teller;

			return berekenKapitaal($nieuwKapitaal, $rente, $termijn);
        } 
        else
		{
			return $historiek;
		}
	}

	static $startKapitaal =	100000;
	static $rente		  =	8;
	static $termijn		  =	10;

	$Hans = berekenKapitaal($startKapitaal, $rente, $termijn);
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
    <ul>
        <?php foreach($Hans as $value): ?>
            <li><?php echo $value ?></li>
        <?php endforeach ?>
    </ul>
</body>
</html>