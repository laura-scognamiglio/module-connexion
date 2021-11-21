<?php
session_start();
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
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
    <title>Document</title>
</head>
<body>
    <main>
        <section>
            <h1 class="title">Polar</h1>
        </section>
    </main>
</body>
</html>
