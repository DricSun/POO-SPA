<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPA</title>
</head>
<body>

<form id="inscription" method="post" action="register_process.php">
    <label>First Name</label>
    <input type="text" name="first_name">
    <label>Last Name</label>
    <input type="text" name="last_name">
    <label>Email</label>
    <input type="text" name="email">
    <label>Password</label>
    <input type="password" name="password">
    <input type="submit" value="Inscription">

</form>


<form id="connexion" method="post" action="login_process.php" style="display: none">
    <label>Email</label>
    <input type="text" name="email">
    <label>Password</label>
    <input type="password" name="password">
    <input type="submit" value="Connexion">
</form>

<button id="switch_register" style="display: none">S'inscrire</button>
<button id="switch_connexion">Se Connecter</button>

<?php





?>

<script>

    const inscriptionForm = document.getElementById('inscription')
    const connexionForm = document.getElementById('connexion')
    const switch_register = document.getElementById('switch_register')
    const switch_connexion = document.getElementById('switch_connexion')

    switch_register.addEventListener('click' , ()=>{
        connexionForm.style.display ='none';
        inscriptionForm.style.display ='flex';
        switch_connexion.style.display ='flex'
        switch_register.style.display ='none'
    })

    switch_connexion.addEventListener('click', ()=>{
        connexionForm.style.display ='flex';
        inscriptionForm.style.display ='none';
        switch_connexion.style.display ='none';
        switch_register.style.display ='flex';
    })



</script>



</body>
</html>


