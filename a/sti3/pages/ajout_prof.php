<?php
//     session_start();
     require_once"fonction_pdo.php";
//  if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="admin") {
//       sleep(1);
//       echo "<script>window.location.href='../index.php';</script>";
//   }
//   if(isset($_REQUEST['logout']))
//   {
//     unset($_SESSION);
//     session_destroy();
//     echo"<script>window.location.href='../index.php';</script>";
//   }
    $date=DATE('Y-m-j');
    $conn= connect();
    extract($_POST);
                  if(isset($_POST['btnEnregister']))
                    {
                      //echo $choix;
                      // $doublon=DoublonUser('$nom','$prenom',"etu",'$login');
                        if(empty($login)){
                             echo "<script>alert('veuillez saisir votre login')</script>";
                        }elseif(empty($pwd1)){
                             echo "<script>alert('veuillez saisir votre mot de passe')</script>";
                        }elseif(!empty($pwd1) && empty($pwd2) ){
                             echo "<script>alert('veuillez confirmer votre mot de passe')</script>";
                        }else{
                            if(!($pwd2==$pwd1)){
                                 echo "<script>alert('Les deux mot de passe saisie ne correspond pas')</script>";
                            }else{
                                    $date=DATE('Y-m-j');
                                    $pwd1=sha1($pwd1);
                                   // $idcl=findIdclassByCode($classe);
                                    $requete=$conn->exec("INSERT INTO utilisateur(nom,prenom,date,login,pwd,profil) VALUES('$nom','$prenom','$date','$login','$pwd1','prof') ");
                                    if($requete){
                                        $pr=findProfByLoginPwd($login,$pwd1);
                                        $idprof=$pr['iduser'];
                                        $requete2=$conn->exec("INSERT INTO matiere(libellem,idprof) VALUES('$choix','$idprof') ");
                                        if($requete2){
                                              echo "<script>alert('ENREGITREMENT EFFECTUER AVEC SUCCES')</script>";
                                              echo "<script>window.location.href='prof.php';</script>";
                                              exit;
                                              // echo "<script>window.location.href='gescotisation.php';</script>";
                                            }
                                      echo "<script>alert('INSCRIPTION NON EFFECTUER VEUILLEZ REESSAYER')</script>";
                                    }else{
                                        echo "<script>alert('INSCRIPTION NON EFFECTUER VEUILLEZ REESSAYER')</script>";
                                    }
                                }
                        }
                    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>s'inscrire</title>


<link href="../css/styles.css" rel="stylesheet">
<link href="../LoginCss/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<br><br><br>	
 <form action="" method="POST">		
			<div class=" panel ">


  <div class="box" style="height: 950px; top:-80px">
  <div id="header">
  <h1 id="logintoregister">Ajout Formateur</h1>
  </div> 
  <div class="group">   
      <input class="inputMaterial" readonly="true" type="text" value="<?=$date?>" name="date" required>
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
      <label>Prénom</label>
    </div>
    <?php 
          $req1=$conn->query("SELECT * FROM cours ");
          // $i=0;
          // $tab= array();
     ?>
    <div class="group">      
          <h3>Choisissez un ou des matières </h3>
         <?php 
         if($req1){
            while($lg=$req1->fetch())
            { 
              ?>
              <li>&nbsp;<input type="hidden" name="choix" value="<?=$lg['libellec']?>"><input type="checkbox" name="choix" value="<?=$lg['libellec']?>"><?php echo $lg['libellec'];?></li>
      <?php 
            }                        
                }
            ?>
      <span class="highlight"></span>
      <span class="bar"></span>
    </div>
     <div class="group">      
      <input class="inputMaterial" type="email" name="login" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="password" name="pwd1" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Mot de passe</label>
    </div> 
    <div class="group">      
      <input class="inputMaterial" type="password" name="pwd2" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Conirmer mot de passe</label>
    </div>
    <button name="btnEnregister" type="submit">Enregister</button>
</form>  
<br/>
<br/>
  <div id="footer-box"><p class="footer-text"><a href="indexp.php"><span class="sign-up" >Se connecter</span></a></p>
  </div>
</div>

</body>

</html>
