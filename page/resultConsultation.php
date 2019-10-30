<?php



function __autoload($class){
  require_once "../classes/$class.php";

}

    $idrvTerminer = $_GET['terminer'];
    $date =Date('Y-m-d H:i:s');
    $rendez_vous = new RV();
    
    if(isset($_POST['BtnValider'])) {
        extract($_POST);

        if(empty($reslConsultat)){
            echo "<script>alert('RENSEIGNEZ LE CHAMPS AVANT DE VALIDER')</script>";
        }elseif(is_numeric($reslConsultat)){
            echo "<script>alert('RENSEIGNEZ DES VALEURS VALIDE')</script>";
        }else {
            $DonneeRV_term =[
                'etat'=>1,
                'rvreporte'=>1,
                'datefin'=>$date,
                'resultatConsult'=>$reslConsultat
                ];
                
            $verif = $rendez_vous->UpDateRV($DonneeRV_term,$idrvTerminer);
                if($verif){
                header('location:valides.php');
                }
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

   

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bien Etre</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
   

    <li class="nav-item">
      <a class="nav-link" href="encours.php">
        <i class="fas fa-fw fa-tachometer-alt"></i><br>
        <span><h6>Liste des rendez-vous valides ou a reporter</h6></span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="valides.php">
        <i class="fas fa-fw fa-tachometer-alt"></i><br>
        <span></h6>Liste des rendez-vous en cours</h6></span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="termines.php">
        <i class="fas fa-fw fa-tachometer-alt"></i><br>
        <span><h6>Liste des rendez-vous terminés</h6></span></a>
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

     

            <div class="row ml-2">
             

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <h3><center>Bienvenue sur l'interface du Medecin</center></h3>
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>
<form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
     
    
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
</div>




        <div class="resultat">
           <div class="form-group row">
                <textarea class="form-control form-control-user" name="reslConsultat" cols="35" rows="2" placeholder="Déscrivez le resultat de ce Rendez-Vous terminé" ><?=$reslConsultat;?></textarea>
            </div>

            <input type="submit" name="BtnValider" value="VALIDER" class="btn btn-primary btn-user btn-block" >
       
        </div>
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

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
