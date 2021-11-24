<!-- Sur cette page on voit l’ensemble des commentaires, organisés du plus
récent au plus ancien. Chaque commentaire doit être composé d’un texte
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la
page d’ajout de commentaire. -->

<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'livreor');

$combdd = mysqli_query($connect, "SELECT utilisateurs.login, commentaires.commentaire, commentaires.date  FROM `utilisateurs` INNER JOIN commentaires ON id_utilisateur=utilisateurs.id ORDER BY date DESC");
$commentaire = mysqli_fetch_all($combdd, MYSQLI_ASSOC);

var_dump($commentaire);



?>