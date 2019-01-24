<?php
    $action = (isset($_GET['action'])) ? $_GET['action'] : '';

    switch ($action) {
        case 'edit': {
            $id = $_GET['id'];

            if (isset($_POST['submit'])) {
                Articles::update($id, $_POST['titel'], $_POST['inhoud'], $_POST['kerwoorden']);
                $msg = "Artikel is aangepast.";
            }

            $artikel      = Articles::getOne($id);

            $titel_action = 'Artikel is aangepast.';
            $form_action  = 'index.php?page=home&action=edit&id='. $id;

            $titel        = $artikel['titel'];
            $inhoud       = $artikel['inhoud'];
            $kernwoorden  = $artikel['kernwoorden'];

            include('./templates/article_form.php');
        } break;

        case 'delete': {
            Articles::delete($_GET['id']);

            $msg      = "Artikel is verwijderd.";
            $artikels = Articles::get();

            include('./templates/list_articles.php');
        } break;

        default: {
            $artikels = Articles::get();

            include('./templates/list_articles.php');
        }
    }
?>