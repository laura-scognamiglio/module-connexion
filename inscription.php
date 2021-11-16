<?php

$bdd = mysqli_connect("localhost","root","root","moduleconnexion");

// $users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
mysqli_set_charset($bdd, 'utf8');

// require('index.php');

if(isset($_POST['name']) 
&& isset($_POST['surname']) 
&& isset($_POST['login']) 
&& isset($_POST['password']))
// && isset($_POST['submit']));
{
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $passwordconfirm = htmlspecialchars($_POST['passwordconfirm']);

    if($password == $passwordconfirm){
        $add_user = mysqli_query($bdd,"INSERT INTO `utilisateurs`( login, prenom, nom, password) VALUES ('$name','$surname','$login','$password')");
        header('Location:connexion.php');
    }
    

    
        // if(empty(trim($_POST['name']))){
        //     $name_err = "veuillez entrer votre prénom";

        // } else {
        //     $sql = "SELECT id FROM `utilisateurs` WHERE prenom = ?";
        //     if($stmt = mysqli_prepare($requete, $sql)){
        //         mysqli_stmt_bind_param($stmt, "s", $param_name);
        //         $param_name = trim($_POST['name']);
        //     }
        // }   
        // if(empty(trim($_POST['surname'
        //     $surname_err = "veuillez entrer votre nom";

        // } else {
        //     $sql = "SELECT id FROM `utilisateurs` WHERE nom = ?";
        // }   


        
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
</head>
<body>
    <header> 
       
    </header>

    <main>
    <section class= connect_form>
        <form action="inscription.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="name" name="name" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="surname" name="surname" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="login" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="passwordconfirm" class="form-control" placeholder="Confimer le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name= "submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
        </div>
        </section>
    </main>
</body>
</html>