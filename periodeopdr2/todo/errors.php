<?php if (count($arrayErrors) > 0): ?>
    <div class="error">
        <?php foreach ($arrayErrors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>