<?php
//    <?php
session_start();
if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!=1) {
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

//   }
    $date=DATE('Y-m-j');
    extract($_POST);

                  if(isset($_POST['btnEnregister']))
                    {
                      $medecin = new User();  

                        if(empty($nom) || empty($prenom) || empty($adresse) || empty($datenaiss) || empty($email) || empty($pwd1) || empty($tel) || empty($sexe)){
                             echo "<script>alert('VEUILLEZ RENSEIGNEZ TOUS LES CHAMPS stp')</script>";
                         }elseif(is_numeric($nom) || is_numeric($prenom) || is_numeric($adresse) || !is_numeric($tel)){
                             echo "<script>alert('VEUILLEZ RENSEIGNEZ DES VALEURS DE CHAMPS VALIDE')</script>";
                         }elseif(!($pwd2==$pwd1)){
                              echo "<script>alert('LES DEUX MOT DE PASSE SONT DIFFERENT ')</script>";
                            }else{
                                if(!$medecin->DoublonsMedecin(trim($nom),trim($prenom),trim($tel),trim($email))){                                
                                      $DonneMedecin = [
                                        'nom'=>$nom,
                                        'prenom'=>$prenom,
                                        'adresse'=>$adresse,
                                        'datenaiss'=>$datenaiss,
                                        'sexe'=>$sexe,
                                        'telephone'=>$tel,
                                        'email'=>$email,
                                        'mdp'=>$pwd1,
                                        'idprofil'=>3,
                                        'iddomaine'=>$domaine
                                          ];
                                     
                                      $verif = $medecin->InsertMedecin($DonneMedecin);
                                      if($verif){
                                          header('location:listeMedecin.php');
                                      }
                                    }else{
                                        echo "<script>alert('DESOLE LE MEDECIN QUE VOUS VOULEZ AJOUTER EXISTE DEJA')</script>";
                                      } 
                                }

                    }
                    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ajout Medecin</title>


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


  <div class="box" style="height: 1000px; top:-80px">
  <div id="header">
      <br>
  <h1 id="logintoregister">Ajouter Un Medecin</h1>
  </div> 
  <div class="group">      
      <input class="inputMaterial" type="text" name="nom" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Nom</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="prenom" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Prenom</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="adresse" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Adresse</label>
    </div>
    
     <div class="group">      
      <input class="inputMaterial" type="date" name="datenaiss" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Date de Naissance</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="tel" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Telephone</label>
    </div>
    <div class="group">
    <div class="inputMaterial">
        <input  type="radio" name="sexe" value="Homme" >Homme&nbsp;&nbsp;&nbsp;&nbsp;
        <input  type="radio" name="sexe" value="Femme" >Femme
    </div>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="email" name="email" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>
    <div class="group">
        <select name="domaine" class="inputMaterial">
            <option value="">Choisi un Domaine  </option>
            <?php
                $domaine = new Domaine();
                $Med = $domaine->select();
                //var_dump($med);
                foreach($Med as $el){    ?>
                <option value="<?=$el['iddomaine'];?>" > <?=$el['nomdomaine']."  ".$el['nom'];?> </option>
                <?php  }  ?>    
        </select>
    </div>
     <div class="group">      
      <input class="inputMaterial" type="password" name="pwd1" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mot de Passse</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="password" name="pwd2" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Confirmer le Mot de Passse</label>
    </div>
    
    <button name="btnEnregister" type="submit">Enregister</button>
</form>  
<br/>
<br/>
  <div id="footer-box"><p class="footer-text"><a href="admin.php"><span class="sign-up" >ANNULER</span></a></p>
  </div>
</div>

</body>

</html>
