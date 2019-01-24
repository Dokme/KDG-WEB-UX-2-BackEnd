<?php
    $kleurenEnTinten =  array('kleuren' => array('rood', 'blauw'),
                              'tinten' => array('zwart', 'grijs'),
    );
    $htmlBlok        = '<html>Tekst</html>';

    function drukArrayAf($array) {
        $dataArray  = array();

        foreach ($array as $key => $value)
        {
            $dataArray[] = 'kleurenEnTinten[' . $key . '] heeft waarde ' . $value;
        }
        return $dataArray;
    }

    $resultaat       = drukArrayAf($kleurenEnTinten);

    function validateHtmlTag($html) {
        $openingTag = '<html>';
        $closingTag = '</html>';

        $isValid    = false;

        if (strpos($html, $openingTag) == 0) {
            $strLenWithoutClosingTag = strlen($html) - strlen($closingTag);
            if (stripos($html, $closingTag) == $strLenWithoutClosingTag )
            {
                $isValid = true;
            }
        }
        return $isValid;
    };
    $resultaat2      = validateHtmlTag($htmlBlok);
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
        <?php foreach ( $resultaat as $value ): ?>
            <li><?= $value ?></li>
        <?php endforeach ?>
        <p><?php echo $htmlBlok?> is <? ($resultaat2) ? 'wel geldig' : 'niet geldig' ?>.</p>
    </ul>
</body>
</html>