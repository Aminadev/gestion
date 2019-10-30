<?php
function __autoload($class){
    require_once "../classes/$class.php";
  }

  if(isset($_POST['BtnValider'])){
      extract($_POST);
          $domaine = new Domaine();
            //  $ok =  $domaine->Doublons($idservice,$domaine);
    if(empty($nomdomaine)){
      echo "<script>alert('RENSEIGNER LE NOM DE DOMAINE')</script>";
    }elseif($idservice !=""){
        $tabDonnee = [
        'idserv'=>$idservice,
        'nomdomaine'=>$nomdomaine
          ];
        $verif = $domaine->insertion($tabDonnee);
        if($verif){
        header('location:page/edomaine.php');
          }
        }else{
          echo "<script>alert('CHOISI UN SERVICE')</script>";
        }  
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8-general-ci">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="index.css">


  <title>Espace domaine</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
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

<body id="page-top">



  <!-- Begin Page Content -->
  <div class="container-fluid">

  <div>
  <br/>
</div>  

<!--Conteneur  DataTales Example -->
<!-- <div class="card shadow mb-4">
</div> -->

<div class="Global">
<form action="" method="POST">
    <div class="droite" >
  <fieldset>
    <legend>ksck</legend>
  

      <label for=""> Nom Domaine</label>
      <input type="text" name="nomdomaine" placeholder="nom service"><br><br>
      <label for="">Service</label>
      <select name="idservice" class="btn btn-primary dropdown-toggle mb-sm-3">
          <option value=""> choisi un Service</option>
          <?php
            $service = new Service();
            $Serv = $service->select();
            foreach($Serv as $el)   {    ?>
            <option value="<?=$el['idserv'];?>" > <?php echo $el['nomserv'];?> </option>
            <?php  }  ?>             
      </select>
      <input type="submit" value="VALIDER" name="BtnValider">
      </fieldset>
    </div>

    <div class="gauche">

                <div class="card shadow mb-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Domaines</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>N°</th>
                      <th>Nom Domaine</th>
                      <th>Service</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>N°</th>
                      <th>Nom Domaine</th>
                      <th>Service</th>
                      <th>ACTION</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $date = Date('Y');
                        $service = new Service();
                        $domaine = new Domaine();
                        $ligne = $domaine->select();
                        $ordre = 0;
                        foreach($ligne as $elt){ 
                          $ordre++;
                          $dom = $service->ServiceBYDomaine($elt['idserv']);
                        ?>
                    <tr>
                      <td> <?=($ordre);?> </td>
                      <td> <?=$elt['nomdomaine'];?> </td>
                      <td> <?=$dom['nomserv'];?> </td>
                      <td></td>
                    </tr>
                        <?php  }?>
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
  <script src="..//js/sb-admin-2.min.js"></script>

                        </form>
</body>

</html>
