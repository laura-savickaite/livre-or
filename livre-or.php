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

for($index=0; isset($commentaire[$index]) == true; $index++){
    $arrays = $commentaire[$index];
    //   var_dump ($arrays);
        // foreach($arrays as $comment){
            echo ("
            <div style='background-color: pink; width: 10%; border-radius: 3%;'>
                <p>" . $arrays['login'] . " - <span style='color:grey;'>" . $arrays['date'] . "</span></p>
                <div style=''>
                <p>" . $arrays['commentaire'] . "</p>
                </div>
            </div>
            ");
     // pour chaque index je veux que tu me prennes ce qu'il y a dans son array
    // }
    //   $alllogin=$arrays['login'];
    //   var_dump($alllogin);
    // //    echo $index;  

 }


        // je veux un foreach pour chaque index
// foreach, ça va être pour un seul tableau
    //il faut que j'individualise chaque tableau
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
<body>

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