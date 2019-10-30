<?php
//    <?php
session_start();
if(!isset($_SESSION['login']) and !isset($_SESSION['profil'])) {
  sleep(1);
  echo "<script>window.location.href='../index.php';</script>";
 }
//  if(isset($_REQUEST['logout']))
//  {
//    unset($_SESSION);
//    session_destroy();
//    echo"<script>window.location.href='../index.php';</script>";
//  }



function __autoload($class){
require_once "../classes/$class.php";

}

    $user = new User();
    $service = new Service();
    $domaine = new Domaine();
    if($_SESSION['profil']==2){
       $serv = $service->FindServiceBYID($_SESSION['service']);
    } 
    
    $u = $user->FindUtilisateurBYid($_SESSION['id']);

    if($_SESSION['profil']==3){
    $dom = $domaine->FindDomaineBYID($u['iddomaine']);
    } 
                    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profil User</title>


<!-- <link href="/css/styles.css" rel="stylesheet"> -->
<link href="style.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<br><br><br>	
 <form action="" method="POST">		
			<div class=" panel ">


  <div class="box" style="height: 700px; top:-80px">
  <div id="header">
      <br>
  <!-- <h1 id="logintoregister">Ajouter Un Secretaire</h1> -->
  </div> 
  <div class="avatarProfil">
      <img src="../img/profil.png" width="80" alt="Photo de Profil">
  </div>
  <div class="group">      
      <input class="inputMaterial" type="text" name="nom" value="<?=$u['prenom']." ".$u['nom'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Je m'appelle :</label>
    </div>
    
    <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$u['adresse'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>J'habite à :</label>
    </div>
    
     <div class="group">      
      <input class="inputMaterial" type="date" value="<?=$u['datenaiss'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Je suis né(e) le :</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$u['sexe'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Je suis un(e) :</label>
    </div>
    <?php if($_SESSION['profil']==1){    ?>     <!-- SI C'EST UN ADMINISTRATEUR-->
    <div class="group">      
      <input class="inputMaterial" type="text" value="<?="l'administrateur";?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Je me suis spécialisé dans le domaine :</label>
    </div>
    <?php }elseif($_SESSION['profil']==2){?>    <!-- SI C'EST UN SECRETAIRE-->
        <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$serv['nomserv'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Je me suis au niveau du Service :</label>
    </div>
        <?php }elseif($_SESSION['profil']==3){?>    <!-- SI C'EST UN MEDECIN-->
            <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$dom['nomdomaine'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Je me suis spécialisé dans le domaine :</label>
    </div>
            <?php }?>
    <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$u['telephone'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mon numéro de téléphone est :</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="email" value="<?=$u['email'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mon adresse email est :</label>
    </div>
    
    
    
</form>  
<br/>
<br/>
<?php if($_SESSION['profil']==1){?>    <!-- SI C'EST UN ADMIN-->
  <div id="footer-box"><p class="footer-text"><a href="admin.php"><span class="sign-up" >RETOUR</span></a></p>
  </div>
<?php }elseif($_SESSION['profil']==2){ ?>    <!-- SI C'EST UN SECRETAIRE--> 
    <div id="footer-box"><p class="footer-text"><a href="secretaire.php"><span class="sign-up" >RETOUR</span></a></p>
  </div>
    <?php }elseif($_SESSION['profil']==3){?>    <!-- SI C'EST UN MEDECIN-->
        <div id="footer-box"><p class="footer-text"><a href="medecin.php"><span class="sign-up" >RETOUR</span></a></p>
  </div>
    <?php } ?>
</div>

</body>

</html>
