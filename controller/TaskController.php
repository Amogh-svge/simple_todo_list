<?php


class TaskController
{
    public $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($inputs)
    {
        $current_date = date('Y-m-d H:i:s');
        $converted_date = date('Y-m-d H:i:s', strtotime($inputs['due_date']));

        $sql = "INSERT INTO tasks (task_title,task_description,due_date,task_status,category_id,created_date,updated_date) values 
        ('$inputs[task_title]','$inputs[task_description]','$converted_date','$inputs[task_status]','$inputs[category_id]','$current_date',null)";

        $result = $this->pdo->exec($sql);
        if ($result)
            header("location:index.php");
    }

    public function retrieve()
    {
        $sql = "SELECT * FROM tasks";
        $tasks = $this->pdo->query($sql);
        return $tasks->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($inputs, $id)
    {
        $sql = "UPDATE tasks SET task_title = '$inputs[task_title]', 
        task_description = '$inputs[task_description]', due_date = '$inputs[due_date]', 
        task_status = '$inputs[task_status]', category_id = '$inputs[category_id]',created_date = '$inputs[created_date]',updated_date = '$inputs[updated_date]',
        WHERE id=$id";

        $result = $this->pdo->exec($sql);

        echo $result ? "Task Updated successfully" : "Failed to Update Task";
    }


    public function delete($id)
    {
        $sql = "DELETE FROM tasks where id = '$id' ";
        $deleted = $this->pdo->exec($sql);

        if ($deleted)
            header("location: {$_SERVER['HTTP_REFERER']}");
    }

    public function taskListByStatus($status)
    {
        $sql = "SELECT * FROM tasks where task_status = '$status'";
        $tasks = $this->pdo->query($sql);
        return $tasks->fetchAll(PDO::FETCH_ASSOC);
    }

    public function taskListByCategory($id)
    {
        $sql = "SELECT * FROM tasks where category_id = '$id'";
        $tasks = $this->pdo->query($sql);
        return $tasks->fetchAll(PDO::FETCH_ASSOC);
    }
}
