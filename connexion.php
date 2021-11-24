<!-- Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur devient connecté et une (ou plusieurs)
variables de session sont créées. -->

<?php

session_start();
var_dump($_SESSION);

$connect = mysqli_connect('localhost', 'root', '', 'livreor');

// if(isset($_SESSION['login'])){
//     header('Location:index.php');
// }

if (isset($_POST['connexion'])){

    $login=$_POST['user_login'];

$requestLogin = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE `login`= '".$login. "'"); 

    if(mysqli_num_rows($requestLogin)){
    $requestPassword = mysqli_query($connect, "SELECT `password` FROM `utilisateurs` WHERE `login`= '".$login. "'"); 
        if(mysqli_num_rows($requestPassword)){
            $_SESSION['login']=$login;
    }else {
        $logErr="Le mot de passe ou le login ne correspondent pas.";
    }
  } 
}

if (isset($_POST['inscriptionbis'])){
    header('Location:inscription.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion || UC</title>
</head>
<body>
    <main>
        <form action="connexion.php" method="post">
              <label for="name">Login :</label>
              <input type="text" id="login" name="user_login">

            <label for="msg">Mot de passe :</label>
            <input type="password" id="pass" name="password" required><p class="error2"> *<?php echo $logErr;?></p>
                  <div class="boutons">
                    <button class="boutonform" type="submit" name="connexion">Log in</button>
                </form>

                    <p id="comptetxt">Vous n'avez pas de compte ? </p>    
                    <input class="boutonform" type="submit" name="inscriptionbis">Sign in</input>
    </main>
</body>
</html>