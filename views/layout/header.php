<?php
require "../app/connection.php";
require "../controller/TaskController.php";
require "../controller/CategoryController.php";

$category = new CategoryController($pdo); //connection
$task = new TaskController($pdo);
$allcategories = $category->retrieve();

date_default_timezone_set("Asia/Kathmandu");
?>


<html>

<head>
    <link rel="stylesheet" href="../css/main.css" />
    <meta charset="UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <main>

        <div class="message" id="message" style="display:none;">
        </div>

        <div class="container">
            <div class="sidebar">
                <div class="sidebar-small">
                    <div class="sidebar_logo">
                        <a href="index.php">
                            <img src="../images/cloudy.png" alt="" class="sidebar_logo-img" />
                        </a>
                    </div>
                </div>
                <div class="sidebar-extended">
                    <span class="main_logo">
                        <h3><a href="index.php">Todos</a></h3>
                    </span>
                    <div class="card card-light-black my-1">
                        <p>

                            Add your tasks.<br>
                            Organize your life.<br>
                            Achieve more every day.<br>
                            TodoList for your
                            work and life.
                            <br>
                        </p>
                    </div>
                    <div class="accordion" id="">
                        <div class="accordion_title">
                            Category <i class="fa-solid fa-caret-down"></i>
                        </div>

                        <ul class="accordion_items">
                            <?php foreach ($allcategories as $category) : ?>
                                <li class="accordion_item"><a href="task_category.php?id=<?= $category['id'] ?>"><?= $category['category_name']; ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="accordion">
                        <div class="accordion_title">
                            Todo-Status <i class="fa-solid fa-caret-down"></i>
                        </div>

                        <ul class="accordion_items">
                            <li class="accordion_item"><a href="todo_status.php?status=<?= 'Complete' ?>">Completed</a></li>

                        </ul>
                    </div>
                </div>
            </div>