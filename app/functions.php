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
    return $die_and_dump = '<pre>' . die(var_dump($data)) . '</pre>';
}

function displayError($array, $index)
{

    $html = '<span class="text-danger">';
    if (isset($array[$index])) {
        $html .= $array[$index];
    }
    $html .= '</span>';
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


function checkSession()
{
    @session_start();
    if (!isset($_SESSION['username'])) {
        session_destroy();
        header('location:14.login.php?msg=1');
    }
}

function checkSessionTimeout()
{
    @session_start();
    if (isset($_SESSION['expire_time']) && time() < $_SESSION['expire_time']) {
        $_SESSION['expire_time'] = time() + 600;
    } else {
        unset($_SESSION['username']);
        session_destroy();
        header('location:14.login.php?msg=2', true);
    }
}

function checkSession1()
{
    @session_start();
    if (!isset($_SESSION['username'])) {
        session_destroy();
        header('location:16.database_login.php?msg=1');
    }
}

function checkSessionTimeout1()
{
    @session_start();
    if (isset($_SESSION['expire_time']) && time() < $_SESSION['expire_time']) {
        $_SESSION['expire_time'] = time() + 600;
    } else {
        unset($_SESSION['username']);
        session_destroy();
        header('location:16.database_login.php?msg=2', true);
    }
}
