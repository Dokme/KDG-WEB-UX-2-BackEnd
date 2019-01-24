<?php 
    $getallen = array(8,7,8,7,3,2,1,2,4);

    $getallenUniek = array_unique($getallen);
    $getallenUniekGesorteerd = arsort($getallenUnique);
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
    <p><?php var_dump($getallenUniekGesorteerd) ?></p>
</body>
</html>