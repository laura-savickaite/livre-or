<!-- un site de musique, maybe des instruments en vente ou prêt d'instruments/salles rassemblant plusieurs musiciens etc...très ungodly hour vibes, très paillettes et sobre en même temps -->

<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'livreor');

$login=$_SESSION['login'];

$request = mysqli_query($connect, "SELECT * FROM `utilisateurs` WHERE `login`= '".$login. "'"); 
if(!isset($_SESSION['id'])){ ?>

<a href="inscription.php"><p>Sign in</p></a>
<a href="connexion.php"><p>Log in</p></a>
<a href="livre-or.php"><p>Livre d'or</p></a>
<?php
}else { ?>
<a href="profil.php"><p>Mon profil</p></a>
<a href="livre-or.php"><p>Livre d'or</p></a>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil || UC titre</title>
</head>
<body>
    <header>

    </header>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>