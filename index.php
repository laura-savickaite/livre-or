<!-- un site de musique, maybe des instruments en vente ou prêt d'instruments/salles rassemblant plusieurs musiciens/radio etc...très ungodly hour vibes, très paillettes et sobre en même temps -->

<?php
session_start();


$connect = mysqli_connect('localhost', 'root', '', 'livreor');

$login=$_SESSION['login'];

if(isset($_POST['deco'])){
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
    <title>Accueil || Ungodly Hour Radio</title>
</head>
<body>
    <header>
    <?php 
    $request = mysqli_query($connect, "SELECT * FROM `utilisateurs` WHERE `login`= '".$login. "'"); 
    if(!isset($_SESSION['login'])){ ?>

    <section class="navbar">
        <a href="inscription.php"><p>Sign in</p></a>
        <a href="connexion.php"><p>Log in</p></a>
        <a href="livre-or.php"><p>Livre d'or</p></a>
    </section>
    <?php
    }else { ?>
    <section class="navbar">
        <a href="profil.php"><p>Mon profil</p></a>
        <a href="livre-or.php"><p>Livre d'or</p></a> 
        <form action="index.php" method="post">
            <button class="boutondeco" type="submit" name="deco">Deconnexion</button>
        </form>
    </section>
    <?php
    }
    
    ?>
    </header>
    <main>
    <section>
        <div class="indexcase">
            <div id="collage">
                <img id="imgnb" src="Images/img3.jpeg" width="200px">
                <img id="img1" src="Images/img1.jpeg" width="200px">
                <img id="img2" src="Images/img2.jpeg" width="200px">
            </div>
            <h3>Welcome to the</h3>
            <h2 id="nomsite">Ungodly Hour</h2>
        </div>

    <marquee id="titrescroll" scrolldelay="90"><h1>UNGODLY  HOUR  RADIO</h1></marquee>
     <hr>
    </section>

    <section >
        <video autoplay muted loop id="indexvid">
            <source src="Assets/videoindex.mp4" type="video/mp4">
        </video>
    </section>
    </main>
    <footer>

    </footer>
</body>
</html>