<?php

require "../app/connection.php";
require "../controller/TaskController.php";

$task = new TaskController($pdo);

echo json_encode($task->retrieve());
