<?php
    session_start();
    require_once"fonction_pdo.php";
    if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="etu") {
      sleep(1);
      echo "<script>window.location.href='../index.php';</script>";
  }
  if(isset($_REQUEST['logout']))
  {
    unset($_SESSION);
    session_destroy();
    echo"<script>window.location.href='../index.php';</script>";
  }
            //   RECUPERATION DES DONNEES de l'etudiant pour l'en-tete 

    $conn=connect();
    $cl=findClassByIdEtudiant($_SESSION['id']);
    $clas=findClassById($cl);
    extract($_POST);
            //    CALCUL  duneto du formateur par rapport a un etudiant
                $datetime=DATE('Y-m-j H:i:s');
                if(isset($_POST['btnValiderScore']))
                {
                    $idcours=findIdMatiereByCode($module);
                    $evalue=A_Evaluer($_SESSION['id'],$idcours);
                    if(empty($module)){
                        echo "<script>alert('VEUILLEZ CHOISIR LE MODULE A EVALUER !!! ')</script>";
                    }elseif($evalue==1){
                        echo "<script>alert('VOUS AVEZ DEJA EVALUER CE MODULE !!! ')</script>";
                    }else{

                        $total1=$choix1+$choix2+$choix3;
                        $total2=$choix4+$choix5+$choix6+$choix7+$choix8+$choix9+$choix10+$choix11+$choix12;
                        $score= ($total1+$total2);
                        $idetu=$_SESSION['id'];
                        
                        $titre="ORGANISATION MATERIEL DU COURS";
                        $detailq="Comment appreciez-vous la programmation de ce cours ?";
                        $requete=$conn->exec("INSERT INTO questionnaire(titreq,detailq,date) VALUES('$titre','$detailq','$datetime') ");
                        if($requete){
                            $idquest=findQuestionnaireByDateTime($datetime);
                            $requete2=$conn->exec("INSERT INTO ligne_score_cours_etu(idetu,idcours,idquest,dateLigne,score) VALUES('$idetu','$idcours','$idquest','$datetime','$score') ");
                            if($requete2){
                                echo "<script>alert('ENREGITREMENT EFFECTUER AVEC SUCCES ')</script>";
                                echo "<script>window.location.href='../index.php';</script>";
                                  exit;
                                }else{
                                    echo "<script>alert('ENREGITREMENT NON EFFECTUER 1 ')</script>";
                                }
                            }else{
                                echo "<script>alert('ENREGITREMENT NON EFFECTUER 2 ')</script>";
                            }
                    }
                }
                
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Formulaire</title>

<link href="../css/styles.css" rel="stylesheet">
<link href="../LoginCss/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <?php            
            // RECUPERATION DES PROESSEURS PAR CLASSE PAR classe
            //   @
              
            $requette1=$conn->query("SELECT * FROM cours WHERE idcl='$cl' AND active=1 AND evaluer=0  ");

                // $requette1=$conn->query("SELECT u.iduser,nom,prenom,libellec FROM ligne_prof_cours lpc,utilisateur u,cours cr WHERE lpc.idcours=cr.idcours AND lpc.idprof=u.iduser ");
                
            
                // $req1=$base->query("SELECT * FROM ligne_classe WHERE idprof=$prof ");
    
        
    ?>
	<br><br><br>	
 <form action="" method="POST">		
	<div class=" panel ">
        <div class="box" style="width: 1000px; top:-75px; height: 1400px;">
        <center><h2 id="logintoregister">FICHES D'EVALUATION DES ENSEIGNEMENTS</h2></center>
            <fieldset>
                Prénom(s) & Nom de l'étudiant:(<i>Facultatif </i>) : <input type="text" readonly="true" name="prenomEtNom" value="<?=$_SESSION['prenom']." ".$_SESSION['nom']?>" >&nbsp;&nbsp;&nbsp;
                Classe : <input type="text" name="classe" readonly="true" value="<?=$clas?>" ><br/><br/>
                Semestre : <input type="text" name="semestre" value="<?=""?>" >&nbsp;&nbsp;&nbsp;
                Module : <select  name="module" >
                <option  value="">--Choisissez un Module--</option>
            <?php 
                if($requette1)
                {
                    while($pr=$requette1->fetch())
                    { //$ligne=finduserByMatricule($pr['iduser']);
                    ?>
                    <option value="<?=$pr['libellec']?>"><?php echo $pr['libellec'];?> </option>
                    <?php 
                    }
                }
            ?>
                </select>
                &nbsp;&nbsp;&nbsp;
                Volume horaire : <input type="text" name="Vhoraire" >Heures<br/><br/>
                Professeur : <input type="text" name="formateur" />

                 &nbsp;&nbsp;&nbsp;Période d'enseignement : <input type="text" placeholder=" aaaa / mm / jj" name="date1" width="5">&nbsp;&nbsp;au&nbsp;<input type="text" placeholder=" aaaa / mm / jj" name="date2" width="5">
            </fieldset>
                <br>
                &nbsp;&nbsp;<sup>1</sup>choisissez le score de votre choix :<br/>
                &nbsp;&nbsp;<b><u>Légende :</u>&nbsp;&nbsp;&nbsp;&nbsp;4 =</b> tres Satisfaisant      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3 = </b>Moyennement Satisfaisant           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<b>2 = </b>Satisfaisant        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>1 = </b>Pas du tout Satisfaisant 
                <hr>
                <table width="900" >
                <tr><th >CRITERES D'EVALUATION</th><th>SCORE&nbsp;<sup>1</sup></th></tr>
               </table>
            <!--     @ choix sont aux nombre de 13 (numeroter de 0 a 12 )
                    le nom des input est de: choix suivi du numero.

                    EXEMPLE : <input type="radio" name="choixO" checked > jusqua <input type="radio" name="choix12" checked >    
             -->
               <fieldset>
                        <legend>ORGANISATION MATERIEL DU COURS</legend>
                        <table width="900" >
                    <tr><th width="600">Comment appreciez-vous la programmation de ce cours ?&nbsp;&nbsp;</th><th width="200">  &nbsp;&nbsp;      1:<input type="radio" name="choix1" value="1" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix1">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix1">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix1">
                    </th>
                    </tr>
                    <tr><th border="1">Comment appreciez-vous le planning de ce cours (emploi du temps) ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix2" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix2">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix2">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix2"</th>
                    </tr>
                    <tr><th>Comment jugez-vous l'organisation logistique (salle de cours, meteriel de projection) ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix3" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix3">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix3" value="">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix3"</th>
                    </tr>
                    </table>
                </fieldset>
                <br/>
                <fieldset>
                        <legend>PRESTATION DU PROFESSEUR</legend>
                        <table width="950" >
                    <tr><th >Comment avez-vous apprescie les capacites pedagogiques du professeur(<i>animation, explication, reponses aux questions des etudiants</i>) ?&nbsp;&nbsp;</th><th width="300">&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix4" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix4">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix4">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix4"></th>
                    </tr>
                    <tr><th>Comment jugez-vous la maitrise par le professeur des themes developpes pardans le cours ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix5" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix5">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix5">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix5"></th>
                    </tr>
                    <tr><th>Comment apresiez-vous les methodes pedagogiques employees(cours magistraux, TP, traveau de groupe, exercices, etc.) ?</th><th><input type="radio" value="1" name="choix6" checked >1: adaptees au cour<br/> <input type="radio" value="2" name="choix6">2: inaptees au cours<br/></th></tr>
                    <tr><th>Comment apresiez-vous la qualite des documents et support de cours diffuses par le professeur ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix7" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix7">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix7">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix7"</th>
                    </tr>
                    <tr><th>Comment apresiez-vous la gestion du temps et du programme par le professeur(respect du syllabus et du) ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix8" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix8">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix8">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix8"></th>
                     programme, respect de l'emploie du temps</tr>
                     <tr><th>Que pensez-vous du comportement du proesseur en classe(ecoute, pacience, rigeur, capacite a maintenir la discipline, capacites relationnelles, capacite a motiver l'interet des etudiants pour son cours etc.) ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix9" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix9">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix9">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix9"</th>
                    </tr>
                    <tr><th>Comment apresiez-vous le deroulement des cours par rapport a vos attentes ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix10" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix10">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix10">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix10"</th>
                    </tr>
                    <tr><th>Comment apresiez-vous l'assiduites et la ponctualite du professeur ?</th><th>&nbsp;&nbsp; <input type="radio" value="2" name="choix11" checked >Assudi et ponctuel<br/><input type="radio" value="1" name="choix11">peut s'ameliorer<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="3" name="choix11">Absenteiste et retardataire</th>
                    </tr>
                    <tr><th>Globalement comment apprecies-vous la prestation du professeur ?</th><th>&nbsp;&nbsp;      1:<input type="radio" value="1" name="choix12" checked > &nbsp;&nbsp;2:<input type="radio" value="2" name="choix12">&nbsp;               &nbsp;3:<input type="radio" value="3" name="choix12">&nbsp;&nbsp;4:<input type="radio" value="4" name="choix12"</th>
                    </tr>
                    </table>
                </fieldset>
                <br/>
                &nbsp;&nbsp;Qu'avez-vous le plus apperécié dans ce cours ?<br/>
                &nbsp;&nbsp;<textarea name="apreciation" cols="75" rows="5"></textarea><br/>
                &nbsp;&nbsp;Qu'avez-vous le moins appérecié dans ce cours ?<br/>
                &nbsp;&nbsp;<textarea name="critique" cols="75" rows="5"></textarea><br/>
                &nbsp;&nbsp;Quelles sont vos suggestions pour améliorer ce cours ?<br/>
                &nbsp;&nbsp;<textarea name="suggestion" cols="75" rows="5"></textarea><br/>


    </form>  
    <button name="btnValiderScore"   type="submit"> Valider </button>
    <button name="btnRetour" type="submit"> <a href="../index.php">Retour</a> </button>
    <?php 
    if(isset($_POST['btnRetour'])){
        unset($_SESSION);
        session_destroy();
        header('location:indexetu.php');
    }


     ?>
    <br/>
    <br/>
  <div id="footer-box" style="width: 1350px;">
  </div>
</div>

</body>

</html>
