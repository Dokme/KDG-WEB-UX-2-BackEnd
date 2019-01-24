<?php
    session_start();
    
    $message = false;
    $task = "";
    $logoutOption = false;
    $tasks = [];

    try {
        //connect to db
        $db = mysqli_connect('localhost', 'root', '', 'todo');

        //edit completed tasks

        //get all tasks from database
        $tasks = mysqli_query($db, "SELECT * FROM tasks WHERE done=1");
        
    } catch (PDOException $e) {
        $message['type'] = "error";
        $message['text'] = "Fout opgetreden. Waarschijnlijk is de connectie met de database mislukt.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>To Do - Archive</title>
</head>
<body>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <span class="navbar-brand mb-0 h1">To Do</span>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="archive.php">Archive</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="form-inline my-2 my-lg-0 navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12 text-center">

                        <h2 class="h2">To Do - PHP/MySQL</h2>
                        <p class="lead">Archive of completed tasks.</p>

                        <?php if ( $message ): ?>
                            <div class="<?= $message["type"] ?>">
                                <?= $message['text'] ?>
                            </div>
                        <?php endif ?>

                        <table class="table col-5 container mt-5 table-condensed table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Task</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while ($row = mysqli_fetch_array($tasks)): ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td class="task"><?php echo $row['task'] ?></td>
                                        <td class="edit" style="font-size: 0.8rem;">
                                            <a href=""><i class="fas fa-pen-square fa-2x"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++; endwhile; mysqli_close($db); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>