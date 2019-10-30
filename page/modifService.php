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
        $idserv = $_GET['idserv'];
function __autoload($class){
    require_once "../classes/$class.php";
  }
  $service = new Service();

  if(isset($_POST['btnModif'])){
      extract($_POST);
        if(empty($nomservice)){
        echo "<script>alert('RENSEIGNER LE NOM DU SERVICE')</script>";
        }elseif(empty($specialite)){
        echo "<script>alert('RENSEIGNER LA SPECIALITE')</script>";
        }else{   
          //if(!$service->DoublonsService(trim($nomservice),trim($specialite))){
                $tabDonnee = [
                'nomserv'=>$nomservice,
                'specialite'=>$specialite
                  ];
                $verif = $service->UpDateService($tabDonnee,$idserv);
                if($verif){
                    header('location:eservice.php');
                }
                else{
                    echo "<script>alert('CHOISI UN SERVICE')</script>";
                }
            // }else{
            //   echo "<script>alert('DESOLE LE SERVICE QUE VOUS VOULEZ AJOUTER EXISTE DEJA')</script>";
            // }  
        }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="index.css">

   <!-- Custom fonts for this template -->
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <title>Espace Service</title>
</head>
<div id="wrapper">
  <body id="page-top">
 <!-- Begin Page Content -->
  <div class="container-fluid">

  <div>
  <br/>
</div> 
<div class="Global">
<?php
              $date = Date('Y');                
                  $Srv = $service->FindServiceBYID($idserv);
              ?>
  <div class="droite" >
    <form action="" method="POST">
      <div class="formu1"><br><br><br>
        <label for=""> Nom Service</label>
        <input type="text" name="nomservice" placeholder="nom service" value="<?=$Srv['nomserv']?>"><br><br>
        <label for="">Specialite</label>
        <input type="text" name="specialite" placeholder=" specialite" value="<?=$Srv['specialite']?>"><br><br>
        <input type="submit" value="MODIFIER" name="btnModif"/><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="eservice.php" class="btn btn-primary btn-user" >ANNULER</a>
      </div>
    </form> 
  </div>

  <div class="gauche">
    <!--  -->
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
