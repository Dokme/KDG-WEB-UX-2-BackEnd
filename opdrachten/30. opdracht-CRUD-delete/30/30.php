<?php
    $message            = false;
    $deleteConfirm      = false;
    $deleteID           = false;
    $viewTable          = array();
    $kolomnaam          = array();
    
    try {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

        if (isset($_POST['confirm'])) {
            $deleteConfirm  = true;
            $deleteID = $_POST['confirm'];
        }
        if (isset($_POST['delete'])) {
            $deleteQuery = 'DELETE FROM brouwers WHERE brouwernr= :brouwernr';
            $deleteStatement = $db->prepare($deleteQuery);
            $deleteStatement->bindValue(':brouwernr', $_POST['delete']);
            
            $deleteStatement->execute();
        }
        
        $viewQuery = 'SELECT * FROM brouwers';
        $viewStatement = $db->prepare($viewQuery);
        
        $viewStatement->execute();
        
        while ($row = $viewStatement->fetch(PDO::FETCH_ASSOC)) {
                $viewTable[] = $row;
        }
        foreach ($viewTable[0] as $key => $brouwer) {
                $kolomnaam[]= $key;
        }        
    } catch (PDOException $e) {
        $message['type'] = "error";
        $message['text'] = "Fout opgetreden.";
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

        .delete {
            background-color: red;
        }

        .error {
			background-color: red;
		}
    </style>
</head>
<body>
    <?php if ($message): ?>
		<div class="<?= $message["type"] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>
    
    <?php if($deleteConfirm):?>
        <div>
            Bent u zeker dat u deze datarij wil verwijderen?
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <button type="submit" name="delete" value="<?= $deleteID ?>">
                    Ja!
                </button>
                <button type="submit">
                    Néééééé!
                </button>
            </form>
        </div>
    <?php endif ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <table>
            <thead>
                <tr>
                    <?php foreach($kolomnaam as $value):?>
                        <th> <?=$value ?> </th>
                    <?php endforeach?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewTable as $key => $brouwer): ?>
                <tr class=" <?= ( $brouwer['brouwernr'] === $deleteID ) ? 'confirm-delete' : ''  ?> ">
                    <td> <?= ++$key ?> </td>
                    <?php foreach ($brouwer as $value): ?>
                        <td> <?= $value ?> </td>
                    <?php endforeach ?>
                    <td> <button type="submit" name="confirm" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
                        <img src="icon-delete.png" alt="Delete button">
                        </button> 
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
</body>
</html>