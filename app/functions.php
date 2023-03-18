<?php

//connect TO DB
function connectDB($db_name, $user, $password)
{
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=$db_name", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $e) {
        die('Could not connect');
    }
}


function dd($data)
{
    return $die_and_dump =  "<pre>" . die(var_dump($data)) . "<pre>";
}
