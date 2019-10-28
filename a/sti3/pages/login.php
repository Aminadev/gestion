<?php
	session_start();
    $base= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
	extract($_POST);
	if(isset($_POST['BtnLogin']))
	{
		if(empty($login) )
        {
          	echo "<script>alert('VEUILLEZ RENSEIGNE VOTRE LOGIN SVP');</script>";   
			}elseif(empty($password))
               {
                  echo "<script>alert('VEUILLEZ RENSEIGNE VOTRE MOT DE PASSE SVP');</script>";   
               }else{
               			// le cryptage du mot de passe
                        $password=sha1($password);
                        $requete=$base->query("SELECT * FROM utilisateur ");
						if($requete){
							while($result=$requete->fetch())
							{
								if($result['login']==$login && $result['pwd']==$password && $result['profil']==$profil)
								{
									// $_SESSION['nom']=$nom;
						      		if($_SESSION['profil']=="admin"){
							    	header("location:admin.php");
							  		}elseif($_SESSION['profil']=="prof"){
							   		header("location:Prof.php");
							   		}elseif($_SESSION['profil']=="etu"){
							      	header("location:etudiant.php");
							      	}								  	 	
							  	}								  	
							}
								echo "<script>alert('LES DONNEES SAISIES SONT INVALIDE')</script>";
								echo "<script>window.location.href='login.php';</script>";
								exit;
						}
					}
		}
?>

<!DOCTYPE html>

<html lang="fr">


<head>

    
	<meta charset="utf-8">
    
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<meta name="description" content="">
    <meta name="author" content="">

    
<title>Authentification</title>

    
<!-- Bootstrap Core CSS -->
    
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
<!-- MetisMenu CSS -->
    
<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    
<!-- Custom CSS -->
    
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    
<!-- Custom Fonts -->
    
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
</script>
    
<![endif]-->
</head>
<body>
<div class="container">
        
<div class="row">
            
<div class="col-md-4 col-md-offset-4">
                
<div class="login-panel panel panel-default">
                    
<div class="panel-heading">
<h3 class="panel-title">Je m'authentifie</h3>
                    
</div>
                    
<div class="panel-body">
                        
<form method="POST" action="">

<div class="form-group">
<label>login:</label>                                    
<input class="form-control" placeholder="Login" name="login" type="email" >
</div>
<div class="form-group">
<label>mot de passe:</label>                                
<input class="form-control" placeholder="Password" name="password" type="password" >                               
</div>
 <div class="form-group"> 
 	<label>Votre Profil:</label>
<select name="profil" >
	<option  value="etu"> Etudiant</option>
	<option value="prof" > Professeur</option>
	<option value="admin"> Administration</option>
</select>
 </div>                       
<div class="checkbox">
<label>
<input name="remember" type="checkbox" value="Remember Me">
 Se rappeler de moi                                   
</label>
</div>
                               
  <input type="submit" name="BtnLogin" value="Connexion" class="btn btn-lg btn-success btn-block" />
                                               
</form>

 <?php 
// session_start();
// include_once"fonction.php";
// extract($_POST);
// $c=connect();
// if(isset($_POST['BtnLogin']))
// {
//  $exe=allUser();
//  while($l=mysqli_fetch_array($exe))
//   {
//     $pwd=md5($pwd);
//     if($l['login']=='$lg' && $l['pwd']=='$pwd')
//     {
//       $_SESSION['login']=$lg;
//       $_SESSION['pwd']=$pwd;
//       if($_SESSION['profil']=="admin"){
//       	header("location:admin.php");
//       }
//   	}else{
//   		echo "<script>alert('login ou mot de passe incorrect')</script>";
//   	}
//   }
// }
 ?>
                    
</div>
                
</div>
            
</div>
        
</div>
    
</div>

    
<!-- jQuery -->
    
<script src="../vendor/jquery/jquery.min.js"></script>

    
<!-- Bootstrap Core JavaScript -->
    
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    
<!-- Metis Menu Plugin JavaScript -->
    
<script src="../vendor/metisMenu/metisMenu.min.js">
</script>

    <!-- Custom Theme JavaScript -->
    
<script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>


