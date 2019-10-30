<?php 
        session_start();
        if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!=2) {
          sleep(1);
          echo "<script>window.location.href='../index.php';</script>";
         }

      if(isset($_REQUEST['BtnDeconnect']))
      {
        unset($_SESSION);
        session_destroy();
        echo"<script>window.location.href='../index.php';</script>";
      }

        function __autoload($class){
            require_once "../classes/$class.php";
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

  <title>Secretaire</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="text/javascript" src="../js/appli.js">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
        
       <!-- Divider -->
       <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="formulaire.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Creer un Rendez-Vous</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="reportes.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV Reportes</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="encours.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV en cours</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="valides.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV Valides</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="termines.php">
          <i class="fas fa-fw fa-tachometer-alt"></i><br>
          <span>Liste RV termines</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            
          </div>

          <!-- Topbar Navbar -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?=$_SESSION['prenom']." ".$_SESSION['nom'];?></b></span>
                <img class="img-profile rounded-circle" src="../img/profil.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil_user.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Deconnexion
                </a>
              </div>
            </li>

          </ul>

          </nav>


          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
            <!-- <div class="input-group">
              <h1>Secretaire</h1>
            </div> -->
            <?php  
                  $rendezVous = new RV();
                  $rv = $rendezVous->RV_DeLaJournnee();
                  if($rv == 0){
                    $NbRv = 0;
                  }else{
                    $NbRv = $rv->rowCount();
                  }
            ?>
                </div>

              <div class="row ml-2">
               
                <!-- LES CLASSES DE L'ETABLISEMENT SANITAIRE -->
                <div class="col-xl-4 col-md-6 mb-4 ml-5 mt-3">
                  <div class="card border-left-info shadow h-10 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><button id="b1"><!--a href="#" -->> RV programmés de la journnée: </button></div>
                          <div class="h5 mb-0 font-weight-bold text-gray-600"><?=$NbRv;?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4 ml-5 mt-3">
                  <div class="card border-left-primary shadow h-10 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">RV programmés de la semaine: : <?=$s['nomserv']?></div>
                          <div class="h5 mb-0 font-weight-bold text-gray-600">3<?//=$rv->RV_DeLaSemaine();?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    <div id="rvjournnee">

    <div class="card shadow mb-4 ml-4" id="rvjournnee">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous en cours</h6>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                      <th>Description</th>
                      <th>Date / Heure</th>
                      <th>Medecin</th>
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
                        if($_SESSION['profil']==2){
                        $ligne = $rv->RV_Encours();
                      }elseif($_SESSION['profil']==3){
                        $ligne = $rv->RV_Encours_ParMedecin($_SESSION['id']);
                      }
                      
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
                             ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>

</div>



              </div>


        </div>
              

                   </div>

                  </div>
                </form>
              </div>
            </li>

          

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
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <form action="" method="POST">

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la deconnection</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Si vous voulez vraiment quitter appuyez sur "DECONNECTER".</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <button type="submit" name="BtnDeconnect" class="btn btn-primary" >Deconnecter</button>
        </div>
      </div>
    </div>
  </div>
</form>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script src='appli.js'></script>
  <!-- <script>
        if(){
          
        }
      </script> -->

<script>
	function afficher_cacher(rvjournnee)
	{
      if(document.getElementById(rvjournnee).style.display == "block"){
        document.getElementById(rvjournnee).style.display = "none";
        document.getElementById('b1').innerHTML='Afficher';
      }else{
        document.getElementById(rvjournnee).style.display = "block";
        document.getElementById('b1').innerHTML='Masquer';
      }
  }
 
	</script>

</body>

</html>
