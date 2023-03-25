<?php

require "../app/connection.php";
require "../controller/TaskController.php";

$task = new TaskController($pdo);



if ($_REQUEST['action'] == 'task-delete-by-id') {
    $id = $_POST['id'];

    $deleted = $task->delete($id);
    // if ($deleted) {
    //     echo json_encode([
    //         'status' => '200',
    //         'message' => 'Task Successfully Deleted',
    //     ]);
    //     exit;
    // } else {
    //     echo json_encode([
    //         'status' => '500',
    //         'message' => 'Failed To Delete Task',
    //     ]);
    //     exit;
    // }
}
