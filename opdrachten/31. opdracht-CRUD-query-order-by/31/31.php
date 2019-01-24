<?php
    $message    = false;
    $fieldnames	= array();
    $data	    = array();
    $bieren     = array();
    $bierenCleanFieldnames = array();
	
	try	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

		$orderColumn	=	'bieren.biernr';
		$order			=	'ASC';

		if (isset($_GET['orderBy'])) {
			$orderArray		=	explode( '-', $_GET['orderBy']);
			$orderColumn	=	$orderArray[0];
			$order		    =	$orderArray[1];
		}

        $orderQuery = 'ORDER BY ' . $orderColumn . ' ' . $order;
        
		if (isset($_GET['orderBy'])) {
			$order = ($orderArray[1] != 'DESC') ? 'DESC' : 'ASC';
		}

		$query = 'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
						FROM bieren 
							INNER JOIN brouwers
							ON bieren.brouwernr	= brouwers.brouwernr
							INNER JOIN soorten
							ON bieren.soortnr = soorten.soortnr '
							. $orderQuery;

		$bierenQuery = query($db, $query) ;

		$bierenFieldnames		= 	$bierenQuery['fieldnames'];
		$bierenCleanFieldnames	= 	processFieldnames($bierenFieldnames);
		$bieren					=	$bierenQuery['data'];

	} catch (PDOException $e) {
		$message['type'] = 'error';
		$message['text'] = 'Fout opgetreden.';
	}
	
	function query($db, $query, $tokens = false) {
		$statement = $db->prepare( $query );
		
		if ($tokens) {
			foreach ($tokens as $token => $tokenValue) {
				$statement->bindValue($token, $tokenValue);
			}
		}

        $statement->execute();

		for ($fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber) { 
			$fieldnames[] =	$statement->getColumnMeta($fieldNumber)['name'];
        }

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$data[]	= $row;
		}

		$returnArray['fieldnames']	=	$fieldnames;
		$returnArray['data']		=	$data;

		return $returnArray;
	}

	function processFieldnames($array) {
		$cleanFieldnames = array();

		foreach ($array as $value) {
			switch ($value)	{
				case "biernr":
					$name =	"Biernummer (PK)";
					break;
				case "naam":
					$name =	"Bier";
					break;
				case "brnaam":
					$name =	"Brouwer";
					break;
				case "soort":
					$name =	"Soort";
					break;
				case "alcohol":
					$name =	"Alcoholpercentage";
					break;
				default:
					$name =	$value;
			}

			$cleanFieldnames[] = $name;
		}
		return $cleanFieldnames;
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
			.success {
				background-color: green;
			}

			.error {
				background-color: red;
			}

			.confirm-delete {
				background-color: red;
			}

			.ascending a {
				background:	no-repeat url('icon-asc.png') right ;
			}

			.descending a {
				background:	no-repeat url('icon-desc.png') right;
			}

			.selected {
				background-color: lightgreen;
			}
		</style>
</head>
<body>
	<?php if ( $message ): ?>
		<div class="<?= $message["type"] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>	
	
	<table>
		<thead>
			<tr>
				<?php foreach ($bierenCleanFieldnames as $key => $cleanFieldname): ?>
					<th class="<?= ($order == 'ASC' && $orderColumn == $bierenFieldnames[$key]) ? 'descending' : 'ascending' ?> <?= ($orderColumn == $bierenFieldnames[$key]) ? 'selected' : '' ?>"><a href="<?= $_SERVER['PHP_SELF'] ?>?orderBy=<?= $bierenFieldnames[$key] ?>-<?= $order ?>"> <?= $cleanFieldname ?> </a></th>
				<?php endforeach ?>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bieren as $key => $brouwer): ?>
				<tr>
					<?php foreach ($brouwer as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>