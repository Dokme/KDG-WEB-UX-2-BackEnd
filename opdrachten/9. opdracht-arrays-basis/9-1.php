<?php 
    $dieren = array('draak','vleermuis','schorpioen','spin','krokodil','tijger','koi','arend','wolf','zeeduivel');
    
    $dieren[] = 'draak';
    $dieren[] = 'vleermuis';
    $dieren[] = 'schorpioen';
    $dieren[] = 'spin';
    $dieren[] = 'krokodil';
    $dieren[] = 'tijger';
    $dieren[] = 'koi';
    $dieren[] = 'arend';
    $dieren[] = 'wolf';
    $dieren[] = 'zeeduivel';

    $voertuigen["landvoertuigen"] = array('auto', 'fiets');
    $voertuigen["watertuigen"] = array('boot', 'waterfiets');
    $voertuigen["luchtvoertuigen"] = array('vliegtuig', 'raket');
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
    <p><?php var_dump ( $dieren )  ?></p>
	<p><?php var_dump ( $voertuigen )  ?></p>
</body>
</html>