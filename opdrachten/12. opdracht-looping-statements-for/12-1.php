<?php 
    $rijen = 10;
    $kolommen =	10;
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
    <table>
        <?php for ($rij = 0; $rij < $rijen; $rij++): ?>
            <tr>   
                <?php for ($kolom = 0; $kolom < $kolommen; $kolom++): ?>
					<td>kolom</td>
				<?php endfor ?>
            </tr>   
        <?php endfor ?>
    </table>
</body>
</html>