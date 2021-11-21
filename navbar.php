<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  
    <header> 
       
        <nav class= "navbar">
            <form action="index.php" method="post">
            <ul class="navul">
                <li class="navli"><a href="index.php">Accueil</a></li>
                <li class="navli"><a href="inscription.php">Inscription</a></li>
                <li class="navli"><a href="connexion.php">Connexion</a></li>
                <!-- <li><a href="profil.php">Profil</a></li> -->
                <!-- balise php avec la condition de reconnaisance du profil admin -->
                <?php
                if (isset($_SESSION['admin'])){
                    echo ('<li class="navli"><a href="admin.php">Admin</a></li>');
                    echo ('<li class="navli"><button type="submit" name="deco" class="btn btn-primary btn-block">Deconnexion</button></li>');
                }
                if(isset($_SESSION['user'])){
                    echo ('<li class="navli"><a href="profil.php">Profil</a></li>');
                    echo ('<li class="libtndeco"><button class="btndeco"  type="submit" name="deco"  >Deconnexion</button></li>');
                }
                if(isset($_POST['deco'])){
                    session_destroy(); 
                }
                ?>
                

            </ul>
            </form>
        </nav>
    </header>

 
</html>