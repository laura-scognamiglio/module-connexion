<?php
/**
 * connexion a la base de donnée et inclus la navbar. 
 */
 include('navbar.php');
$bdd = mysqli_connect("localhost","laura-scog","Mcrlow1708","laura-scognamiglio_moduleconnexion");
mysqli_set_charset($bdd, 'utf8');


/**
 * regarde si tous les champs sont remplis puis non vides et evite les caractères spéciaux ainsi que les espaces en début et fin de phrases.
 */


if(isset($_POST['name']) && !empty($_POST['name']) 
&& isset($_POST['surname']) && !empty($_POST['surname'])
&& isset($_POST['login']) && !empty($_POST['login']) 
&& isset($_POST['password']) && !empty($_POST['password'])
&& (isset($_POST['submit'])))

{
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    $passwordconfirm = htmlspecialchars(trim($_POST['passwordconfirm']));
    $login_rqst = mysqli_query($bdd, "SELECT `login` FROM `utilisateurs` WHERE `login` = '$login'" );
    $login_exist = mysqli_fetch_assoc($login_rqst);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Welcome</title>
</head>
<body class="inscBody">
    <header> 
       
    </header>

    <main>
    <section class= connect_form>
        <form class= "form" action="inscription.php" method="post">
            <h2 class="text-center">INscr*pt*on</h2>
                <?php
                
/**
 * s'assure que tous les chanps sont bien remplis et proccède aux comparage de login existant dans la base de données
 */
                    
                     if(empty($login) || (empty($name) || (empty($surname) ||(empty($password)  )))){

                    echo ('<p class="text-error">A field is empty</p>');
                    }
                    elseif(($login) === ($login_exist["login"])){ 

                    echo ('<p class="text-error">login alredy used</p>');
       
/**
 * compare les mots de passe et vérifie leur correspondance, password_hash permet de sécuriser le mdp dans la base de données.
 */
                    } elseif($password == $passwordconfirm){

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $add_user = mysqli_query($bdd,"INSERT INTO `utilisateurs`( login, prenom, nom, password) VALUES ('$name','$surname','$login','$hashed_password')");
                    echo ('<p class="text-error">Sucsess</p>');
                    header('Location:connexion.php'); 
                    }
        
    
                ?>
                
                <div class="form-group">
                    <input type="name" name="name" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="surname" name="surname" class="form-control" placeholder="Nom"  autocomplete="on">
                </div>
                <div class="form-group">
                    <input type="login" name="login" class="form-control" placeholder="Login"  autocomplete="on">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="on">
                </div>
                <div class="form-group">
                    <input type="password" name="passwordconfirm" class="form-control" placeholder="Confimer le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name= "submit" class="btn btn-primary btn-block">DONE</button>
                </div>   
            </form>
        </div>
        </section>
        <section class="inscripic">
            <img class="villaDessus" src="assets/bulleDessus.png" alt="plan d'origine de la villa">
        </section>
    </main>
</body>
</html>