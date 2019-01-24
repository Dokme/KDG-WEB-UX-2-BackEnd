<?php
    $artikels = array( array('titel'  => 'Nobelprijs Economie gaat naar onderzoek rond klimaat en economische groei',
                             'datum'  => '8 oktober 2018',
                             'inhoud' => 'De Amerikanen William D. Nordhaus en Paul M. Romer winnen de Nobelprijs Economie. Nordhaus is vooral bekend voor zijn economische analyses rond de klimaatverandering. Romer heeft baanbrekend onderzoek verricht naar de factoren die economische groei bepalen.',
                             'afbeelding' => '1.jpg',
                             'afbeeldingBeschrijving' => 'william en paul.',
                            ),
    
                       array('titel'  => 'VUB-prof over VN-klimaatrapport: "Het wordt enorm dringend, de komende 10 jaar zijn cruciaal"',
                             'datum'  => '8 oktober 2018',
                             'inhoud' => 'De essentie van het langverwachte klimaatrapport van de VN, over 1,5 of 2 graden opwarming van onze planeet, is dat de tijd enorm dringt om de opwarming nog onder 1,5 graden te houden. Dat zegt klimatoloog Philippe Huybrechts van de VUB in een gesprek met onze redactie. Tegelijk zijn er verschillende technieken om CO2 uit de lucht te halen in het geval van een zogenoemde overshooting (als we over onze doelen gaan). De professor is daar hoopvol over, maar waarschuwt tegelijk.',
                             'afbeelding' => '2.jpg',
                             'afbeeldingBeschrijving' => 'ijsbeer.',
                            ),
    
                       array('titel'  => '100 jaar geleden: de duif Cher Ami redt het verloren bataljon',
                             'datum' => '8 oktober 2018',
                             'inhoud' => '100 jaar geleden raakt een Amerikaanse eenheid afgesneden van de hoofdmacht. Zij wordt als verloren beschouwd, tot zij door een duif gered wordt. Het verhaal van "The Lost Battallion" werd een van de beroemdste verhalen van de Eerste Wereldoorlog en is talloze malen verfilmd.',
                             'afbeelding' => '3.jpg',
                             'afbeeldingBeschrijving' => 'duif.',
                            ),
                );
    $individueelArtikel		=	false;
    $nietBestaandArtikel	=	false;

    if (isset ($_GET['id']))
	{
        $id = $_GET['id'];
        
		if (array_key_exists($id, $artikels))
		{
			$artikels 			= 	array($artikels[$id]);
			$individueelArtikel	=	true;
		}
		else
		{
			$nietBestaandArtikel =	true;
		}		
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
        body{ 
			font-family:"Segoe UI";
			color:#423f37;
		}

		.container{
			width:	1024px;
			margin:	0 auto;
		}

		img{
			max-width: 100%;
		}

		.multiple{
			float:left;
			width:288px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:#EEEEEE;
		}

		.multiple:nth-child(3n+1){
			margin-left:0px;
		}

		.multiple:nth-child(3n){
			margin-right:0px;
		}

		.single img{
			float:right;
			margin-left: 16px;
		}
    </style>
</head>
<body>
    <?php if ( !$nietBestaandArtikel ): ?>
        <div class="container">
            <?php foreach ($artikels as $id => $artikel): ?>
                <article class="<?php echo ( !$individueelArtikel ) ? 'multiple': 'single' ; ?>">
                    <h1><?php echo $artikel['titel'] ?></h1>
                    <p><?php echo $artikel['datum'] ?></p>
                    <img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingBeschrijving'] ?>">
                    <p><?php echo ( !$individueelArtikel ) ? str_replace ( "\r\n", "</p><p>", substr( $artikel['inhoud'], 0, 50 ) ) . '...': str_replace ( "\r\n", "</p><p>",$artikel['inhoud'] ) ; ?></p>
                    <?php if ( !$individueelArtikel ): ?>
                        <a href=17.php?id=<?php echo $id ?>">Lees meer</a>
                    <?php endif ?>
                </article>
            <?php endforeach ?>
        </div>
    <?php else: ?>
		<p>Het artikel met id <?php echo $id ?> bestaat niet. Probeer een ander artikel.</p>
	<?php endif ?>
</body>
</html>