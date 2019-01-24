<?php 
    $getallen =	array();
	$aantalGetallen	= 100;
	$getal = 0;
    
    while ($getal <= $aantalGetallen)
    {
    $getallen[] = $getal;
        $getal +=1;
    }

    $getallenReeks = implode(',', $getallen);

    $nummerInLijst = 0;
    $getallen2 = array();

    while ($nummerInLijst <= $aantalGetallen)
    {
       if ($nummerInLijst % 3 == 0 && $nummerInLijst > 40 && $nummerInLijst < 80  )
       {
         $getallen2[] = $nummerInLijst;
          $nummerInLijst +=1;
       } 
    }

    $getallenReeks2	= implode(',', $getallen2);
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
    <p><?php echo $getallenReeks ?></p>
    <p><?php echo $getallenReeks2 ?></p>
</body>
</html>