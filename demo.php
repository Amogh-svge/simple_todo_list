<?php

require "./app/connection.php";
require "controller/TaskController.php";
require "controller/CategoryController.php";

$category = new CategoryController($pdo); //connection
$task = new TaskController($pdo);
?>

<pre>

<?php

if (isset($_REQUEST['add_task'])) {
    // echo $task_title = $_POST['task_title'] . "<br>";
    // echo $task_description = $_POST['task_description'] . "<br>";
    // echo $due_date = $_POST['due_date'] . "<br>";
    // echo $task_status = $_POST['task_status'] . "<br>";
    // echo $category_id = $_POST['category_id'] . "<br>";

    $error = [];

    checkFieldWithEmptyData('task_title') ? $task_title = $_POST['task_title'] : $error['task_title'] = 'Enter Task Title';
    checkFieldWithEmptyData('task_description') ? $task_description = $_POST['task_description'] : $error['task_description'] = 'Enter Task Description';
    checkFieldWithEmptyData('due_date') ?  $due_date = $_POST['due_date'] : $error['due_date'] = 'Select Due Date';
    checkFieldWithEmptyData('task_status') ? $task_status = $_POST['task_status'] : $error['task_status'] = 'Select Task Status';
    checkFieldWithEmptyData('category_id') ? $category_id = $_POST['category_id'] : $error['category_id'] = 'Select Category';

    $inputs = [
        'task_title' => $_POST['task_title'],
        'task_description' => $_POST['task_description'],
        'due_date' => $_POST['due_date'],
        'task_status' => $_POST['task_status'],
        'category_id' => $_POST['category_id'],
    ];

    if (count($error) == 0) {
        dd($inputs);
        $task->create($inputs);
    } else {
        echo "error found";
    }
}

?>
   
</pre>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <div class="form_rows">
            <label for="" class="form_label">Task Title</label>
            <input type="text" name="task_title" id="">
            <?= displayError($error, 'task_title') ?>
        </div>
        <div class="form_rows">
            <label for="" class="form_label">Description</label>
            <textarea name="task_description" id="" cols="30" rows="10"></textarea>
            <?= displayError($error, 'task_description') ?>
        </div>
        <div class="form_rows">
            <label for="" class="form_label">Due Date</label>
            <input type="datetime-local" name="due_date" id="">
            <?= displayError($error, 'due_date') ?>
        </div>
        <div class="form_rows">
            <label for="" class="form_label">Category</label>
            <select name="category_id" id="">
                <option value="">Select Category</option>
                <option value="1">Work</option>
            </select>
            <?= displayError($error, 'category_id') ?>
        </div>
        <div class="form_rows">
            <label for="" class="form_label">Task Status</label>
            <div>
                <input type="radio" id="Complete" name="task_status" value="Complete">
                <label for="Complete">Complete</label><br>
                <input type="radio" id="Incomplete" name="task_status" checked value="Incomplete">
                <label for="Incomplete">Incomplete</label><br>
            </div>
        </div>
        <div class="form_rows">
            <input type="submit" value="Submit" name="add_task">
        </div>

    </form>
</body>

</html>