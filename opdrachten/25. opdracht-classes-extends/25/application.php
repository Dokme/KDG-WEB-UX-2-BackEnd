<?php
    function __autoload($className) {
	    include 'classes/' . $className . '.php';
    }
    
    $vleermuis  = new Animal('Dracula', 'male', 80);
    $schorpioen = new Animal('Uded', 'female', 70);
    $krokodil   = new Animal('Kapitein Haak', 'female', 120);

    $simba 	    = new Lion('Simba', 'male', 110, 'Congo lion');
    $scar   	= new Lion('Scar', 'male', 110, 'Kenia lion');
    
    $zeke       = new Zebra('Zeke', 'male', 70, 'Quagga');
	$zana       = new Zebra('Zana', 'female', 70, 'Selous');
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
        <p><?php echo $vleermuis->getName() ?> is van het geslacht <?php echo $vleermuis->getGender() ?> en heeft momenteel <?php echo $vleermuis->getHealth() ?> levenspunten (special move: <?php echo $vleermuis->doSpecialMove() ?>)</p>
		<p><?php echo $schorpioen->getName() ?> is van het geslacht <?php echo $schorpioen->getGender() ?> en heeft momenteel <?php echo $schorpioen->getHealth() ?> levenspunten (special move: <?php echo $schorpioen->doSpecialMove() ?>)</p>
        <p><?php echo $krokodil->getName() ?> is van het geslacht <?php echo $krokodil->getGender() ?> en heeft momenteel <?php echo $krokodil->getHealth() ?> levenspunten (special move: <?php echo $krokodil->doSpecialMove() ?>)</p>
        
        <?php $vleermuis->changeHealth(+20); ?>
        <?php $krokodil->changeHealth(-50); ?>

        <p><?php echo $vleermuis->getName() ?>, <?php echo $vleermuis->getGender() ?>, health: <?php echo $vleermuis->getHealth() ?></p>
        <p><?php echo $krokodil->getName() ?>, <?php echo $krokodil->getGender() ?>, health: <?php echo $krokodil->getHealth() ?></p>

        <p>De speciale move van <?php echo $simba->getName() ?> (soort: <?php echo $simba->getSpecies() ?>): <?php echo $simba->doSpecialMove() ?></p>
        <p>De speciale move van <?php echo $scar->getName() ?> (soort: <?php echo $scar->getSpecies() ?>): <?php echo $scar->doSpecialMove() ?></p>
        
        <p>De speciale move van <?php echo $zeke->getName() ?> (soort: <?php echo $zeke->getSpecies() ?>): <?php echo $zeke->doSpecialMove() ?></p>
        <p>De speciale move van <?php echo $zana->getName() ?> (soort: <?php echo $zana->getSpecies() ?>): <?php echo $zana->doSpecialMove() ?></p>   
</body>
</html>