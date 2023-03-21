<?php

require "./app/functions.php";

class Controller
{
    public $pdo;

    function __construct()
    {
        $this->pdo = connectDB('proshore_todolist', 'root', '');
    }
}
