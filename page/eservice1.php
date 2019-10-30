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

       


    if(isset($_POST['BtnAjout'])){
      extract($_POST);
      
        $tabDonnee = [
            'nomserv'=>$nomService,
            'specialite'=>$specialite
              ];

         $patient = new Service();
         $patient->insertion($tabDonnee);
    
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

  <title>Espace Services</title>

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

      <div class="col-xl-12 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-4">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <!--- le contenue des deux parties image et form-->
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <h3>test</h3>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ajouter un Service</h1>
                  </div>
                  <form class="user" method="POST" >
                  
                  <div class="form-group row">
                  
                                  <div >
                  
                    <!-- <select name="domaine" class="btn btn-primary dropdown-toggle mb-sm-3">
                        <option value=""> choisi un medecin</option>
                        <?php
                            //  $d = 1;
                            //  $medecins = new Medecin();
                            //  $Med = $medecins->FindServiceBYDomaine($_SESSION['service']);
                            //  //var_dump($med);
                            // foreach($Med as $el){    ?>
                        <option value="<?//=$el['idmed'];?>" > <?//=$el['prenom']."  ".$el['nom'];?> </option>
                          
                          <?php // }  ?>
                         
                    </select>                   -->
                  </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-3">
                  <label for="">Nom du Service:</label>
                    <input type="text" name="nomService" class="form-control form-control-user" placeholder="Nom du Service">
                  </div>
                  <div class="col-sm-6">
                  <label for="">Specialite du Service:</label>
                    <input type="text" name="specialite" class="form-control form-control-user"  placeholder="Spécialité">
                  </div>
                </div>
                </div>
                
                <input type="submit" name="BtnAjout" value="AJOUTER" class="btn btn-primary btn-user btn-block" >
                <a href="#" class="btn btn-primary btn-user btn-block" >   RETOUR  </a>
                    
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
