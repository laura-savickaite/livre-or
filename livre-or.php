<!-- Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->

<?php
session_start();
// $connect = mysqli_connect('localhost', 'root', '', 'livreor');
$connect = mysqli_connect('localhost', 'laura-savickaite', 'heliosmapuce0407', 'laura-savickaite_livreor');

$combdd = mysqli_query($connect, "SELECT utilisateurs.login, commentaires.commentaire, commentaires.date, utilisateurs.imgprofil  FROM `utilisateurs` INNER JOIN commentaires ON id_utilisateur=utilisateurs.id ORDER BY commentaires.id DESC");
$commentaire = mysqli_fetch_all($combdd, MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or || Ungodly Hour Radio</title>
</head>
<body id="prlelivredor">
    <header>
        <section class="navbar">
            <a href="index.php"><p>Back to the index</p></a>
        </section>
    </header> 
    <?php 
        if(isset($_SESSION['login'])){ ?>
    <div class="marquee">
        <div class="track">
        <a href="commentaire.php"><div class="content">&nbsp;Add a comment   //   Add a comment   //   Add a comment   //   Add a comment   //   Add a comment   //   Add a comment   //   Add a comment   //   Add a comment   //   </div></a>
        </div>
    </div>
<?php }else { ?>
        <div class="marquee">
        <div class="track">
            <a href="connexion.php"><div class="content">&nbsp;Log in to add a comment // Log in to add a comment // Log in to add a comment // Log in to add a comment // Log in to add a comment // Log in to add a comment //  </div></a>
        </div>
    </div>
<?php } ?>
    <main id="livreor">
        <?php
    for($index=0; isset($commentaire[$index]) == true; $index++){
    $arrays = $commentaire[$index]; ?>

            <div class="bulletxt">
                <div class="formimgtxt"><img class="imageprof" src="Uploads/<?php echo $arrays['imgprofil']; ?>" alt="Profile picture" class='profil' width="70px" height="70px">
                <div class="bubble bubble-bottom-left"> 
                    <div id="scroll-container">
                        <div id="scroll-text">
                        <p><?php echo $arrays['commentaire']; ?></p>
                    </div>  
                    <div class="author">           
                        <p><?php echo $arrays['login']; ?> - <span style='color:grey;'><?php  echo $arrays['date']; ?></span></p>
                    </div>
                    </div> 
                </div>
            </div>
<?php
 } ?>
    </main>
</body>
</html>


