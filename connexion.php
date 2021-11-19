<?php
 session_start();
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
mysqli_set_charset($bdd, 'utf8');

$login = htmlspecialchars(trim($_POST['login']));
$password = htmlspecialchars(trim($_POST['password']));


$query = mysqli_query($bdd,"SELECT * FROM `utilisateurs` WHERE `login`= '$login' ");
$result = mysqli_fetch_assoc($query);


echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

if(!empty($result) && isset($result)){
   
        if(password_verify($password, $result['password'])){
            if($login === "admin" ){
            echo "vs etes l'admin";
            $_SESSION['admin'] = $result;
        }else{
            echo "verified";
            $_SESSION['user'] = $result;
            header('Location:index.php');
        }
    }   
    else{
    echo "vos indentifiants sont incorrects";
        
    }

}

if(isset($_POST["deco"])){
    session_unset();
    $deco = "vous êtes bien déconecté";
    echo $deco;

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
                    <input type="login" name="login" class="form-control" placeholder="Login"  autocomplete="on">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe"  autocomplete="on">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Connexion</button>
                    <button type="submit" name="deco" class="btn btn-primary btn-block">Deconnexion</button>
                </div>   
            </form>
        </div>
        </section>
    </main>
</body>
</html>