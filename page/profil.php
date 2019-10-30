<?php
      session_start();
      
      if((!isset($_SESSION['login']) and !isset($_SESSION['profil'])) OR ($_SESSION['profil']!=1)) {
        sleep(1);
        echo "<script>window.location.href='../index.php';</script>";
      }

      function __autoload($class){
        require_once "../classes/$class.php";
    
      }
    
      $prof = new Profil();

      if(isset($_POST['valider'])){
        extract($_POST);

          if(!empty($profil)){
              if(!is_numeric($profil)){
                    if(!$prof->DoublonsProfil(trim($profil))){
                        $tabDonnee =[
                        'libelle'=>$profil
                        ];
                    $verif = $prof->insertion($tabDonnee);
                    if($verif){
                          header('location:profil.php');
                      }
                  }else{
                    echo "<script>alert('DESOLE LE SERVICE QUE VOUS VOULEZ AJOUTER EXISTE DEJA')</script>";
                  }
            }else{
              echo "<script>alert('RENSEIGNEZ UN PROFIL VALIDE')</script>";
          }

            }else{
                echo "<script>alert('RENSEIGNEZ UN PROFIL')</script>";
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
  <title>PROFIL</title>
</head>
<body>

<div id="wrapper">
  <body id="page-top">
 <!-- Begin Page Content -->
  <div class="container-fluid">

  <div>
  <br/>
</div> 
  <div class="Global">

  <div class="droite" >
    <form method="POST" action="">
      <div class="formu1"><br><br><br>
      <label for=""><h5>Profil</h5></label>
        <input type="text" name="profil" placeholder="Votre Profil"><br><br>
        <input type="submit" value="valider" name="valider">
        <a class="as" href="admin.php">RETOUR</a>

      </div>
    </form>
  </div>

    <div class="gauche">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des Profils</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>N°</th>
                <th>PROFIL</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
            <?php
              $date = Date('Y');
                  //$profil = new Profil();
                  $ligne = $prof->select();
                  $ordre = 0;
                  foreach($ligne as $elt){ 
                    $ordre++;
                  
                  ?>
                <tr>
                  <td> <?=($ordre);?> </td>
                  <td> <?=$elt['libelle'];?> </td>
                  <td>
                  <a  href="#" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i> </a>
                  <a href="modifProfil.php?idprof=<?=$elt['idprofil'];?>" class="btn btn-info btn-circle"><img title="Modifier" src="../img/1.png" alt="mod"></a>
                  </td>
                </tr>
                  <?php  }?>
            </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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
