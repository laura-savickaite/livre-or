<!-- Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->

<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'livreor');

$combdd = mysqli_query($connect, "SELECT utilisateurs.login, commentaires.commentaire, commentaires.date  FROM `utilisateurs` INNER JOIN commentaires ON id_utilisateur=utilisateurs.id ORDER BY commentaires.id DESC");
$commentaire = mysqli_fetch_all($combdd, MYSQLI_ASSOC);

// var_dump($commentaire);

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
    <img id="imgprofil" src="Uploads/<?php echo $_SESSION['imgprofil']; ?>" alt="Profile picture" class='profil' width="100px" height="100px">
    <!-- <div id="scroll-container">
    <div class="scroll-text">Log in to add a comment.</div>
    </div> -->
        <?php
    for($index=0; isset($commentaire[$index]) == true; $index++){
    $arrays = $commentaire[$index];?>

            <div class="bulletxt">
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
<?php
 } ?>
    </main>
</body>
</html>


<!-- $str="On n'est pas le meilleur quand on le croit mais quand on le sait";

//$index=0; //mon index counter

commentaire
$dic=array (
    array commentaire1 "consonnes" => ["n","t", "p", "s", "l", "m", "r", "q", "d"],
    array commentaire 2"voyelles"=>["O", "o", "e", "a", "i", "u"]
);

    //var_dump ($dic);
    $compteur=0;
    $compteur2=0;

for ($index=0; isset($str[$index])==true; $index++){
    //["consonnes"] = seulement la précision de quel array dans dic et le [$cons] similaire à mon [$index] donc le vrai index
    for ($cons=0; isset($dic["consonnes"][$cons])==true; $cons++){
        if($str[$index]==$dic["consonnes"][$cons]){
            $compteur++;
        }
    }

    for ($voy=0; isset($dic["voyelles"][$voy])==true; $voy++){
        if($str[$index]==$dic["voyelles"][$voy]){
            $compteur2++;
        }
    }
} -->