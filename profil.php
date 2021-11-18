<?php
session_start();
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
mysqli_set_charset($bdd, 'utf8');



if(isset($_POST['valider'])){
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $passwordconfirm = htmlspecialchars($_POST['passwordconfirm']);

    if((!empty($name)) && !empty($surname) && !empty($login) && !empty($password)){
        $update = mysqli_query("UPDATE `utilisateurs` SET `login`='$login',`prenom`='$name',`nom`='$surname',`password`='$password' WHERE 1");
    }
}
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <section class= connect_form>
        <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <label for="name">Nouveau prénom:</label><br>
                    <input type="name" name="name" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="surname">Nouveau nom:</label><br>
                    <input type="surname" name="surname" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="login">Nouveau login:</label><br>
                    <input type="login" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="login">Nouveau password:</label><br>
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="login">Confirmer le password:</label><br>
                    <input type="passwordconfirm" name="passwordconfirm" class="form-control" placeholder="Confimer le nouveau mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name= "valider" class="btn btn-primary btn-block">Valider</button>
                </div>   
            </form>
        </div>
        </section>
    </main>
</body>
</html>