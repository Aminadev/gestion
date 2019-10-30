<?php
      session_start();
      if((!isset($_SESSION['login']) and !isset($_SESSION['profil'])) OR ($_SESSION['profil']==1)) {
        sleep(1);
        echo "<script>window.location.href='../index.php';</script>";
      }

      function __autoload($class){
          require_once "../classes/$class.php";

        }

      if(isset($_GET['valider'])) {
      $idrv_valider=$_REQUEST['valider'];
      $DonneeRV_Val = [
      'etat'=>1
        ];
      $rendez_vous = new RV();  
      $verif = $rendez_vous->UpDateRV($DonneeRV_Val,$idrv_valider);
        if($verif){
          header('location:encours.php');
          }
      }
                                    //
      if (isset($_GET['reporter'])) {
        $idrv_reporter=$_REQUEST['reporter'];
        $DonneeRV_Rep = [
          'rvreporte'=>1
            ];
        $rendez_vous = new RV();  
        $verifier = $rendez_vous->UpDateRV($DonneeRV_Rep,$idrv_reporter);
          if($verifier){
            header('location:encours.php');
            }
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

  <title>RV encours</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>
<div id="wrapper">

<?php if($_SESSION['profil']==2){?>   
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     

      <hr class="sidebar-divider my-0">
        
       <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="formulaire.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Creer un Rendez-Vous</span></a>
      </li>

       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="reportes.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV Reportes</span></a>
      </li>

       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="encours.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV en cours</span></a>
      </li>

       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="valides.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV Valides</span></a>
      </li>

       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="termines.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV termines</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <?php }elseif($_SESSION['profil']==3){ ?>

      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bien Etre</div>
      </a>

      <hr class="sidebar-divider my-0">
   

    <li class="nav-item">
      <a class="nav-link" href="encours.php">
        <i class="fas fa-fw fa-tachometer-alt"></i><br>
        <span><h6>Liste des rendez-vous valides ou a reporter</h6></span></a>
    </li>

     <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="valides.php">
        <i class="fas fa-fw fa-tachometer-alt"></i><br>
        <span></h6>Liste des rendez-vous en cours</h6></span></a>
    </li>

     <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="termines.php">
        <i class="fas fa-fw fa-tachometer-alt"></i><br>
        <span><h6>Liste des rendez-vous terminés</h6></span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>

      <?php } ?>
    <!-- End of Sidebar -->
    

<body id="page-top">
  <!-- Begin Page Content -->
  <div class="container-fluid">

  <div>
  <br/>
</div>  

<!-- DataTales Example -->
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous termines</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
                      <th>Description</th>
                      <th>Date / Heure</th>
                      <th>Medecin</th>
                      <!-- <th>Domaine</th> -->
                      <th>Nom_P</th>
                      <th>Prenom_P</th>
                      <th>Age_P</th>
                      <th>Sexe_P</th>
                      <th>Antecedent Medico</th>
                      <?php if($_SESSION['profil']==3){?>
                        <th>ACTION</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Description</th>
                      <th>Date / Heure</th>
                      <th>Medecin</th>
                      <!-- <th>Domaine</th> -->
                      <th>Nom_P</th>
                      <th>Prenom_P</th>
                      <th>Age_P</th>
                      <th>Sexe_P</th>
                      <th>Antecedent Medico</th>
                      <?php if($_SESSION['profil']==3){?>
                        <th>ACTION</th>
                      <?php } ?>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $date = Date('Y');
                    $service = new Service();
                    $medecin = new User();
                    $patient = new Patient();
                    $secretaire = new User();
                        $rv = new RV();
                        $ligne = $rv->RV_Encours_ParMedecin($_SESSION['id']);
                      
                        //  si jamais le tableau est vivde pour ne pas generer des erreurs sur le forsach 
                        if($ligne == null){ ?>
                          <tr><td>AUCUN RENDEZ-VOUS TROUVE</td></tr>
                      <?php  }else{
                        $cpt=1;
                        foreach($ligne as $elt){ 
                          $pt = $patient->FindPatientBYid($elt['idpatient']);
                          $med = $medecin->FindMedecinBYid($elt['idmed']);
                          // $domaine = $service->SelectDomaine($med['iddomaine']);
                        ?>
                    <tr>
                      <td> <?=$elt['description'];?> </td>
                      <td> <?=$elt['date'];?> </td>
                      <td> <?=$med['prenom']."  ".$med['nom'];?> </td>
                      <!-- <td> <?//=$domaine['nomdomaine'];?> </td> -->
                      <td> <?=$pt['nom'];?> </td>
                      <td> <?=$pt['prenom'];?> </td>
                      <td> <?=($date.substr($pt['datenaiss'],4,6)-$pt['datenaiss']);?> </td>
                      <td> <?=$pt['sexe'];?> </td>
                      <td> <?=$pt['antmedico'];?> </td>
                      <?php if($_SESSION['profil']==3){?>
                      <td>
                        <a href="encours.php?valider=<?=$elt['idrv']?>" class="btn btn-success btn-user btn-block">Valider </a>
                        <a href="encours.php?reporter=<?=$elt['idrv']?>" class="btn btn-info btn-user btn-block">Reporter </a>
                      </td>
                      <?php } ?>
                    </tr>
                        <?php     }
                                }
                                   // $date =Date('Y-m-d H:i:s');
                                  //   if(isset($_GET['valider'])) {
                                  //       $idrv_valider=$_REQUEST['valider'];
                                  //       $DonneeRV_Val = [
                                  //         'etat'=>1
                                  //           ];
                                  //             $rendez_vous = new RV();  
                                  //             $verif = $rendez_vous->UpDateRV($DonneeRV_Val,$idrv_valider);
                                  //             // if($verif){
                                  //             //        header('location:valides.php');
                                  //             //   }
                                  //         }
                                  //   //
                                  //   if (isset($_GET['reporter'])) {
                                  //     $idrv_reporter=$_REQUEST['reporter'];
                                  //     $DonneeRV_Rep = [
                                  //       'rvreporte'=>1
                                  //         ];
                                  //           $rendez_vous = new RV();  
                                  //           $verifier = $rendez_vous->UpDateRV($DonneeRV_Rep,$idrv_reporter);
                                  //       //     if($verifier){
                                  //       //     header('location:encours.php');
                                  //       // }
                                  // }
                             ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
  <span>Copyright &copy; Your Website 2019</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>


</body>

</html>
