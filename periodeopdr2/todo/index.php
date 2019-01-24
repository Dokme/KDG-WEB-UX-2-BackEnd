<?php
    session_start();

    include('server.php');
    
    $message = false;
    $task = "";
    // $logoutOption = false;
    $tasks = [];

    if (!isset($_COOKIE['authenticated'])) {
        $_SESSION["errorlogin"] = "You have to login first.";
        header("Location: login.php");
    }

    // if(isset($_POST['submit-login'])) {
    //     if (checkValuesInDB($_POST['name'], $password)) {
    //         $logoutOption = true;
    //     } elseif (!checkValuesInDB($_POST['name'], $password)) {
    //         $logoutOption = false;
    //         header("Location: login-form.php");
    //     }
    // }

    // function checkValuesInDB($name, $password) {
    //     $correctValues   = false;
        
    //     $connectDB       = mysqli_connect('localhost', 'root', '', 'todo');
        
    //     $nameCheckQuery = 'SELECT password FROM `users` WHERE name= :name';
    //     $nameCheck      = $connection->prepare($nameCheckQuery);
    //     $nameCheck->bindValue(':name', $name);
    //     $nameCheck->execute();
    // }

    // if (empty($_SESSION['username'])) {
    //     header('location: login.php');
    // }

    try {
        //connect to db
        $db = mysqli_connect('localhost', 'root', '', 'todo');

        //post new items to database
        if (isset($_POST['submit'])) {
            $task = $_POST['task'];

            if (empty($task)) {
                $message['type'] = "error";
                $message['text'] = "You must fill in a task first.";
            } else {
                mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
                
                header('location: index.php');
            }
        }

        //delete tasks
        if (isset($_GET['del_task'])) {
            $id = $_GET['del_task'];

            mysqli_query($db, "DELETE FROM tasks WHERE id=$id");

            header('location: index.php');
        }

        //move completed tasks
        if (isset($_GET['move_task'])) {
            $id = $_GET['move_task'];

            mysqli_query($db, "UPDATE tasks SET done = 1 WHERE id=$id");

            header('location: index.php');
        }

        //get all tasks from database
        $tasks = mysqli_query($db, "SELECT * FROM tasks WHERE done=0");
        
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

    <title>To Do - Tasks</title>

    <style>
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 2em;
        }
    </style>
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
                                <a class="nav-link active" href="index.php">Home</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="archive.php">Archive</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="form-inline my-2 my-lg-0 navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?logout=true">Log out</a>
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
                        <p class="lead">Welcome, add your tasks in the list below!</p>

                        <?php if ( $message ): ?>
                            <div class="<?= $message["type"] ?>">
                                <?= $message['text'] ?>
                            </div>
                        <?php endif ?>

                        <form action="index.php" method="POST" class="form-inline">
                            <div class="mx-auto form-inline">
                                <div class="form-group mr-sm-3 mb-2 inputfield">
                                    <input type="text" name="task" class="form-control col-12" placeholder="I have to...">
                                </div>
                                <button type="submit" name="submit"class="btn btn-primary mb-2">Add</button>
                            </div>
                        </form>

                        <table class="table col-5 container mt-5 table-condensed table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="">#</th>
                                    <th scope="col" class="">Task</th>
                                    <th scope="col" class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while ($row = mysqli_fetch_array($tasks)): ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td class="task"><?php echo $row['task'] ?></td>
                                        <td class="delete edit move" style="font-size: 0.8rem;">
                                            <a href="index.php?move_task=<?php echo $row ['id']; ?>"><i class="fas fa-check-square fa-2x"></i></a>
                                            <a href=""><i class="fas fa-pen-square fa-2x"></i></a>
                                            <a href="index.php?del_task=<?php echo $row ['id']; ?>"><i class="fas fa-minus-square fa-2x"></i></a>
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