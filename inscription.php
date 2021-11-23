<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'livreor');

  
  
  if(!empty($_POST)){
    extract($_POST);
    $validation=true;
  }

  if(isset($_POST['inscription'])){
    
    $login=$_POST['user_login'];
    $prenom=$_POST['user_firstname'];
    $nom=$_POST['user_lastname'];
    $password=$_POST['password'];
    $confpassword=$_POST['password2'];
    
    $login=htmlentities(trim($login));
    $prenom=htmlentities(trim($prenom));
    $nom=htmlentities(trim($nom));
    $password=htmlentities(trim($password));
    $confpassword=htmlentities(trim($confpassword));
      


    if (empty($login)) {
      $validation=false;
      $loginErr .= "Veuillez rentrer un login.";
    }
    else {
        
      $repLogin = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE `login`= '".$login. "'"); 
        if(mysqli_num_rows($repLogin)){
          $validation=false;
          $loginErr .= "Ce nom d'utilisateur est déjà pris.";
      }
    }

    
    if(empty($password)){
      $validation=false;
      $passwordErr .= "Le mot de passe doit être rempli.";
    }
    elseif ($confpassword !== $password) {
      $validation=false;
      $confpasswordErr .= "Le mot de passe et sa confirmation ne sont pas les mêmes.";
    } 
    
    
  if ($validation){
  
    $queryInsert = mysqli_query($connect, "INSERT INTO `utilisateurs` (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')"); 
    header('Location:index.php');
    $_SESSION['login']=$login;
  }
  }
  

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription || UC</title>
  
  <link rel="stylesheet" href="UC.css">
</head>
<body>
    <header>
      <p id="indexlien"> Back to the index</p>
    </header>

    <main>
    <article id="form_inscription">

      <section> 
        <form action="inscription.php" method="post">
              <label for="name">Login :</label>
              <input type="text" id="login" name="user_login"> <p class="error1">*<?php echo $loginErr;?></p>

            <label for="msg">Mot de passe :</label>
            <input type="password" id="pass" name="password" required><p class="error2"> *<?php echo $passwordErr;?></p>
            <label for="msg">Confirmation du mot de passe :</label>
            <input type="password" id="pass2" name="password2" required
            ><?php echo $confpasswordErr;?>
                  <div class="boutons">
                    <button class="boutoninscription" type="submit" name="inscription">Sign in</button></form>
                    <p id="comptetxt">Vous avez déjà un compte ? </p>
                    
                    <button class="boutoninscription" onclick="window.location.href = 'connexion.php';" type="submit" name="connexion">Log in</button>
                </div>
        </section>

  </article>

            </main>
            
    <footer>
    
    </footer>
</body>
</html>