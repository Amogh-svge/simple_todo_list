<?php

require "../app/connection.php";
require "../controller/TaskController.php";

$task = new TaskController($pdo);

$id = $_GET['id'];
if ($id) $task->isComplete($id);
else
    echo "Task Complete Update failed";
