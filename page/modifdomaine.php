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
        $idDom = $_GET['iddom'];
function __autoload($class){
    require_once "../classes/$class.php";
  }

  $domaine = new Domaine();
  $dom = $domaine->FindDomaineBYID($idDom);
  
  if(isset($_POST['BtnModif'])){
      extract($_POST);
            //  $ok =  $domaine->Doublons($idservice,$domaine);
    if(empty($nomdomaine)){
      echo "<script>alert('RENSEIGNER LE NOM DE DOMAINE')</script>";
    }elseif(is_numeric($nomdomaine)){
      echo "<script>alert('RENSEINGER UN NOM DE DOMAINE VALIDE')</script>";
    }
    else{
            if($idservice==""){
                $idservice = $dom['idserv'];
            }
                $tabDonnee = [
                'idserv'=>$idservice,
                'nomdomaine'=>$nomdomaine
                ];
                $verif = $domaine->UpDateDomaine($tabDonnee,$idDom);
                if($verif){
                header('location:edomaine.php');
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
  <link rel="stylesheet" href="index.css">


  <title>Espace domaine</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div id="wrapper">

    
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
      <div class="formu"><br><br>
        <label for=""> Nom Domaine</label>
        <input type="text" name="nomdomaine" value="<?=$dom['nomdomaine']?>" placeholder="nom domaine"><br><br>
        <label for="">Service</label><br>
        <select name="idservice" class="btn btn-primary dropdown-toggle mb-sm-3">
            <option value=""> choisi un Service</option>
            <?php
              $service = new Service();
              $Serv = $service->select();
              foreach($Serv as $el)   {    ?>
              <option value="<?=$el['idserv'];?>" > <?php echo $el['nomserv'];?> </option>
              <?php  }  ?>             
        </select>
          <input type="submit" value="MODIFIER" name="BtnModif"><br><br>
          <input type="submit" value="RETOUR" name="BtnRetour">
      </div> 
    </div>

    <div class="gauche">
    
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

                        </form>
</body>

</html>
