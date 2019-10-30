<?php
        session_start();

    function __autoload($class){
    require_once "classes/$class.php";
    }

    if(isset($_POST['btnConnexion'])){
        extract($_POST); 
        if(!empty($email) && !empty($pwd)){
            $email = trim($email);
            $pwd = trim($pwd);
            if(preg_match("/^.+@.+\.[a-zA-Z]{2,}$/",$email)){
                $utilisateur = new User();
                $lg = $utilisateur->select();
                $ok=0;
                foreach($lg as $el){
                    $ok = 1;
                        if($email==$el['email'] && $pwd==$el['mdp']){
                            $_SESSION['nom']=$el['nom'];
                            $_SESSION['prenom']=$el['prenom']; 
                            $_SESSION['id']=$el['iduser'];
                            $_SESSION['login']=$el['email'];
                            $_SESSION['profil']=$el['idprofil'];
                            if($el['idprofil']==2){
                                $_SESSION['service']=$el['idserv'];  
                            } 

                            if($el['idprofil']==1){
                                header('location:page/admin.php');     
                            }else if($el['idprofil']==2){
                                header('location:page/secretaire.php');
                            }else if($el['idprofil']==3){
                                header('location:page/medecin.php');
                            }
                        }           
                    
                    }
                        if($ok==1){
                            echo "<script>alert('INFORMATION INVALIDE !!!')</script>";
                        }
                }else{
                    echo "<script>alert('VUEILLEZ SAISIR UN EMAIL !!!')</script>";
                }
                       
            }else{
                echo "<script>alert('VEUILLEZ RENSEIGNER TOUS LES CHAMPS')</script>";
            }
       
    
    }       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="page/index.css">
    <title>Connexion</title>
</head>
<body class="accueil">
<form action="" method="POST">
   
 <div class="loginbox">
     <img src="avatar.jpeg" class="avatar"><br><br><br>
      
        <h1>Connectez-vous ici</h1>
        <form action="">
            <p>Username</p>
            <input type="email" name="email" placeholder="Nom d'utilisateur"><br><br>
            <p>Password</p>
            <input type="password" name="pwd" placeholder="Votre mot de passe"><br><br>
            <br>            
            <input type="submit" name="btnConnexion" value="CONNECTER"/><br>
            <a href="#">Mot de passe oublie?</a><br>
            <a href="#">Vous n'avez pas de compte?</a>
</div>

</form>
</body>
</html>

