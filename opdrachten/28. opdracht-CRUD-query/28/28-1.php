<?php
	$message		= false;
	$columnNames	= array();
	$bierenTabel    = array();

    try {
		$db  = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
		
		$sql = file_get_contents('bieren.sql');
		$qr  = $db->exec($sql);

		$queryString = 'SELECT *
							FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr = brouwers.brouwernr
							WHERE bieren.naam LIKE "Du%"
							AND brouwers.brnaam LIKE "%a%"';

		$statement = $db->prepare($queryString);
		$statement->execute();
		

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$bierenTabel[] = $row;
		}

		
		$columnNames[]	= 'Biernummer';

		foreach ($bieren[0] as $key => $bier) {
			$columnNames[] = $key;
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
	<style>
		.even {
			background-color: lightgrey;
		}
	</style>
</head>
<body>
    <?php if ($message): ?>
		<div class="<?= $message["type"] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>

    <table>
        <thead>
            <tr>
                <?php foreach($columnNames as $value):?>
                    <th><?=$value ?></th>
                <?php endforeach?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bierenTabel as $key => $bier): ?>
                <tr class="<?= (($key + 1) %2 == 0) ? 'even' : '' ?>">
                    <td><?= ($key + 1) ?></td>
                    <?php foreach ($bier as $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>