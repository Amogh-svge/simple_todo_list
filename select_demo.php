<?php

require "./app/functions.php";
require "./app/connection.php";
require "controller/TaskController.php";
require "controller/CategoryController.php";


$category = new CategoryController($pdo);
?>
<pre>
    <?php
    dd($category->retrieve());
    ?>
</pre>