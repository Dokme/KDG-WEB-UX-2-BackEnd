<?php
    $message          = false;
    $deleteConfirm    = false;
    $edit             = false;
    $editID;
    $brouwerijNaam;
    $deleteID;
    $viewTable        = array();
    $kolomnaam        = array();

    try {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');

        if (isset($_POST['delete'])) {
            $deleteConfirm = true;
            $deleteID = $_POST['delete'];
        }

        if (isset($_POST['edit'])) {
            $edit             = true;
            $selectQuery      = 'SELECT brnaam  FROM brouwers WHERE brouwernr = :brouwernr ';
            $selectStatement  = $db->prepare($selectQuery);
            $selectStatement->bindValue(':brouwernr', $_POST['edit']);
            $selectStatement->execute();
            
            $brouwerij = array();
            $brouwerijNaam    = $selectStatement->fetchColumn();

            $selectQuery2     = 'SELECT *  FROM brouwers WHERE brouwernr = :brouwernr ';
            $selectStatement2 = $db->prepare($selectQuery2);
            $selectStatement2->bindValue(':brouwernr', $_POST['edit']);
            $selectStatement2->execute();

            $editData[] = array();
            while ($row = $selectStatement2->fetch(PDO::FETCH_ASSOC)) {
                $editData['data'] =	$row;
            }

            $editID = $_POST['edit'];
        }

        if (isset($_POST['sure'])) {
            $deleteQuery     = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';
            $deleteStatement = $db->prepare($deleteQuery);
            $deleteStatement->bindValue(':brouwernr', $_POST['sure']);
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
        .delete {
            background-color:red;
        }

        .error {
            background-color:red;
        }
    </style>
</head>
<body>
    <?php if ( $message ): ?>
		<div class="<?= $message["type"] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>

    <?php if ($edit): ?>
        <div>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <ul>
                    <?php foreach ($editData['data'][0] as $key => $value): ?>
                        <?php if ( $key != "brouwernr" ): ?>
                            <li>
                                <label for="<?= $key ?>"><?= $key ?></label>
                                <input type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
                <input type="hidden" value="<?= $editData['data'][0]['brouwernr'] ?>" name="brouwernr">
                <input type="submit" name="edit" value="Wijzigen">
            </form>
        </div>
    <?php endif ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <?php if($deleteConfirm):?>
            <div>
                <button type="submit" name="sure" value="<?= $deleteID ?>">
                    Ja!
                </button>
                <button type="submit">
                    Néééééé!
                </button>
            </div>
        <?php endif ?>
    </form>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <table>
            <thead>
                <tr>
                    <?php foreach($kolomnaam as $value):?>
                        <th>
                            <?=$value ?>
                        </th>
                    <?php endforeach?>
               </tr>
            </thead>
            <tbody>
                <?php foreach ($viewTable as $key => $brouwer): ?>
                    <tr class=" <?= ( $brouwer['brouwernr'] === $deleteID ) ? 'delete' : ''  ?> ">
                        <?php foreach ($brouwer as $value): ?>
                            <td>
                                <?= $value ?>
                            </td>
                        <?php endforeach ?>
                        <td> 
                            <button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>">
                                <img src="icon-delete.png" alt="Delete button">
                            </button> 
                            <button type="submit" name="edit" value="<?= $brouwer['brouwernr'] ?>">
                                <img src="icon-edit.png" alt="Edit button">
                            </button> 
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
</body>
</html>