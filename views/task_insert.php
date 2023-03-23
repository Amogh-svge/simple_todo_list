<?php

require "../app/connection.php";
require "../controller/TaskController.php";

$task = new TaskController($pdo);
$error = [];

if ($_REQUEST['action'] == 'insert-task') {
    checkFieldWithEmptyData('task_title') ? $task_title = $_POST['task_title'] : $error['task_title'] = 'Enter Task Title';
    checkFieldWithEmptyData('task_description') ? $task_description = $_POST['task_description'] : $error['task_description'] = 'Enter Task Description';
    checkFieldWithEmptyData('due_date') ?  $due_date = $_POST['due_date'] : $error['due_date'] = 'Select Due Date';
    checkFieldWithEmptyData('task_status') ? $task_status = $_POST['task_status'] : $error['task_status'] = 'Select Task Status';
    checkFieldWithEmptyData('category_id') ? $category_id = $_POST['category_id'] : $error['category_id'] = 'Select Category';


    if (count($error) == 0) {

        $task->create([
            'task_title' =>  htmlspecialchars(strip_tags($_POST['task_title'])),
            'task_description' => htmlspecialchars($_POST['task_description']),
            'due_date' => $_POST['due_date'],
            'task_status' => $_POST['task_status'],
            'category_id' => $_POST['category_id'],
        ]);
        echo json_encode([
            'status' => '200',
            'message' => 'Successfully Added Task',
        ]);
    } else {
        echo json_encode([
            'status' => '500',
            'message' => 'Failed To Add Task'
        ]);
    }
}
