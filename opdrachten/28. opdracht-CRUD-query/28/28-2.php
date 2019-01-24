<?php
    $message                = false;
    $brouwersTabel          = array();
    $geselecteerdeBrouwer	= false;
    $bierenHeader	        = array();
    $bieren             	= array();

    try {
        $db  = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		$sql = file_get_contents('bieren.sql');
        $qr  = $db->exec($sql);
        
        $brouwerQueryString	= 'SELECT brnaam, brouwernr
                                    FROM brouwers';

        $brouwersStatement = $db->prepare($brouwerQueryString);
        $brouwersStatement->execute();

        while ($row = $brouwersStatement->fetch(PDO::FETCH_ASSOC)) {
            $brouwersTabel[] = $row;
        }
        
        if (isset($_GET['brouwernr'])) {
			$geselecteerdeBrouwer	= $_GET['brouwernr'];

            $bierenQueryString	    = 'SELECT bieren.naam
                                            FROM bieren 
                                            WHERE bieren.brouwernr = :brouwernr';

			$bierenStatement = $db->prepare($bierenQueryString);
			$bierenStatement->bindValue(':brouwernr', $_GET['brouwernr']);
		} else {
			$bierenQueryString	=	'SELECT bieren.naam
										FROM bieren';

			$bierenStatement = $db->prepare( $bierenQueryString );
		}

		$bierenStatement->execute();
                                    
		$bierenHeader[]	= 'Aantal';

		for ($columnNumber  = 0; $columnNumber < $bierenStatement->columnCount(); ++$columnNumber) { 
			$bierenHeader[] = $bierenStatement->getColumnMeta($columnNumber)['name'];
        }

		while($row = $bierenStatement->fetch(PDO::FETCH_ASSOC))	{
			$bieren[] =	$row['naam'];
		}
    }
    catch (PDOException $e) {
		$message['type'] = 'error';
		$message['text'] = 'Verbinding mislukt.';
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
    <?php if ($message): ?>
		<div class="<?= $message["type"] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
		<select name="brouwernr">
			<?php foreach ($brouwersTabel as $key => $brouwer): ?>
				<option value="<?= $brouwer['brouwernr'] ?>" <?= ($geselecteerdeBrouwer === $brouwer['brouwernr']) ? 'selected' : '' ?>><?= $brouwer['brnaam'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Geef mij alle bieren van deze brouwerij">
	</form>

	<table>
		<thead>
			<tr>
				<?php foreach ($bierenHeader as $columnName): ?>
					<th><?= $columnName ?></th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bieren as $key => $biernaam): ?>
				<tr class="<?= (($key + 1) %2 == 0) ? 'even' : '' ?>">
					<td><?= ($key + 1) ?></td>
					<td><?= $biernaam ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>