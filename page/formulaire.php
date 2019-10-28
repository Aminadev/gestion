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

       


    if(isset($_POST['BtnEnregistrer'])){
      extract($_POST);
      $heure = str_pad($heure, 2, 0, STR_PAD_LEFT);
      $minute = str_pad($minute, 2, 0, STR_PAD_LEFT);
      $dateTime = $date." ".$heure.":".$minute.":00";
      
        // echo "$nom $prenom $adresse $tel $sexe $datenaiss $antmedico $description $dateTime";
        // if(!($minute>59 || $minute<0) || !($heure>17 || $heure<8)){
        //     if($heure>13 && $heure<15){
        //       echo "<script>alert('DESOLE !!! L HEURE CHOISIS EST UNE HEURE DE PAUSE ')</script>";
        //     }
        // }
    //   //$service = new Service();
      $dateajout = Date('Y-m-d')." ".Date('H:i:s');
        // $fields = [
        //     'nom'=>$nom,
        //     'prenom'=>$prenom,
        //     'adresse'=>$adresse,
        //     'datenaiss'=>$datenaiss,
        //     'sexe'=>$sexe,
        //     'telephone'=>$tel,
        //     'mdp'=>$
        //     'antmedico'=>$antmedico,
        //     'dateajout'=>$dateajout
        //       ];
        $r_v = new RV();
         $patient = new User();
         $patient->InsertMedecin($fields);
          $idpat = $patient->FindPatientBYDateAjout($dateajout);
        
        $DonneRV = [
          'date'=>$dateTime,
          'description'=>$description,
          'idmed'=>5,
          'idpatient'=>$idpat['idpatient'],
          'idsecretaire'=>$_SESSION['id'],
          'etat'=>0,
          'rvreporte'=>0,
          'datefin'=>NULL
            ];

        $r_v->insertion($DonneRV);
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
                    <input type="text" name="date" class="form-control form-control-user"  placeholder="AAAA-MM-JJ">
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
                  
                    <select name="domaine" class="btn btn-primary dropdown-toggle mb-sm-3">
                        <option value=""> choisi un medecin</option>
                        <?php
                             $d = 1;
                             $medecins = new Medecin();
                             $Med = $medecins->FindServiceBYDomaine($_SESSION['service']);
                             //var_dump($med);
                            foreach($Med as $el){    ?>
                        <option value="<?=$el['idmed'];?>" > <?=$el['prenom']."  ".$el['nom'];?> </option>
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
                    <input type="text" name="datenaiss" class="form-control form-control-user"  placeholder="Date Naissance  Patient">
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
