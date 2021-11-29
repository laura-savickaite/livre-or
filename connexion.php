<!-- Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
informations, alors l’utilisateur devient connecté et une (ou plusieurs)
variables de session sont créées. -->

<?php

session_start();

$connect = mysqli_connect('localhost', 'root', '', 'livreor');


if (isset($_POST['connexion'])){

    $login=$_POST['user_login'];
    $password=$_POST['password'];
  
    $login=htmlentities(trim($login));
    $password=htmlentities(trim($password));

    //ces informations récoltées sont utilisées dans profil.php
    $repTest = mysqli_query($connect, "SELECT * FROM `utilisateurs` WHERE `login`= '".$login."'");
    $rTest = mysqli_fetch_all($repTest,MYSQLI_ASSOC);
    foreach ($rTest as $value){    
    $_SESSION['imgprofil']=$value ['imgprofil'];
    }

    $RequestLogin = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE `login`= '".$login. "'"); 

    if(mysqli_num_rows($RequestLogin)){
    $RequestPassword = mysqli_query($connect, "SELECT `password` FROM `utilisateurs` WHERE `password`= '".$password. "'"); 

        if(mysqli_num_rows($RequestPassword)){
            $_SESSION['login']=$login;
            header('Location:index.php');
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
    <title>Connexion || Ungodly Hour Radio</title>
</head>
<body>
    <header>
        <section class="navbar">
            <a href="index.php"><p>Back to the index</p></a>
        </section>
    </header>
    <main>
    <h2 class="titretion">Connexion</h2>
    <article class="formsite">
        <section class="connectimg">
            <img class="imgconnexion" src="Images/polaroid.jpeg" width="200px">
            <img class="imgconnexion" src="Images/polaroid1.jpeg" width="200px">
        </section>
        <section class="formbg">
            <form action="connexion.php" method="post">   
                <div class="centertxt">
                    <label for="name">Login :</label>
                    <input type="text" id="login" name="user_login">

                    <label for="msg">Mot de passe :</label>
                    <input type="password" id="pass" name="password" required> <span class="error2"><?php echo $logErr;?></span>
                </div>
            <img class="imgdroite" src="Images/polaroid2.jpeg" width="200px">
        
                    <div class="boutons1">
                        <button class="boutonform" type="submit" name="connexion">Log in</button>
            </form>
        

                    <p id="comptetxt1">Vous n'avez pas de compte ? </p>    
                    <button class="boutonform" type="submit" name="inscriptionbis">Sign in</button>
                 </div>
        </section>
    </article>
    </main>
</body>
</html>