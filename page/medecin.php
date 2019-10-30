<?php
       session_start();
       if((!isset($_SESSION['login']) and !isset($_SESSION['profil'])) OR ($_SESSION['profil']!=3)) {
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

    // $idrv = $_GET['valider'];
    // $date =Date('Y-m-d H:i:s');
    // $rendez_vous = new RV();
    
    // if(isset($_POST['BtnValider'])) {

    //   $DonneeRV = [
    //     'etat'=>1,
    //     'rvreporte'=>1,
    //     'datefin'=>$date,
    //     'resultatConsult'=>$reslConsult
    //       ];
        
    //   $verif = $rendez_vous->UpDateRV($DonneeRV_Val,$idrv_valider);
    //     if($verif){
    //       header('location:encours.php');
    //       }
    //   }




?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Medecin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body id="page-top">

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
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
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

     

            <div class="row ml-2">
             

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- <h3><center>Bienvenue sur l'interface du Medecin</center></h3> -->
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>


     <!-- Topbar Search -->
<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  
<div class="input-group">
        
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>

        </div>
      </div>
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
  
    
      <!-- Topbar Navbar -->
      
          
</div>




        <!-- <div class="resultat">
           <div class="form-group row">
                <textarea class="form-control form-control-user" name="reslConsult" cols="35" rows="2" placeholder="Déscrivez le resultat de ce Rendez-Vous terminé"></textarea>
            </div>
            <input type="submit" name="BtnValider" value="VALIDER" class="btn btn-primary btn-user btn-block" >
       </div> -->
       </form>



<!-- 1ere TABLE -->
 
<!-- <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous valides ou a reporter</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Description</th>
            <th>date</th>
            <th>Secretaire</th>
            <th>Patient</th>
            <th>Valider/Reporter</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <tr>
            <th>Description</th>
            <th>date</th>
            <th>Secretaire</th>
            <th>Patient</th>
            <th>Valider/Reporter</th>
          </tr>
          </tr>
        </tfoot>
        
          <tr>
            <td>Analyses</td>
            <td>11/09/2018</td>
            <td>Mme Seck</td>
            <td>Astou Ndiaye</td>
            <td>
            <div class="my-2"></div>
              <input type="submit" value="Valider" class="btn btn-success btn-icon-split">
            
              <input type="submit" value="Reporter" class="btn btn-info btn-icon-split">
            </td>
          </tr>
          <tr>
            <td>Consultations</td>
            <td>12/09/2018</td>
            <td>Mme Seck</td>
            <td>Mamadou Diallo</td>
            <td>
            <input type="submit" value="Valider" class="btn btn-success btn-icon-split">
            
            <input type="submit" value="Reporter" class="btn btn-info btn-icon-split">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
/.container-fluid 

</div>
 FIN 1ere TABLE 


 2e TABLE 
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous en cours</h6>
  </div></div>                 
        </div>
      </div>
    </form>
</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Description</th>
            <th>date</th>
            <th>Secretaire</th>
            <th>Patient</th>
            <th>Terminer</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <tr>
            <th>Description</th>
            <th>date</th>
            <th>Secretaire</th>
            <th>Patient</th>
            <th>Terminer</th>
          </tr>
          </tr>
        </tfoot>
        
          <tr>
            <td>Analyses</td>
            <td>11/09/2018</td>
            <td>Mme Seck</td>
            <td>Astou Ndiaye</td>
            <td>
            <a href="#" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
              </a>
            </td>
          </tr>
          <tr> 
            <td>Consultations</td>
            <td>12/09/2018</td>
            <td>Mme Seck</td>
            <td>Mamadou Diallo</td>
            <td>
            <a href="#" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
container-fluid 

</div>
 "card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous terminés</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Description</th>
            <th>date</th>
            <th>Secretaire</th>
            <th>Patient</th>
          
          </tr>
        </thead>
        <tfoot>
          <tr>
          <tr>
            <th>Description</th>
            <th>date</th>
            <th>Secretaire</th>
            <th>Patient</th>
          
          </tr>
          </tr>
        </tfoot>
        
          <tr>
            <td>Analyses</td>
            <td>11/09/2018</td>
            <td>Mme Seck</td>
            <td>Astou Ndiaye</td>
          
          </tr>
          <tr>
            <td>Consultations</td>
            <td>12/09/2018</td>
            <td>Mme Seck</td>
            <td>Mamadou Diallo</td>
            
           
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>-->
 

</div>
<!-- FIN 3e TABLE -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
  <span>Copyright &copy; Khalil & Amy</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>

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

</body>

</html>
