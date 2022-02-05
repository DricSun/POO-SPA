
<?php
require_once 'admin.php';
require_once 'sql_function.php';
require_once 'user.php';

session_start();
$connect = new connect();
$sql_obj = new sql_function($connect);
if (isset($_SESSION['user'])){
$userinfo = $sql_obj->GetUser($_SESSION['user']);
if ($userinfo['admin'] == 1) {
$user = new admin($userinfo['email'], $userinfo['password'], $userinfo['first_name'], $userinfo['last_name'], $userinfo['id']);
} else {
header('location: index.php');
}
}

$usersinfo = $sql_obj->GetAllUsers();

$users = array();

foreach ($usersinfo as $userinfo){
    $user = new user($userinfo['email'], $userinfo['password'], $userinfo['first_name'], $userinfo['last_name'], $userinfo['id']);

    $animals = $sql_obj->SelectAnimalsFromIdOwner($user->getId());

    foreach ($animals as $animal){
        $pet = new pet($animal['type'], $animal['name'], $animal['id_owner'], $animal['id']);
        $user->AddAnimal($pet);
    }
    array_push($users, $user);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPA</title>
</head>
<body>

<div>
<?php


foreach ($users as  $user){
    echo '<br>'.$user->getId(). ' '. $user->getFirstName().' '.$user->getLastName();
    foreach ($user->getAnimals() as $pet) {

        echo $pet->getName() . ' ' . $pet->getType();
        echo "<a href='user_view.php?id_animal=" . $pet->getIdAnimal() . "'>Supprimer l'animal</a><br><br>";
    }
}


    ?>
</div>

</body>
</html>


