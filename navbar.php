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
            <form action="index.php" method="post" >
            <ul class="navul">
                <li class="navli"><a href="index.php">ACcuei/</a></li>
                <li class="navli"><a href="inscription.php">INscr*pt*on</a></li>
                <li class="navli"><a href="connexion.php">CoNneX*on</a></li>
                <li class="navli"><a href="https://github.com/laura-scognamiglio/module-connexion" target="_blank">G*t Hub</a></li>
                <!-- <li><a href="profil.php">Profil</a></li> -->
                <!-- balise php avec la condition de reconnaisance du profil admin -->
                <?php
                if (isset($_SESSION['admin'])){
                    echo ('<li class="navli"><a href="admin.php">Adm*n</a></li>');
                    echo ('<li class="libtndeco"><button type="submit" name="deco" class="btn btn-primary btn-block">X</button></li>');
                }
               // balise php avec la condition de reconnaisance du profil user
                if(isset($_SESSION['user'])){
                    echo ('<li class="navli"><a href="profil.php">Prof*/</a></li>');
                    echo ('<li class="libtndeco"><button class="btndeco"  type="submit" name="deco"  >X</button></li>');
                }
                 // destruction de la session si bouton deconnexion enclencher
                if(isset($_POST['deco'])){
                    session_destroy(); 
                }
                ?>
                

            </ul>
            </form>
        </nav>
    </header>

 
</html>