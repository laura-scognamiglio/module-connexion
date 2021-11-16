<?php

require('index.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <section class= connect_form>
        <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="name" name="name" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="surname" name="surname" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="login" name="login" class="form-control" placeholder="Login" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="passwordconfirm" name="passwordconfirm" class="form-control" placeholder="Confimer le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Valider</button>
                </div>   
            </form>
        </div>
        </section>
    </main>
</body>
</html>