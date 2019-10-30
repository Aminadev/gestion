<?php
    session_start();
    require_once"fonction_pdo.php";
    // if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="admin") {
    //     sleep(1);
    //     echo "<script>window.location.href='../index.php';</script>";
    // }
    if(isset($_REQUEST['logout']))
    {
      unset($_SESSION);
      session_destroy();
      echo"<script>window.location.href='../index.php';</script>";
    }

    $date=DATE('Y-m-j');
    $conn= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
    extract($_POST);
                    if(isset($_POST['btnAjout']))
                    {
                    	$idclasse=findIdclassByCode($classe);
                        $requete=$conn->exec("INSERT INTO cours(libellec,volumeHor,idcl,iduser,active,evaluer) VALUES('$libelle','$volumeh','$idclasse',NULL,'','') ");
                        if($requete){
                            echo "<script>alert('VOUS VENEZ D AJOUTER UNE MATIERE')</script>";
                            echo"<script>window.location.href='liste_classe.php';</script>";
                        }else{
                            echo "<script>alert('AJOUT NON EFFECTUER  REESSEYER !!')</script>";
                        }


                    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ajout Matiere</title>


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
				<div class="box" style="height: 570px; top:-50px">
						<!-- <?php
					// if (isset($_GET['error']))
					// {
					// 		echo '<div class="alert bg-danger" role="alert" style="width: 100%;
					//     height: 50px;">
					//           <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> le nom ou le mot de passe est incorrecte! <a  class="pull-right" aria-hidden="true"></a>
					//         </div>' ;
					// }?>
					   -->
				<?php
	   	$base= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
	    extract($_POST);
		$req=$base->query("SELECT * FROM classe ");
		?>
  <div id="header">
  	<h1 id="logintoregister">Ajout Matiere</h1>
  </div> 
   <form enctype="multipart/form-data" method="POST" action="" >
   	<?php
    		if($req)
            {
    ?>
    <div class="group">      
    <select class="inputMaterial" name="classe" >
        <option class="inputMaterial" value="">Choisissez une classe</option>
        <?php 
            while($lg=$req->fetch())
            { ?>
            <option value="<?=$lg['codecl']?>"><?php echo $lg['codecl'];?> </option>
            <?php }
                }
            ?>
    </select>
    </div>
		<div class="group">      
			<input class="inputMaterial" type="text" name="libelle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Libelle Matière</label>
		</div>
		<div class="group">      
			<input class="inputMaterial" type="text" name="volumeh" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Volume Horaire</label>
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
