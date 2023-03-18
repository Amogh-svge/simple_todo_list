<?php

require "Controller.php";



class CategoryController extends Controller
{

    // public $category_name, $category_status, $created_date;

    public function create()
    {
        $current_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO categories (category_name,category_status,created_date) values ('Fun','active','$current_date')";
        $connection = new Controller();
        $result = $connection->pdo->exec($sql);

        echo $result ? "Task Added successfully" : "Failed to add Task";
    }

    public function retrieve()
    {
    }

    public function update($inputs, $id)
    {
        $sql = "UPDATE categories SET category_name = '$inputs[category_name]', category_status = '$inputs[category_status]', created_date = '$inputs[created_date]' WHERE id=$id";

        $connection = new Controller();
        $result = $connection->pdo->exec($sql);

        echo $result ? "Task Updated successfully" : "Failed to Update Task";

        // if (count($err) == 0) {
        //     // database connection
        //     //sql to insert data into table
        //     $sql = "UPDATE reservation SET f_name=  '$firstname',l_name='$lastname' ,num_guests= '$number_of_guests' ,num_tables= '$number_of_tables' ,rdate =  '$registered_date',time_zone =  '$time_zone' ,telephone =' $telephone_number',comment =  '$message' ,reg_date =  '$registration_date',user_fk = '28' WHERE reserv_id=$id";

        //     //execute query
        //     $connection->query($sql);
        //     if ($connection->affected_rows == 1) {
        //         header('location:viewtable.php');
        //     } else {
        //         echo $err['error'] =  'Database error';
        //     }
        // }
    }
    public function delete()
    {
    }
}
