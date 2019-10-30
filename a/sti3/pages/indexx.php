<?php 

$base =new PDO("mysql:host=127.0.0.1;db=sti3;charset=utf8","root","");
$requete=$base->query("SELECT * FROM utilisateur");
$result = $requete->fetch();
	//while($result=$requete->fetch()){
		echo $result['iduser']." ".$result['login'].$result['pwd'];
	//}
	//echo "problem";
 
 ?>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>