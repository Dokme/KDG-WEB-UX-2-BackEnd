<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="./resources/style.css">
</head>
<body>
    <header>
        <nav>
            <div>
                <ul>
                    <li>
                        <a class="<?php echo Helpers::getActive($page, 'home'); ?>" href="?page=home">Home</a>
                    </li>
                    <li>
                        <a class="<?php echo Helpers::getActive($page, 'add'); ?>" href="?page=add">Artikel toevoegen</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>