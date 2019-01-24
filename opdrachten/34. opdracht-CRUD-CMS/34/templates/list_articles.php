<div class="main">
    <?php
        if (isset($msg)) {
            echo '<div class="alert">';
            echo $msg;
            echo '</div>';
        }
    ?>

    <div>
        <div>
            <div>
                <div><h2>Artikels</h2></div>
                <div><a href="index.php?page=add">Add new</a></div>
            </div>  
        </div>
        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Inhoud</th>
                    <th>Kernwoorden</th>
                    <th>Datum</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($artikels as $artikel) {
                ?>
                <tr>
                    <td><?php echo substr($artikel['titel'], 0, 15); ?></td>
                    <td><?php echo substr($artikel['inhoud'], 0, 15); ?></td>
                    <td><?php echo substr($artikel['kernwoorden'], 0, 15); ?></td>
                    <td><?php echo substr($artikel['datum']); ?></td>
                    <td>
                        <a href="?page=home&action=edit&id=<?php echo $artikel['id']; ?>" title="Edit">Edit</a>
                        <a href="?page=home&action=delete&id=<?php echo $artikel['id']; ?>" title="Delete">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>