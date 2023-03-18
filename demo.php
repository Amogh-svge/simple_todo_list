<?php

require "controller/CategoryController.php";
$task = new CategoryController();

?>

<pre>

<?php
$inputs = [
    'category_name' => 'JOB',
    'category_status' => 'inactive',
    'created_date' =>  date('Y-m-d H:i:s')
];

$task->update($inputs, 2);

?>
   
</pre>