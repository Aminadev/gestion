<?php
    session_start();
    require_once"fonction_pdo.php";
    // if(!isset($_SESSION['cnx']) OR $_SESSION['cnx']==false )
    // {
    //   header('location:indexN.php');
    // }
    $date=DATE('Y-m-j');
    $conn= connect();
    extract($_POST);
                    // $tab=array();
                    // $tab['nom']="";
                    // $tab['prenom']="";
                    // $tab['iduser']="";
                    // $tab['date']="";
                    // $tab['login']="";
                    // $tab['nom']="";
                    $etu=findEtudiantById($_GET['idetu']);
                    //echo $etu=$conn->query($sql);
                    

                    if(isset($_POST['btnModifier']))
                    {
                       // $m=TrouvIDviaMatricule($matricul);
                        if(empty($login)){
                             echo "<script>alert('veuillez saisir votre login')</script>";
                        }elseif(empty($nom)){
                             echo "<script>alert('veuillez saisir votre nom')</script>";
                        }elseif(empty($prenom)){
                            echo "<script>alert('veuillez saisir votre prenom')</script>";
                       }else{
                            
                                    $requete=UpdateEtudiant($etu['iduser'],$nom,$prenom,$login,$etu['date'],$etu['profil']);
                                    if($requete){
                                        echo "<script>alert('MODIFICATION EFFECTUER AVEC SUCCES')</script>";
                                        header("location:liste_classe.php");
                                       // echo "<script>window.location.href='gescotisation.php';</script>";
                                    }else{
                                        echo "<script>alert('MODIFICATION NON EFFECTUER VEUILLEZ REESSAYER')</script>";
                                        header("location:liste_classe.php");
                                    }
                            }
                        }
                    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>modifier etudiant</title>


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
    <div class="box" style="height: 660px; top:-55px">
    <div id="header">
    <h1 id="logintoregister">modifier vos données </h1>
  </div> 
    <div class="group">
      <input class="inputMaterial" readonly="true" type="text" value="<?=$etu['date']?>" name="date" required/>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$etu['nom']?>" name="nom"  required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Nom</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" value="<?=$etu['prenom']?>" name="prenom"  required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Prénom</label>
    </div>
    <div class="group">    
    <input class="inputMaterial" type="text" value="Etudiant" readonly="true" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Profil</label>
    </div>
     <div class="group">      
      <input class="inputMaterial" type="email" value="<?=$etu['login']?>" name="login"  required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>
     
    
    <button name="btnModifier"   type="submit" >Modifier</button>
    <button name="btnAnnuler"   type="reset" >Annuler</button>
</form>  
<br/>
<br/>
  <div id="footer-box" >
  </div>
</div>

	
</body>

</html>
