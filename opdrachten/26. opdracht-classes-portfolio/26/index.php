<?php 
    function __autoload($className) {
        include_once 'classes/' . $className . '.php'; 
    }

    $body = (isset($_GET['page'])? $_GET['page'] : 'body');

    $page = new HTMLBuilder("header", $body, "footer");
?>