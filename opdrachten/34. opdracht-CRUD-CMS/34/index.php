<?php
    include('./classes/DB.php');
    include('./classes/Helpers.php');
    include('./classes/Articles.php');

    session_start();

    if (!isset($_SESSION['logged_in'])) {
        if (isset($_POST['submit'])) {
            if ($_POST['email'] == 'test@test.be' && $_POST['password'] == 'testtest') {
                $_SESSION['logged_in'] = 1;
            } else {
                $msg = 'Wrong login and/or password.';
                include('./pages/login.php');
            }
        }
        if (!isset($_POST['submit'])) {
            include('./pages/login.php');
        }
    }

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
        if (isset($_GET['logout']) && $_GET['logout'] == 1) {
            session_destroy();
            header('location: index.php');
        }

        if (isset ($_GET['page'])) {
            $page = $_GET['page'];
        }

        if (!isset($_GET['page'])) {
            $page = 'home';
        }

        include('./templates/header.php');

        switch($page) {
            case 'add': {
                include('./pages/add_article.php');
            } break;

            default: {
                include('./pages/home.php');
            }
        }

        include('./templates/footer.php');
    }
?>