<?php
    $titel_action = 'Artikel toevoegen';
    $form_action  = 'index.php?page=add';

    if (!isset($_POST['submit'])) {
        include('./templates/article_form.php');
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['titel']) || empty($_POST['inhoud']) || empty($_POST['kernwoorden'])) {
            $msg         = "Vul alle velden in aub.";

            $titel       = $_POST['titel'];
            $inhoud      = $_POST['inhoud'];
            $kernwoorden = $_POST['kernwoorden'];

            include('./templates/article_form.php');
        }

        if (!empty($_POST['titel']) && !empty($_POST['inhoud']) && !empty($_POST['kernwoorden'])) {
            if (Articles::add($_POST['titel'], $_POST['inhoud'], $_POST['kernwoorden'])) {
                $msg = 'Artikel toegevoegd';

                include('./templates/article_form.php');
            }
        }
    }
?>