    <section class="main">
        <div>
            <h1><?php echo $titel_action; ?></h1>
            <div>
                <?php
                    if (isset($msg)) {
                        echo '<div class="alert">';
                        echo $msg;
                        echo '</div>';
                    }
                ?>

                <form action="<?php echo $form_action; ?>" method="POST">
                    <div>
                        <label for="titel">Titel</label>
                        <input type="text" id="titel" name="titel" value="<?php echo (isset($titel)) ? $titel : ""; ?>">
                    </div>
                    <div>
                        <label for="inhoud">Inhoud</label>
                        <textarea name="inhoud" id="inhoud" rows="10"><?php echo (isset($inhoud)) ? $inhoud : ""; ?></textarea>
                    </div>
                    <div>
                        <label for="titel">Kernwoorden</label>
                        <input type="text" id="kernwoorden" name="kernwoorden" value="<?php echo (isset($kernwoorden)) ? $kernwoorden : ""; ?>">
                    </div>
                    <button type="submit" name="submit">Artikel opslaan</button>
                </form>
            </div>
        </div>
    </section>