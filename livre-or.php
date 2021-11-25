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

for($index=0; isset(($commentaire)[$index]) == true; $index++){
    

}

    // foreach($commentaire as $commentaires){
    //     var_dump ($commentaires);
    //     echo $commentaires['login']; //ceci prend tous mes logins, il faut que je les différencie 
    //     echo $commentaires['commentaire']; //pareil ici
    //     echo $commentaires['date']; //pareil ici
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or || Ungodly Hour Radio</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <?php echo $commentaires['login']; ?>
            </td>
            <td>
                <?php echo $commentaires['commentaire']; ?>
            </td>
            <td>
                <?php echo $commentaires['date']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $commentaires['login']; ?>
            </td>
            <td>
                <?php echo $commentaires['commentaire']; ?>
            </td>
            <td>
                <?php echo $commentaires['date']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $commentaires['login']; ?>
            </td>
            <td>
                <?php echo $commentaires['commentaire']; ?>
            </td>
            <td>
                <?php echo $commentaires['date']; ?>
            </td>
        </tr>
    </table>
</body>
</html>