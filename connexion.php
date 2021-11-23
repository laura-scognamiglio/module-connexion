<?php
/**
 * connexion a la base de donnée et inclus la navbar. demarre la session 
 */
 session_start();
 include('navbar.php');
$bdd = mysqli_connect("localhost","laura-scog","Mcrlow1708","laura-scognamiglio_moduleconnexion");
mysqli_set_charset($bdd, 'utf8');


/**
 * s'assure de la validité des entrées de l'utilisateur et permet d'éviter les messages de warning
 */

if(isset($_POST['login']) && isset($_POST['password']))
{

    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    $query = mysqli_query($bdd,"SELECT * FROM `utilisateurs` WHERE `login`= '$login' ");
    $result = mysqli_fetch_assoc($query);
    

}

$deco = "<p class='mssg'>deconnected</p>";
$err = "<p class='mssg'>error</p>";
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

/**
 * compare les données avec la bdd, si c'est l'admin elle ouvre une session admin si c'est user reconnu
 */

if(!empty($result) && isset($result)){
   
        if(password_verify($password, $result['password'])){
            if($login === "admin" ){
            $mssg = "<p class='mssg'>vs etes l'admin</p>";
            $_SESSION['admin'] = $result;
            header('Location:admin.php');
        }
       
        else{
            
            $_SESSION['user'] = $result;
            $co = "<p class='mssg'>sucsess</p>";
            header('Location:index.php');
            
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
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Welcome</title>
</head>
<body class="conBody">
    <header> 
        
    </header>
    <main>
    <section class= connect_form>
        <form class= "form" action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2> 
                <?php if(isset($mssg)){
                   echo $mssg ;
                }
                elseif(isset($_POST["deco"])){
                    session_unset();
                    echo $deco;
                }
               
                
                 ?>
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