<?php
    $cursus      = false;
    $voorbeelden = false;
    $oplossingen = false;
    $search      = false;

    if ( isset ($_GET['link'])) {
        switch ($_GET['link']) {
            case 'cursus':
                $cursus = true;
                break;

            case 'voorbeelden':
                $voorbeelden    = true;
                $map            = 'voorbeelden';
                $bestandenArray = getBestanden($map);
                break;
            
            case 'oplossingen':
                $oplossingen    = true;
                $map            = 'oplossingen';
                $bestandenArray = getBestanden($map);
                break;
        }
    }

    function getBestanden($map) {
        $bestandenArray = scandir('../' . $map . '/');

        return $bestandenArray;
    }

    if (isset ($_GET['search-query'])) 
	{
		$search = true;

		$voorbeeldenBestanden = getBestanden('voorbeelden');
		$oplossingenBestanden = getBestanden('oplossingen');

		$alleBestanden        =	array_merge($voorbeeldenBestanden, $oplossingenBestanden);

		$resultaten	          =	array();
		$zoekString           =	$_GET['search-query'];

		foreach ($alleBestanden as $bestand)
		{
			$zoekStringGevonden = strpos($bestand, $zoekString);

			if ( $zoekStringGevonden !== false )
			{
				$resultaten[]	=	$bestand;
			}
        }
        
		$bestandenArray = $resultaten;
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
        iframe {
            width: 1000px;
            height: 750px;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="19.php?link=cursus">Cursus</a></li>
        <li><a href="19.php?link=voorbeelden">Voorbeelden</a></li>
        <li><a href="19.php?link=oplossingen">oplossingen</a></li>
    </ul>

    <form action="19.php" method="GET">
        <label id="search-query">Zoek naar:</label>
        <input type="text" name="search-query" id="search-query" placeholder="Geef een zoekterm in">
        <input type="submit">
    </form>
    
    <?php if ($cursus): ?>
        <iframe src="web-backend-cursus.pdf"></iframe>
    <?php endif ?>
    
    <?php if ($voorbeelden || $oplossingen): ?>
        <ul>
            <?php foreach ($bestandenArray as $bestand): ?>
                <li><a href="../ <?php echo $map ?> / <?php echo $bestand ?>"> <?php echo $bestand ?> </a></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <?php if ($search): ?>
        <ul>
            <?php foreach ($bestandenArray as $bestand): ?>
                <li><?php echo $bestand ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</body>
</html>