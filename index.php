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
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
            </ul>
        </nav>
    </header>

    <main>
       
    </main>
</body>
</html>