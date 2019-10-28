<?php   
	session_start();
	require_once"fonction_pdo.php";
    $base= connect();
	extract($_POST);
	if(isset($_POST['btnConnexion']))
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
                        $requete=$base->query("SELECT * FROM utilisateur WHERE profil='prof' ");
						if($requete){
							while($result=$requete->fetch())
							{
							if($result['login']==$login && $result['pwd']==$password && $result['profil']=="prof")
								{
									$_SESSION['id']=$result['iduser'];
									$_SESSION['login']=$result['login'];
									$_SESSION['nom']=$result['nom'];
									$_SESSION['prenom']=$result['prenom'];
									$_SESSION['profil']=$result['profil'];
						      		header('location:prof.php');
							  	}								  	
							}
							echo "<script>alert('DESOLE IL FAUT ETRE FORMATEUR POUR CONSULTER VOTRE SCORE !');</script>";   
							echo "<script>window.location.href='../index.php';</script>";
								exit;
						}
					}
		}
// if(isset($_SESSION['cnnx']) and $_SESSION['cnnx']==true )
// {
//   header('location:acceuil.php');

// }
   //include('cnnx.php');	

//  if(isset($_POST["btnEnregister"])  )
//     {
// 			$q = "select count(*) as nbr from utilisateur where login = '".$_POST['login']."' and pwd = '".($_POST['password'])."'";
// 			$r = $db -> query($q);
// 			$c = $r -> fetch();
// 			//$q1 = "select count(*) as nbr from utilisateur where login = '".$_POST['login']."' and pwd = '".($_POST['pwd'])."'";
// 			$r1 = $db -> query($q);
// 			$c1 = $r1 -> fetch();
// 				$id_user = $c1['iduser'] ;
// 				$_SESSION['id_user'] =$id_user;
				
// 			s$nbr = $c['nbr'] ;
// 				if ($nbr == 1)
// 			{     
// 				// if($profil=="prof"){

// 				// 	}
// 						$_SESSION['cnnx'] = true;

// 				header('location:acceuil.php');
// 			}else
// 			{
// 				header('location:indexN.php?error=1');
// 			}
// 			}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>authentification</title>


<link href="../css/styles.css" rel="stylesheet">
<link href="../LoginCss/style.css" rel="stylesheet">
        

<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<br><br><br>	
		
			<div class="login-panel panel panel-default">
				<div class="box" style="height: 420px;">
						<?php
// if (isset($_GET['error']))
// {
// 		echo '<div class="alert bg-danger" role="alert" style="width: 100%;
//     height: 50px;">
//           <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> le nom ou le mot de passe est incorrecte! <a  class="pull-right" aria-hidden="true"></a>
//         </div>' ;
// }?>
  
  <div id="header">
  	<h1 id="logintoregister">Se Connecter</h1>
  </div> 
   <form enctype="multipart/form-data" method="POST" action="" >
		<div class="group">      
			<input class="inputMaterial" type="text" name="login" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Utilisateur</label>
		</div>
		<div class="group">      
			<input class="inputMaterial" type="password" name="password" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Mot de passe</label>
		</div>
		
		<button name="btnConnexion"  id="buttonlogintoregister" type="submit">Connexion</button>
  </form>
  <div id="footer-box" ><p class="footer-text"><span class="sign-up" > Mot de passe oublier ?</span> </p></div>
</div>

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
