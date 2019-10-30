<?php
        session_start();

if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!=1) {
  sleep(1);
  echo "<script>window.location.href='../index.php';</script>";
 }

        $iduser = $_GET['idsec'];


function __autoload($class){
require_once "../classes/$class.php";

}
        $secretaire = new User();
        $sec = $secretaire->FindSecretaireBYid($iduser);
        
//   }
    // $date=DATE('Y-m-j');

                  if(isset($_POST['btnModifier']))
                    {
                        extract($_POST);
                    
                      //echo $choix;
                      // $doublon=DoublonUser('$nom','$prenom',"etu",'$login');
                        if(empty($nom) || empty($prenom) || empty($adresse) || empty($datenaiss) || empty($email) || empty($tel) || empty($sexe)){
                             echo "<script>alert('VEUILLEZ RENSEIGNEZ TOUS LES CHAMPS stp')</script>";
                         }elseif(is_numeric($nom) || is_numeric($prenom) || is_numeric($adresse) || !is_numeric($tel)){
                             echo "<script>alert('VEUILLEZ RENSEIGNEZ DES VALEURS DE CHAMPS VALIDE')</script>";
                         }else{
                                //$a=$med['iddomaine'];
                                //echo "$a est $domaine";
                                if($service==""){
                                    $service1 = $sec['idserv'];
                                }elseif($sec['idserv'] != $domaine){
                                    $service1 = $service;
                                }else{
                                    $service1 = $sec['idserv'];
                                }
                                $DonneSecretaire =[
                                    'nom'=>$nom,
                                    'prenom'=>$prenom,
                                    'adresse'=>$adresse,
                                    'datenaiss'=>$datenaiss,
                                    'sexe'=>$sexe,  
                                    'telephone'=>$tel,
                                    'email'=>$email,
                                    'idserv'=>$service1
                                      ];


                                        $medecin = new User();  
                                        $verif = $medecin->UpDateSecretaire($DonneSecretaire,$iduser);
                                        if($verif){
                                            header('location:listeMedecin.php');
                                        }
                            }

                    }
                    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Modifier Secretaire</title>


<!-- <link href="/css/styles.css" rel="stylesheet"> -->
<link href="style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<br><br><br>	
 <form action="" method="POST">		
			<div class=" panel ">

  <div class="box" style="height: 850px; top:-80px">
  <div id="header">
      <br>
  <h1 id="logintoregister">Modifier Un Secretaire</h1>
  </div> 
  <div class="group">      
      <input class="inputMaterial" type="text" name="nom" value="<?=$sec['nom'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Nom</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="prenom" value="<?=$sec['prenom'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Prenom</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="adresse" value="<?=$sec['adresse'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Adresse</label>
    </div>
    
     <div class="group">      
      <input class="inputMaterial" type="date" name="datenaiss" value="<?=$sec['datenaiss'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Date de Naissance</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="tel" value="<?=$sec['telephone'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Telephone</label>
    </div>
    <div class="group">
    <div class="inputMaterial">
        <?php   if($med['sexe']=="Homme"){  ?>
            <input  type="radio" name="sexe" value="Homme" checked>Homme&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input" type="radio" name="sexe">Femme
       <?php }else{ ?>
            <input  type="radio" name="sexe" value="Homme">Homme&nbsp;&nbsp;&nbsp;&nbsp;
            <input  type="radio" name="sexe" checked>Femme
       <?php }   ?>
        
    </div>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="email" name="email" value="<?=$sec['email'];?>" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>
    <div class="group">
        <select name="service" class="inputMaterial">
            <option value="<?=$sec['domaine'];?>">Choisi un Service </option>
            <?php
                $service = new Service();
                $Ser = $service->select();
                //var_dump($med);
                foreach($Ser as $el){    ?>
                <option value="<?=$el['idserv'];?>" > <?=$el['nomserv'];?> </option>
                <?php  }  ?>    
        </select>
    </div>
     <!-- <div class="group">      
      <input class="inputMaterial" type="password" name="pwd1" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mot de Passse</label>
    </div> -->
    
    
    <button name="btnModifier" type="submit">Modifier</button>
</form>  
<br/>
<br/>
  <div id="footer-box"><p class="footer-text"><a href="listeSecretaire.php
  "><span class="sign-up" >ANNULER</span></a></p>
  </div>
</div>

</body>

</html>
