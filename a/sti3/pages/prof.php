<?php
    session_start();
    if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="prof") {
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
    $base=connect();
    $requette=$base->query("SELECT * FROM utilisateur  WHERE profil='prof'");

                          

                                  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>liste des profs</title>
  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="#" rel="stylesheet">

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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="indexN.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IPD / DAKAR</div>
	  </a>
	  <hr class="sidebar-divider my-0">

    <br/>
    <br/>
<br/>
    <br/>

		
	  <br/>
	  <br/>

      
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

<!-- debut -->
            <!-- pour l'icon du message avec un nombres de 7 non lus -->


            <!-- Nav Item - Messages -->
            <!-- fin -->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 <span class="mr-2 d-none d-lg-inline text-gray-800 small"><b><?=$_SESSION['prenom']." ".$_SESSION['nom']?></b></span>
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
                          <center>  <h1> Bienvenue M(me). <?=$_SESSION['nom']?></h1>
                          <h3> Pour savoir votre score veuillez au préalable</br>choisir une classe et une matière </h3></center>
                    </br>
                    </br>
                          <?php
                                $base= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
                                extract($_POST);
                                $req=$base->query("SELECT * FROM ligne_classe ");
                                $idpr=$_SESSION['id'];
                                $req2=$base->query("SELECT * FROM ligne_prof_cours WHERE idprof=$idpr ");
                          ?>

                          <form enctype="multipart/form-data" method="POST" action="" >
                            <?php
                                // if($req)
                                //     {
                            ?>
                            <div class="group"> 
                          <center>  <table width="500">
                              <tr><td>     
                                <select class="inputMaterial" name="choixaa" >
                                    <option class="inputMaterial" value="">Choisissez l'annee academie</option>
                                    <option class="inputMaterial" value="">2016-2017</option>
                                    <option class="inputMaterial" value="">2017-2018</option>
                                    <option class="inputMaterial" value="">2018-2019</option>
                                </select>
                            </td>
                                </td><td>
                                  <?php 
                                        if($req2)
                                        {   ?>
                                  <select class="inputMaterial" name="choixmatiere" >
                                    <option class="inputMaterial" value="">Choisissez une matière</option>
                                    <?php 
                                        while($lg2=$req2->fetch())
                                        { 
                                            $matiere=findMatiereById($lg2['idcours']);
                                          ?>
                                        <option value="<?=$matiere?>"><?php echo $matiere ;?> </option>
                                        <?php }
                                            }
                                        ?>
                                </select>
                            </td></tr>
                          </table>
                          <br>
                              <br>
                            <input type="submit" name="BtnScore" value="  Mon Score  " /> 
                          
                              </center>
                                <br>
                                <br>
                            </div>
                                    
                                    <br>
                                    <br>
                              <?php
                                 if(isset($_POST['BtnScore'])){
                                 
                                    if($choixmatiere==""){
                                        echo "<script>alert('RENSEIGNEZ LES CHAMPS SVP!! ');</script>";
                                      }else{
                                        $s=0;
                                        $idcr=findIdMatiereByCode($choixmatiere);
                                        $MonScore=$base->query("SELECT * FROM ligne_score_cours_etu WHERE idcours='$idcr' ");
                                        if ($MonScore) 
                                        {
                                          //echo "<script>alert('test bon ');</script>";
                                          $nbEleve=$MonScore->rowCount();
                                            while($lgn=$MonScore->fetch())
                                            {
                                              $s+=$lgn['score'];
                                        
                                            }
                                          }else{
                                            echo "<script>alert('Enregistrement non effectuer ');</script>";
                                          }

                                        ?>
                                        <div class="container my-auto">
                                        <div class="copyright text-center my-auto">
                                           <CENTER> <H3>Votre score sur la matière<B> <?=$choixmatiere?></B> sur une nombre</br> de <b> <?=$nbEleve?></b> étudiants Vous avez : <?=$s?> sur <?=(45*$nbEleve)?> </br></br>
                                            Autrement dit : <b> 
                                              <?php
                                              if($nbEleve!=0){
                                              $val=($s/(45*$nbEleve)*100);
                                              echo $val;?> % des voix </b>
                                              <?php
                                              }elseif($nbEleve<=0){?>
                                                <h2>CETTE MODULE N'AS PAS ENCORE EVALUER PAR UN ETUDIANT </h2>
                                            <?php    
                                              }

                                             ?></H3></CENTER>
                                        </div>
                                    </div>
                                  <?php  }
                                }
                      ?>
                                  
                          </form>
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
         







                </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; IPD-Dakar 2019</span>
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

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
