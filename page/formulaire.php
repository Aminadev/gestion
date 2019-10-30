<?php 
        session_start();

        if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!=2) {
          sleep(1);
          echo "<script>window.location.href='../index.php';</script>";
         }

       //  echo $_SESSION['id'];

        function __autoload($class){
            require_once "../classes/$class.php";
        }

        $rendezVous = new RV();
        


    if(isset($_POST['BtnEnregistrer'])){
      extract($_POST);
      // FONCTION POUR VERIFIER SI UN NUMERO TELEFONE EST VALIDE
      function verif_alpha($str){
        // On cherche tt les caractères autre que [A-z]
        preg_match("/([^A-Za-z\s])/",$str,$result);
        // si on trouve des caractère autre que A-z
        if(!empty($result)){
          return false;
        }
        return true;
      }
        if(empty($minute) || empty($Date) || empty($description) || empty($antmedico) || empty($prenom) || empty($nom) || empty($adresse) || empty($datenaiss) || empty($tel) || empty($sexe)){
          echo "<script>alert('VUEILLEZ RENSEIGNEZ TOUS LES CHAMPS ')</script>";  
              
        }elseif($idMedecin==""){
          echo "<script>alert('VUEILLEZ CHOISIR UN MEDECIN POUR LE RENDEZ-VOUS ')</script>";  
        }else{

          $heure = str_pad($heure, 2, 0, STR_PAD_LEFT);
          $minute = str_pad($minute, 2, 0, STR_PAD_LEFT);
          $dateTime = $Date." ".$heure.":".$minute.":00";

          //  CONVERTION DES DEUX DATES POUR LA COMPARESON
            $ds = explode("-", $Date);
            $dj = explode("-", Date('Y-m-d')); 
            $datejours = $dj[0].$dj[1].($dj[2]-1);
            $datesaisie = $ds[0].$ds[1].$ds[2];

            // $tabDate = explode('-', $Date);
            // $timestamp = mktime(0, 0, 0, $ds[0], $ds[1], $ds[2]);
            // $jour = date('w', $timestamp);

            if(!($datejours < $datesaisie)){
              echo "<script>alert('DESOLE !! VOUS NE POUVEZ PAS PROGRAMMER UNE DATE ANTERIEUR A LA DATE D\'AUJOURD\'HUI ')</script>";
            }else{

              if(($heure>=8 && $heure<=17)){
                if($heure>13 && $heure<15){
                  echo "<script>alert('DESOLE !!! LES MEDECINS  SONT EN PAUSE ENTRE 13H et 15H Veuillez choisir une autre heure ')</script>";
                  }else{
                      if(!($minute>=0 && $minute<=59) || !is_numeric($minute)){ 
                        echo "<script>alert('DESOLE !!! saisie des minutes valide')</script>";
                        //  VERIFACATION: SI LES CHAMPS SONT BIEN RMPLI
                      }elseif(verif_alpha($prenom)==TRUE && verif_alpha($nom)==TRUE && verif_alpha($description)==TRUE && verif_alpha($antmedico)==TRUE && verif_alpha($adresse)==TRUE)
                      {
                        // VERIFICATION DU NUMERO DE TELAPHONE 
                        $nb= strlen($tel); $x=substr($tel,0,2);
                        if(is_numeric($tel)=="true" && $nb==9 && ($x=="77" || $x=="78" || $x=="70" || $x=="76")){
            /*    
              lors de la creation d'un rendez-vous ont effectue un double insertion 
              l'un au niveau de table patient et l'autre qui concerne le rendez-vous en question 
              
              cause pour le quelle on a les deux tableau contenant les donnees respective 
              du patient et du rendez-vous
                */ 
            if(Doublons_RV($idp,$idmed,substr($date,0,10),$idsec)){

                $Rv = $rendezVous->Select_RV_NonTermine();
                $doublons = 0;
                foreach($Rv as $eltbd){        
                      $dts = substr($eltbd['date'], 0, 10);
                      $hrs = substr($eltbd['date'], 11, 2);
                      $mns = substr($eltbd['date'], 14, 2);
                      if($dts == $Date && $hrs == $heure && $mns == $minute && $idMedecin==$eltbd['idmed']){
                        $doublons = 1;
                        echo "<script>alert('DESOLE !!! UN RENDEZ-VOUS EST DEJA RESERVE A L\'HEURE CHOISI ')</script>";                  
                      }
                   }

                   if($doublons == 0){
                    //  Donnee du patient
                          $dateajout = Date('Y-m-d')." ".Date('H:i:s');
                          $fields = [
                              'nom'=>$nom,
                              'prenom'=>$prenom,
                              'adresse'=>$adresse,
                              'datenaiss'=>$datenaiss,
                              'telephone'=>$tel,
                              'sexe'=>$sexe,
                              'antmedico'=>$antmedico,
                              'dateajout'=>$dateajout
                                ];
                          $r_v = new RV();
                           $patient = new Patient();
                           $patient->insertion($fields);
                            $idpat = $patient->FindPatientBYDateAjout($dateajout);
                      // Donnee du rendez-vous
                          $DonneRV = [
                            'date'=>$dateTime,
                            'description'=>$description,
                            'idmed'=>$idMedecin,
                            'idpatient'=>$idpat['idpatient'],
                            'idsecretaire'=>$_SESSION['id'],
                            'etat'=>0,
                            'rvreporte'=>0,
                            'datefin'=>NULL
                              ];
                          $verif = $r_v->insertion($DonneRV);
                          if($verif){
                            header('location:encours.php'); 
                          }

                        }
                      }else{
                        echo "<script>alert('DESOLE CE PATIENT A DEJA UN RENDEZ-VOUS LE MEME JOUR')</script>";
                      } 

                        }else{
                          echo "<script>alert('LE NUMERO DE TELEPHONE SAISIE N\'EST PAS VALIDE')</script>";
                        }

                      }else{
                        echo "<script>alert('VEUILLEZ REVOIR LES INFORMATON SUR LE PATIENT')</script>";
                      }
                }
              }else{
                echo "<script>alert('DESOLE !!! L\'heure saisie est invalide')</script>";
              }
          }
        }
      
        // }else{
        //   echo "<script>alert('DESOLE !! VOUS NE POUVEZ PAS FIXE UNE DATE ANTERIEUR A LA DATE D\'AUJOURD\'HUI)</script>";
        // }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Formulaire</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Creer un Rendez-Vous</h1>
                  </div>
                  <form class="user" method="POST" >
                  
                  <div class="form-group row">
                  
                  <div class="col-sm-5">
                    <input type="date" name="Date" class="form-control form-control-user"  placeholder="AAAA-MM-JJ">
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="text" name="heure" class="form-control form-control-user" placeholder="Heure" >
                  </div>
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="text" name="minute" class="form-control form-control-user" placeholder="Minute">
                  </div>
                </div>
                <div class="form-group row">
                <textarea class="form-control form-control-user" name="description" cols="35" rows="1" placeholder="déscrivez l'objet de ce Rendez-Vous"></textarea>
                </div>
                <div class="form-group row">
                <textarea class="form-control form-control-user" name="antmedico" cols="35" rows="1" placeholder="Les antécédent medico du patient"></textarea>
                </div>
                <div class="form-group row">
                <div class="col-sm-6">
                    <label >Le Medecin </label>                 
                </div>
                  <div >
                  
                    <select name="idMedecin" class="btn btn-primary dropdown-toggle mb-sm-3">
                        <option value=""> choisi un medecin</option>
                        <?php
                             $medecins = new User();
                             $Med = $medecins->FindServiceBYDomaine($_SESSION['service']);
                             //var_dump($med);
                            foreach($Med as $el){    ?>
                        <option value="<?=$el['iduser'];?>" > <?=$el['prenom']."  ".$el['nom'];?> </option>
                          <?php  }  ?>
                    </select>                  
                  </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-3">
                    <input type="text" name="prenom" class="form-control form-control-user" placeholder="Prenom Patient">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="nom" class="form-control form-control-user"  placeholder="Nom  Patient">
                  </div>
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="adresse" class="form-control form-control-user" placeholder="Adresse Patient">
                  </div>
                  <div class="col-sm-6">
                    <input type="date" name="datenaiss" class="form-control form-control-user"  placeholder="Date Naissance  Patient">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-3">
                    <input type="text" name="tel" class="form-control form-control-user"  placeholder="Telephone Patient">
                  </div>
                  <div class="col-sm-6">

                  <div class="form-check form-check-inline">
                    <input  type="radio" name="sexe" value="Homme" >Homme&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="sexe" value="Femme" >Femme
                  </div>
                </div>
                
                <input type="submit" name="BtnEnregistrer" value="ENREGISTRER" class="btn btn-primary btn-user btn-block" >
                <a href="secretaire.php" class="btn btn-primary btn-user btn-block" >   RETOUR  </a>
                    
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
