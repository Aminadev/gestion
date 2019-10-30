<?php 
		session_start();
	require_once"fonction_pdo.php";
	if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="admin") {
      sleep(1);
      echo "<script>window.location.href='../index.php';</script>";
  }
  if(isset($_REQUEST['logout']))
  {
    unset($_SESSION);
    session_destroy();
    echo"<script>window.location.href='../index.php';</script>";
  }
    $base= connect();
	extract($_POST);
	if(isset($_POST['btnAjout']))
	{
		if(empty($code) )
        {
          	echo "<script>alert('VEUILLEZ RENSEIGNE LE CODE ');</script>";   
		}elseif(empty($libelleniv))
            {
                echo "<script>alert('VEUILLEZ SAISIRE LE LIBELLE DU CE CODE');</script>";   
            }elseif(DoublonNiveau($code,$libelleniv)=="OK"){
            	 echo "<script>alert('CE NIVEAU EXIST DEJA');</script>";  
            }else{
               		$requete=$base->exec("INSERT INTO niveau(codeniv,libelleniv) VALUES('$code','$libelleniv') ");
                    if($requete){
                   		echo "<script>alert('OPERATION EFFECTUER AVEC SUCCES')</script>";
                   		header('location:liste_classe.php');
                        //echo "<script>window.location.href='liste_classe.php';</script>";
                        }else{
                           	echo "<script>alert('OPERATION NON EFFECTUER VEUILLEZ REESSAYER')</script>";
                        }
               	}
    }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ajout niveau</title>


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
						<!-- <?php
					// if (isset($_GET['error']))
					// {
					// 		echo '<div class="alert bg-danger" role="alert" style="width: 100%;
					//     height: 50px;">
					//           <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> le nom ou le mot de passe est incorrecte! <a  class="pull-right" aria-hidden="true"></a>
					//         </div>' ;
					// }?>
					   -->
  <div id="header">
  	<h1 id="logintoregister">Ajouter un Niveau</h1>
  </div> 
   <form enctype="multipart/form-data" method="POST" action="" >
		<div class="group">      
			<input class="inputMaterial" type="text" name="code" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Code niveau</label>
		</div>
		<div class="group">      
			<input class="inputMaterial" type="text" name="libelleniv" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Libelle Niveau</label>
		</div>
		<br/>
		<button name="btnAjout"  id="buttonlogintoregister" type="submit">Ajouter</button>
  </form>
  <div id="footer-box" ></div>
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
