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

foreach ($repid as $id) {
    // echo $id;
    }
    
    if(isset($_POST['postcomment'])){
    $commentaire = $_POST['user_comment'];
    $date = date('Y/m/d');
    
    $lecommentaire = mysqli_query($connect, 'INSERT INTO `commentaires` (commentaire, id_utilisateur, date) VALUES ("'.$commentaire.'","'.$id.'","'.$date.'")');
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
    <link rel="stylesheet" href="style.css">
    <title>Ajouter un commentaire || Ungodly Hour Radio</title>
</head>
<body>
    <header>
        <section class="navbar">
            <a href="index.php"><p>Back to the index</p></a>
            <form action="index.php" method="post">
                <button class="boutondeco" type="submit" name="deco">Deconnexion</button>
            </form>
        </section>
    </header>
    <main>
        <article class="formbackg">
            <form action="commentaire.php" method="post">

                <div class="center">
                    <label for="name">Ajoutez votre commentaire ici:</label>
                    <textarea type="text" id="commentaire" name="user_comment" rows="5" cols="33"></textarea>
                </div>

                <div class="boutonform">
                    <button type="submit" name="postcomment">Poster mon commentaire</button>
                </div>
            </form>
        </article>
        <article class="imgcomm">
            <img src="Images/imgcomm1.jpeg" width="300px">
        </article>
    </main>
</body>
</html>