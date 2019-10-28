<?php 
    session_start();
    if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="admin") {
      sleep(1);
      echo "<script>window.location.href='../index.php';</script>";
  }
  if(isset($_REQUEST['logout']))
  {
    unset($_SESSION);
    session_destroy();
    echo"<script>window.location.href='../index.php';</script>";
  }

    require_once"fonction_pdo.php";

    $conn= connect();
    extract($_POST);
      if (isset($_POST['BtnValider'])) {
        echo "<script>alert('test bon ');</script>";

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

  <title>matiere prof</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="indexN.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IPD / DAKAR</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <br>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>ETUDIANT :</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Propriete Etudiant:</h6>
            <a class="collapse-item" href="#">Profil Etudiant</a>
            <a class="collapse-item" href="liste_classe.php">Liste des etudiants</a> 
            <a class="collapse-item" href="inscrire.php">Ajouter un Etudiant</a>
            <a class="collapse-item" href="#">Supprimer un etudiant</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>PROFESSEUR :</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Propriete Professeur:</h6>
            <a class="collapse-item" href="liste_prof.php">Liste des professeurs</a> 
            <a class="collapse-item" href="#">Modifier un professeurs</a>
            <a class="collapse-item" href="inscrire.php">Ajouter un professeur</a>
            <a class="collapse-item" href="#">Supprimer un professeur</a>
          </div>
        </div>
      </li>

    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Questionnaire </span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Propriete Questionnaire:</h6>
      <a class="collapse-item" href="#">Liste des Questionnaires</a>
            <a class="collapse-item" href="#">Ajouter un Questionnaire</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Questionnaire :</h6>
      <a class="collapse-item" href="#">Modifier un Questionnaire</a>
            <a class="collapse-item" href="#">Supprimer Questionnaire</a>
      </div>
    </div>
    </li>
    <hr class="sidebar-divider">
      
      <li class="nav-item">
        <a class="nav-link" href="ajout_classe.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Ajouter une Classe</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_classe.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Lister les Classes</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajout_niveau.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Ajout Niveau</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ajoutmatiere.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Ajout Matière</span></a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="matiere_prof.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Confier Matière</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="activation.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Activation Matière</span></a>
      </li>

    <br/>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

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
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?=$_SESSION['prenom']." ".$_SESSION['nom']?></b></span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <button name="logout">Deconnexion</button>  
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
<form method="POST" action="">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">LES MODULES SANS FORMATEUR</h1>

            <div class="row">
              <!--  
                  les matiere qui sont en phase d'evaluation
                -->
            </div>
            <?php
                  $matAct=$conn->query("SELECT * FROM cours WHERE iduser IS NULL ");
                  //$evaluer=CoursDejaEvaluer();
            ?>
               <div class="card shadow mb-3">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Affecter un module a un formateur </h6>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>N<sup>o</sup> </th>
                      <th>Module</th>
                      <th>V-Horaire</th>
                      <th>Classe</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        
                      if($matAct)
                        { $i=1;
                            while($lg=$matAct->fetch())
                            {      
                              $classe=findClassById($lg['idcl']);
                              $prof=finduserByMatricule($lg['iduser']);
                              
                        ?> 
                    <tr>
                      <td><?=($i++)?></td>
                      <td><?=$lg['libellec']?></td>
                      <td><?=$lg['volumeHor']?></td>
                      <td><?=$classe?></td>
                      <td><a href="tmp_matiere.php?maj=<?=$lg['idcours']?>" class="btn btn-primary btn-user btn-block">Choisir Formateur</a></td>

                    </tr>
                    <?php
                          } //class="btn btn-primary btn-user btn-block"   
                        }             

                          // if (isset($_GET['maj'])) 
                          // {
                          //   $idc=$_REQUEST['maj'];
                          //   //$user=$pr['iduser'];
                          //   $user=$formateur;
                          //   echo "<script>alert('test valeur'+$user)</script>";
                            // $courok=$conn->exec("UPDATE cours SET iduser='$user' WHERE idcours='$idc' ");
                            //   if($courok){
                            //     echo "<script>alert('VALIDATION D UN NOUVEAU MODULE ')</script>";
                            //     echo"<script>window.location.href='matiere_prof.php';</script>";
                            //     }else{
                            //       echo "<script>alert('VALIDATION NON REUSSIT')</script>";
                            //       echo"<script>window.location.href='matiere_prof.php';</script>";
                            //       }
                          // }

                            //$cour=CoursPasActive();
                              //echo"<script>window.location.href='activation.php';</script>";

                    ?> 
                  </tbody>
                </table>
                      <!--  -->
              </div>
            </div>
            
          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</form>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; IPD - Dakar 2019 <?=""?></span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prêt à Quitter ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selectionnez Déconneter si vous voulez vraiment quitter.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" name="logout" href="../index.php">Déconneter</a>
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
