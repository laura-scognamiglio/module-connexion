<?php
session_start();
$bdd = mysqli_connect("localhost","root","root","moduleconnexion");
mysqli_set_charset($bdd, 'utf8');
$query = mysqli_query($bdd,"SELECT * FROM `utilisateurs`");
$admin_query = mysqli_fetch_all($query, MYSQLI_ASSOC);



if(isset($_POST["delete"])){
$query2 = mysqli_query($bdd,"DELETE FROM `utilisateurs` WHERE id = {$_POST['delete']}"); 

}

echo '<pre>';
var_dump($admin_query);
var_dump($_POST);
echo '</pre>';

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
    <table>
<thead>
    <tr>
        <td>id</td>
        <td>prenom</td>
        <td>nom</td>
        <td>login</td>
        <td>password</td>
    </tr>
</thead>
<tbody>
<?php foreach($admin_query as $result): ?>
    <tr>
        <td><?=$result["id"];?></td>
        <td><?=$result["nom"];?></td>
        <td><?=$result["prenom"];?></td>
        <td><?=$result["login"];?></td>
        <td><?=$result["password"];?></td>
        <td><form action="" method="post"><button type="submit" name="delete" value="<?=$result["id"];?>">delete</button></form></td>
    </tr>

<?php endforeach;?>

</tbody>
</table>
</body>
</html>
