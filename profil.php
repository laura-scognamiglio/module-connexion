<?php
session_start();
include('navbar.php');
$style = '<link rel="stylesheet" href="style.php" type="text/css">';
echo $style;
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
mysqli_set_charset($bdd, 'utf8');
$slogin = $_SESSION['user']['login'];

$query = mysqli_query($bdd,"SELECT * FROM `utilisateurs` WHERE `login`= '$slogin'");
$result = mysqli_fetch_assoc($query);
// $get_id = mysqli_query("SELECT `id` FROM `utilisateurs`");

if(isset($_POST['valider'])){
   
    $new_name = htmlspecialchars(trim($_POST['name']));
    $new_surname = htmlspecialchars(trim($_POST['surname']));
    $new_login = htmlspecialchars(trim($_POST['login']));
    $new_password = htmlspecialchars(trim($_POST['password']));
    $new_passwordconfirm = htmlspecialchars(trim($_POST['passwordconfirm']));
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $login = $result['login'];

    // if((!empty($name)) && !empty($surname) && !empty($login) && !empty($password)){
    $update = ("UPDATE `utilisateurs` SET `login`='$new_login',`prenom`='$new_name',`nom`='$new_surname',`password`='$hashed_password' WHERE `login` = '$login'");
    $update_new = mysqli_query($bdd, $update);
    // $_SESSION['user'] = $result;
    session_destroy();
    header('Location:connexion.php');
    // }
}

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <main>
    <section class= connect_form>
        <form action="profil.php" method="post">
                <h2 class="text-center">Profil</h2>       
                <div class="form-group">
                    <label for="name">Nouveau prénom:</label><br>
                    <input type="name" name="name" class="form-control" placeholder="Prénom" required="required" value ="<?php echo $_SESSION['user']['prenom'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="surname">Nouveau nom:</label><br>
                    <input type="surname" name="surname" class="form-control" placeholder="Nom" required="required" value ="<?php echo $_SESSION['user']['nom'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="login">Nouveau login:</label><br>
                    <input type="login" name="login" class="form-control" placeholder="Login" required="required" value ="<?php echo $_SESSION['user']['login'] ?>" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="login">Nouveau password:</label><br>
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required"  autocomplete="off">
                </div>
                <div class="form-group">
                <label for="login">Confirmer le password:</label><br>
                    <input type="passwordconfirm" name="passwordconfirm" class="form-control" placeholder="Confimer le nouveau mot de passe" required="required"  autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" name= "valider" class="btn btn-primary btn-block">Valider</button>
                </div>   
            </form>
        </div>
        </section>
    </main>
</body>
</html>