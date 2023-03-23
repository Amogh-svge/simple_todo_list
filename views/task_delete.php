<?php

require "../app/connection.php";
require "../controller/TaskController.php";

$task = new TaskController($pdo);
// $id = $_GET['id'];
// if ($id) $task->delete($id);
// else
//     echo "Task deletion failed";


if ($_POST['method'] == 'DELETE') {
    $id = $_POST['id'];
    $task->delete($id);
}
