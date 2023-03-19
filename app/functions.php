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
    return  '<pre>' . die(var_dump($data)) . '</pre>';
}

function displayError($array, $index)
{

    $html = "";
    if (isset($array[$index])) {
        $html .= $array[$index];
    }

    return $html;
}

function checkFieldWithEmptyData($index)
{
    return (isset($_POST[$index]) && !empty($_POST[$index]) && trim($_POST[$index])) ? true : false;
}

function checkField($index)
{
    return (isset($_POST[$index]) ? true : false);
}

function checkLength($variable, $length)
{
    return (strlen($variable) >= $length) ? true : false;
}

function checkInteger($variable)
{
    return (is_numeric($variable) && $variable > 0) ? true : false;
}
