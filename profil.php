<!-- Cette page possède un formulaire permettant à l’utilisateur de modifier son
login et son mot de passe. -->

<?php

session_start();
// $connect = mysqli_connect('localhost', 'root', '', 'laura-savickaite_livreor');
$connect = mysqli_connect('localhost', 'laurasavickaite', 'Lilirosesa1997.', 'laura-savickaite_livreor');


if(!isset($_SESSION['login'])){
    header('Location:index.php');
}

// ici le code pour rajouter l'image de profil, pour plus de détails voire le projet module connexion sur git
if (isset($_POST['sauvimg'])){
  $file=$_FILES['profilImg'];
  $fileName=$_FILES['profilImg']['name'];
  $fileType=$_FILES['profilImg']['type'];
  $fileTmpName=$_FILES['profilImg']['tmp_name'];
  $fileSize=$_FILES['profilImg']['size'];
  $fileError=$_FILES['profilImg']['error'];

  $fileExt = explode('.', $fileName); 
  $fileActExt = strtolower(end($fileExt)); 

  $allowedExt = array('jpeg', 'jpg', 'png');
  
  if (in_array($fileActExt, $allowedExt)){

    if ($fileError === 0){
      
      if ($fileSize < 1000000){
      
        $fileNewName = uniqid('', true).".".$fileActExt; 
        $fileDestination = "Uploads/".$fileNewName;

        move_uploaded_file($fileTmpName, $fileDestination);

        $queryInsert = mysqli_query($connect, "UPDATE `utilisateurs` SET `imgprofil`='$fileNewName' WHERE `login`= '".$_SESSION['login']."'");
         
        header('Location:connexion.php');
       
      }else {
        $sizeErr .= "Le fichier est trop lourd.";
      }
    }else {
      $pictureErr .= "Il y a une erreur dans le fichier.";
    }
  }else{
    $profilErr .= "Ce type de fichier n'est pas pris en compte par le site web. Extensions possibles : .jpeg, .jpg et .png.";
  }
}

if (isset($_POST['enregistrer'])){        

      $newLogin = $_POST['user_login'];
      $newPassword = $_POST['password'];
      $newConfpass = $_POST['password2'];

      if ($newConfpass !== $newPassword) {
        $confpasswordErr .= "Le mot de passe et sa confirmation ne sont pas les mêmes.";
      }  
      
      $Login = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE `login`= '".$_SESSION['login']."'");
        if(mysqli_num_rows($Login)){
          $querUpdate = mysqli_query($connect, "UPDATE `utilisateurs` SET `password`='$newPassword' WHERE `login`= '".$_SESSION['login']."'");
        }


      $rpLogin = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE `login`= '".$newLogin."'");
        if(mysqli_num_rows($rpLogin)){
          $loginErr .= "Ce nom d'utilisateur est déjà pris.";
        } 
        else {
     $queryUpdate = mysqli_query($connect, "UPDATE `utilisateurs` SET `login`='$newLogin', `password`='$newPassword' WHERE `login`= '".$_SESSION['login']."'");

        $_SESSION['login']=$newLogin;
        $_SESSION['password']=$newPassword;
        }


      } 

  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil || Ungodly Hour Radio</title>
</head> 
<body>
    <header>
        <section class="navbar">
            <a href="index.php"><p>Back to the index</p></a>
            <form action="deconnexion.php" method="post">
                <button class="boutondeco" type="submit" name="deco">Deconnexion</button>
            </form>
        </section>
    </header>
    <main class="layout">
      <article id="pourimage">
      <img class="imgprofil" src="Uploads/<?php echo $_SESSION['imgprofil']; ?>" alt="Profile picture" class='profil' width="200px" height="200px">
            <form action="profil.php" method="POST" enctype="multipart/form-data">
                  <input type="file" name="profilImg">
                  <span><?php echo $profilErr; echo $pictureErr; echo $sizeErr; ?></span>
                  <button class="boutonsauv" type="submit" name="sauvimg" value="Sauvegarder">Sauvegarder</button>
            </form>
        </article>
      <article class="formbackg">
        <form action="profil.php" method="post">
          <div class="centered">
                <label for="name">Login :</label>
                <input type="text" id="login" value="<?php echo $_SESSION['login']?>" name="user_login"> <p class="error"><?php echo $loginErr;?></p>

                <label for="msg">Mot de passe :</label>
                <input type="password" id="pass" name="password" required><p class="error"><?php echo $passwordErr;?></p>
                <label for="msg">Confirmation du mot de passe :</label>
                <input type="password" id="pass2" name="password2" required
                ><?php echo $confpasswordErr;?>
            <div class="boutons1">
                <button class="boutonprofil" type="submit" name="enregistrer">Save the changes</button>
            </div>
          </div>
        </form>
      </article>
    </main>
</body>
</html>