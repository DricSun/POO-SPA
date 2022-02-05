<?php

require_once 'admin.php';
require_once 'sql_function.php';
require_once 'user.php';

if (isset($_POST['email']) && isset($_POST['password'])){
    $connect = new connect();
    $sql_obj = new sql_function($connect);
    $verif =  $sql_obj->VerifyUser($_POST['email'], $_POST['password']);
    if ($verif){
        $userinfo = $sql_obj->GetUser($_POST['email']);
        if ($userinfo['admin'] == 0){
            session_start();
            $user = new user($userinfo['email'], $userinfo['password'], $userinfo['first_name'], $userinfo['last_name'], $userinfo['id']);
        }else{
            session_start();
            $user = new admin($userinfo['email'], $userinfo['password'], $userinfo['first_name'], $userinfo['last_name'], $userinfo['id']);
        }
        $_SESSION['user'] = $_POST['email'];
        $user->Redirect();
    }else{
        echo 'Veuillez renseignez les bon champs :)';
    }
}
else{
    header('location : index.php');
}









