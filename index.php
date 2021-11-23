<?php
session_start();
$bdd = mysqli_connect("localhost","laura-scog","Mcrlow1708","laura-scognamiglio_moduleconnexion");
$requete = mysqli_query($bdd, "SELECT * FROM `utilisateurs`");
$users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
mysqli_set_charset($bdd, 'utf8');

include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.php" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class= "indexBody">
    <main>
        <section class="indexSection">
            <h1 class="title">Bloop edges</h1>
        </section>
        <section class="indexpic">
            <img class="villaOrigin" src="assets/bulleOrigin.png" alt="plan d'origine de la villa">
        </section>
    </main>
</body>
</html>
