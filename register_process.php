<?php
require_once 'user.php';
require_once 'sql_function.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])){
    $connect = new connect();
    $sql_obj = new sql_function($connect);
    $sql_obj->InsertUser($_POST['email'], $_POST['password'], $_POST['last_name'], $_POST['first_name']);
    session_start();
    $userinfo = $sql_obj->GetUser($_POST['email']);
    $_SESSION['user'] = $userinfo['email']; 
    $user = new user($userinfo['email'], $userinfo['password'], $userinfo['first_name'], $userinfo['last_name'], $userinfo['id']);
    $user->Redirect();
}