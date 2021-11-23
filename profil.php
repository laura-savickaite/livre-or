<!-- Cette page possède un formulaire permettant à l’utilisateur de modifier son
login et son mot de passe. -->

<?php

session_start();
$connect = mysqli_connect('localhost', 'root', '', 'livreor');

if(!isset($_SESSION['utilisateur_id'])){
    header('Location:index.php');
}

if (isset($_POST['enregistrer'])){
    //var_dump([$_POST]);
      $newLogin = $_POST['user_login'];
      $newPassword = $_POST['password'];
      $newConfpass = $_POST['password2'];

      if ($newConfpass !== $newPassword) {
        $confpasswordErr .= "Le mot de passe et sa confirmation ne sont pas les mêmes.";
      }

      $rpLogin = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE `login`= '".$newLogin."'");
      // $repLogin = mysqli_fetch_all($queryLogin, MYSQLI_ASSOC);  
        if(mysqli_num_rows($rpLogin)){
          $loginErr .= "Ce nom d'utilisateur est déjà pris.";}


     $queryUpdate = mysqli_query($connect, "UPDATE `utilisateurs` SET `login`='$newLogin', `password`='$newPassword' WHERE `login`= '".$_SESSION['utilisateur_login']."'");

  header('Location:connexion.php');
  }

  if (isset($_POST['deco'])){
    session_destroy();
    header('Location:connexion.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil || UC</title>
</head>
<body>
    <header>
    <div class="boutons">
        <button class="boutondeco" type="submit" name="deco">Deconnexion</button>
    </div>
    </header>
    <main>
        <form action="profil.php" method="post">
                <label for="name">Login :</label>
                <input type="text" id="login" name="user_login"> <p class="error1">*<?php echo $loginErr;?></p>

                <label for="msg">Mot de passe :</label>
                <input type="password" id="pass" name="password" required><p class="error2"> *<?php echo $passwordErr;?></p>
                <label for="msg">Confirmation du mot de passe :</label>
                <input type="password" id="pass2" name="password2" required
                ><?php echo $confpasswordErr;?>
            <div class="boutons">
                <button class="boutonprofil" type="submit" name="enregistrer">Save the changes</button>
            </div>
        </form>
</main>
</body>
</html>