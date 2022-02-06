

<?php

require_once 'user.php';
require_once 'sql_function.php';


session_start();
$connect = new connect();
$sql_obj = new sql_function($connect);
if(isset($_GET['id_animal'])){
    $sql_obj->DeleteAnimal($_GET['id_animal']);
}
if (isset($_SESSION['user'])){
    $userinfo = $sql_obj->GetUser($_SESSION['user']);
    if ($userinfo['admin'] == 0) {
        $user = new user($userinfo['email'], $userinfo['password'], $userinfo['first_name'], $userinfo['last_name'], $userinfo['id']);
    } else {
        header('location: index.php');
    }
}

$animals = $sql_obj->SelectAnimalsFromIdOwner($user->getId());

foreach ($animals as $animal){
    $pet = new pet($animal['type'], $animal['name'], $animal['id_owner'], $animal['id']);
    $user->AddAnimal($pet);
}
if(isset($_POST['name']) && isset($_POST['type'])){
    $pet = $sql_obj->AddAnimal($_POST['name'], $_POST['type'], $user->getId());
    $user->AddAnimal($pet);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>SPA</title>
</head>
<body class="userbody">

<h2>Ajouter votre petit compagnon</h2>

<form method="post" action="user_view.php">
    <label>Nom de l'animal</label>
    <input type="text" name="name">
    <label>Type de l'animal</label>
    <input type="text" name="type">
    <div class="align">
    <input type="submit" value="Ajouter un animal">
    </div>
</form>

<div class="pet">
    <?php foreach ($user->getAnimals() as $pet){

        echo $pet->getName().' '.$pet->getType();
        echo "<a href='user_view.php?id_animal=". $pet->getIdAnimal(). "'>Supprimer l'animal</a><br><br>";


    } ?>


</div>


</body>
</html>



