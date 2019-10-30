<?php
         session_start();
         if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!=1) {
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

  <title>Liste Secetaire</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Dalal Djam</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <br>
  <br>
</li>

<!-- Divider -->


<!-- Heading -->
<!-- <div class="sidebar-heading">
  Interface
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Espace Medecin</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Custom Components:</h6> -->
      <a class="collapse-item" href="ajoutMedecin.php">Ajouter un Medecin</a>
      <a class="collapse-item" href="listeMedecin.php">Lister les Medecin</a>
    </div>
  </div>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Espace Secretaire</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
      <a class="collapse-item" href="ajoutSecretaire.php">Ajouter un Secretaire</a>
      <a class="collapse-item" href="listeSecretaire.php">Lister les Secretaire</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="login.html">Login</a>
      <a class="collapse-item" href="register.html">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li>  -->
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="eservice.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Espace Service</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="edomaine.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Espace Domaine</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="profil.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Espace Profil</span></a>
      </li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

</ul>
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            
          </form>

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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste des Secretaires</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>N°</th>
                      <th>Prenom</th>
                      <th>Nom</th>
                      <th>Adresse</th>
                      <th>Telepone</th>
                      <th>Age</th>
                      <th>Service</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Prenom</th>
                      <th>Nom</th>
                      <th>Adresse</th>
                      <th>Telepone</th>
                      <th>Age</th>
                      <th>Service</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php 
                      $ordre=0;
                            $secretaire = new User();
                            $service = new Service();
                            $ligne = $secretaire->AllSecretaire();
                            //
                            if($ligne == null){ ?>
                                <tr><td>PAS DE SECRETAIRE</td></tr>
                            <?php  }else{
                            foreach($ligne as $el){
                            $ordre++;
                            $ser = $service->FindServiceBYID($el['idserv']);
                            $date = Date('Y');
                            $anneenaiss = substr($el['datenaiss'],0,4);
                      ?>
                    <tr>
                      <td><?=$ordre;?></td>
                      <td><?=$el['prenom'];?></td>
                      <td><?=$el['nom'];?></td>
                      <td><?=$el['adresse'];?></td>
                      <td><?=$el['telephone'];?></td>
                      <td><?=($date-$anneenaiss);?></td>
                      <td><?=$ser['nomserv'];?></td>
                      <td>
                        <a  href="listeSecretaire.php?idsec=<?=$el['iduser'];?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i> </a>
                        <a href="modifSecretaire.php?idsec=<?=$el['iduser'];?>" class="btn btn-info btn-circle"><img src="../img/1.png" alt="mod"></a>
                      </td>
 
                      </td>
                    </tr>
                    <?php       
                            }
                        }
                    ?>
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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

  <!-- Logout Modal-->
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

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
