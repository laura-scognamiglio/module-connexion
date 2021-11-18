<?php
 session_start();
// require('inscription.php');
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
mysqli_set_charset($bdd, 'utf8');

$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);


$login_rqst = mysqli_query($bdd, "SELECT `login`, `password` FROM `utilisateurs` WHERE `login` = '$login'" );
$login_password = mysqli_query($bdd, "SELECT  `password` FROM `utilisateurs` WHERE `login` = '$login'" );
$result = mysqli_fetch_all($login_rqst);
$result_password = mysqli_fetch_all($login_password);
echo '<pre>';
var_dump($result_password);
echo '</pre>';

if(!empty($result) && isset($result)){
    if($login === "admin" && $password === "admin" ){
        echo "vs etes l'admin";
    }else{

    
        if(password_verify($password, $result_password[0][0])){
            echo "verified";
        
            $_SESSION['login'] = $login;
            
            // header('Location:index.php');
        }else{
            echo "vos indentifiants sont incorrects";
        }
    }
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
        <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="login" name="login" class="form-control" placeholder="Login" required="required" autocomplete="on">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="on">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
        </div>
        </section>
    </main>
</body>
</html>