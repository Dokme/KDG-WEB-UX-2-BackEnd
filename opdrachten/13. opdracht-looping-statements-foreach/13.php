<?php 
    $tekst = file_get_contents('text-file.txt');
    $textChars = str_split($tekst);
    
    rsort($textChars);
    $textSortedReversed = array_reverse($textChars);

    $tellerArray = array();
    
    foreach ($textSortedReversed as $value)
    {
        if (isset ($tellerArray[$value]))
        {
            ++$tellerArray[$value];
        } else
        {
            $tellerArray[$value] = 1;
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
</head>
<body>
    <pre><?php var_dump ($tellerArray) ?></pre>
</body>
</html>