<?php
session_start();
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
$requete = mysqli_query($bdd, "SELECT * FROM `utilisateurs`");
$users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
mysqli_set_charset($bdd, 'utf8');
$style = '<link rel="stylesheet" href="style.css">';
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
        <?php
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
        ?>
        <nav>
            <form action="index.php" method="post">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <!-- balise php avec la condition de reconnaisance du profil admin -->
                <?php
                if (isset($_SESSION['admin']))
                {
                    echo ('<li><a href="admin.php">Admin</a></li>');
                }
                if(isset($_SESSION['user'])){
                    echo ('<li><button type="submit" name="deco" class="btn btn-primary btn-block">Deconnexion</button></li>');
                }
                if(isset($_POST['deco'])){
                    session_destroy(); 
                }
                ?>
                

            </ul>
            </form>
        </nav>
    </header>

    <main>
       
    </main>
</body>
</html>