<!-- Ce formulaire ne contient qu’un champs permettant de rentrer son
commentaire et un bouton de validation. Il n’est accessible qu’aux
utilisateurs connectés. Chaque utilisateur peut poster plusieurs
commentaires. -->

<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'livreor');

$login=$_SESSION['login'];

if(!isset($login)){
    header('Location:index.php');
}

$verifid = mysqli_query($connect, "SELECT `id` FROM `utilisateurs` WHERE `login`= '".$login."'");
$repid = mysqli_fetch_assoc($verifid);
var_dump($repid);

foreach ($repid as $id) {

   
    echo $id;

    // si modifier le commentaire maybe ????
    // $lecommentaire = mysqli_query($connect, "UPDATE `commentaires` SET `commentaire`='$commentaire',`id_utilisateur`='$id'");

    }
    
    if(isset($_POST['postcomment'])){
    $commentaire = $_POST['user_comment'];
    $date = date('Y/m/d');
    
    echo $commentaire;
    $lecommentaire = mysqli_query($connect, 'INSERT INTO `commentaires` (commentaire, id_utilisateur, date) VALUES ("'.$commentaire.'","'.$id.'","'.$date.'")');
    var_dump($lecommentaire);
}


if (isset($_POST['deco'])){
    session_destroy();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un commentaire || Ungodly Hour Radio</title>
</head>
<body>
<form action="commentaire.php" method="post">

    <label for="name">Ajoutez votre commentaire ici:</label>
    <input type="text" id="commentaire" name="user_comment">

    <button class="boutonform" type="submit" name="postcomment">Poster mon commentaire</button>

    <button class="boutonform" type="submit" name="deco">deco</button>
</form>
</body>
</html>