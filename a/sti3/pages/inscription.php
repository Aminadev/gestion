<?php 
        session_start();
        $conn= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
         extract($_POST);
                    if(isset($_POST['BtnValide']))
                    {
                       // $m=TrouvIDviaMatricule($matricul);
                        if(empty($profil) || $profil===0){
                             echo "<script>alert('veuillez choisir un profil')</script>";
                        }elseif(empty($login)){
                             echo "<script>alert('veuillez saisir votre login')</script>";
                        }elseif(empty($pwd1)){
                             echo "<script>alert('veuillez saisir votre mot de passe')</script>";
                        }elseif(!empty($pwd1) && empty($pwd2) ){
                             echo "<script>alert('veuillez confirmer votre mot de passe')</script>";
                        }else{

                            if(!($pwd2==$pwd1)){
                                 echo "<script>alert('Les deux mot de passe saisie ne correspond pas')</script>";
                            }else{
                                    $date=DATE('Y-m-j');
                                    $pwd1=sha1($pwd1);
                                    $requete=$conn->exec("INSERT INTO utilisateur(nom,prenom,date,login,pwd,profil) VALUES('$nom','$prenom','$date','$login','$pwd1','$profil' ) ");
                                    if($requete){
                                        echo "<script>alert('OPERATION EFFECTUER AVEC SUCCES')</script>";
                                        header("location:login.php");
                                       // echo "<script>window.location.href='gescotisation.php';</script>";
                                    }else{
                                        echo "<script>alert('INSCRIPTION NON EFFECTUER VEUILLEZ REESSAYER')</script>";
                                    }
                            }
                        }
                    }

                    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>inscription </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Votre Profil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Parametre</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#.php"><i class="fa fa-sign-out fa-fw"></i> Deconnection</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Recherche...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="bienvenue.php"><i class="fa fa-home"></i> Acceuil</a>
                        </li>
                        <li>
                            <a href="liste_membre.php"><i class="fa fa-list-ol"></i> Liste les utilisateurs</a>
                        </li>
                        
                        <li>
                            <a href="inscription.php"><i class="fa fa-plus-square"></i> Ajouter un utilisateur</a>
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


<?php 
$val=500;
     include_once"fonction.php";
     //extract($_POST);
     //$conn=connect();
    ?>
    <form method="POST" action="" >
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Espace Gestion des Utilisateurs</h2>
                    
                </div>                
            </div>
            <!-- /.row -->
            <!-- /.row -->
          <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><h4>creation de compte utilisateur</h4></center>
                        </div>
                        <div class="panel-body">
                            <!-- <div class="table-responsive"> -->
                            <div class="row">
                    <div class="col-lg-6">
                        <!-- <div class="panel panel-default"> -->
                        <!-- <div class="col-md-12"> -->
                          <div class="panel panel-default">
                              <div class="panel-body">
                                    <!-- <div class="table-responsive"> -->
                                <label>Nom:</label>
                                <input class="form-control" type="text" name="nom" />
                                <br/>
                                <label>Prenom:</label>
                                <input class="form-control" type="text" name="prenom" />
                                <br/>
                                <label >profil</label>
                                <select class="form-control" value="votre profil" name="profil" >
                                    <option value="0">-----Choix-----</option>
                                    <option value="prof">Professeur</option>
                                    <option value="etu">Etudiant</option>
                                    <option value="admin">Administrateur</option>
                                </select>       
                                <label>Login:</label>
                                <input class="form-control" type="email" name="login" />
                                <br/>
                                <label>Mot de Passe: </label>
                                <input class="form-control" type="password" name="pwd1"/>
                                <label>Confirmer votre Mot de Passe: </label>
                                <input class="form-control" type="password" name="pwd2"/>
                                <br/>
                                
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- <div class="panel panel-default"> -->
                        <!-- <div class="col-md-12"> -->
                          <div class="panel panel-default">
                              <div class="panel-body">
                                    <!-- <div class="table-responsive"> -->                                       
                                       <img src="../images/laureat.jpeg" width="100%">
                                       <br/>
                                </div>
                            </div>
                    </div>
                    
                </div>
                        <br/>
                    <center>
                    <input type="submit" name="BtnValide" value="  VALIDER  " /> &nbsp;&nbsp;&nbsp;
                    <input type="reset" name="BtnAnnule" value="  ANNULER  " />
                    <br/>
                    </center>       
              </div>
            </div>
            </div>

                    <br/>
                    
        </div>
        <!-- /#page-wrapper -->

    </div>
                <?php include "footers.php";?>
    <!-- /#wrapper -->
</form>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>