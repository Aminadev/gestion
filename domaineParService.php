<?php
        function __autoload($class){
            require_once "classes/$class.php";
    
          }

          $service = new Service();
          $domaine= new Domaine();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Domaine Jquery</title>
</head>
<body>
    
        <div>
        <!---les servive du structure sanitaire  -->
            <select  id="Service">
                <option value="">Choisi un Service</option>
                <?php 
                        $All = $service->select();
                        foreach($All as $serv){ 
                ?>
                <option value=""><?=$serv['nomserv'];?></option>
                <?php } ?>
            </select>
            <?php  
                    $Domaines = $domaine->select();
                    //var_dump($Domaines);
                    $domai_service = array();
                    foreach($Domaines as $serv){ 
                        $domai_service[$serv['idserv']][$serv['iddomaine']] = $serv['nomdomaine'];
                    }
                    var_dump($domai_service); 
                    
                         
            ?>
        </div>

        <!--- les domaines apparrtenant aux service selectionner sur le premier select   -->
        <div>
        <br>
        <br>
        <?php  
                    foreach($Domaines as $serv['idserv'] =>$elt){ 
            ?>
            <select id="domaine=<?=$serv['idserv'];?>">
            <?php foreach($elt as $serv['iddomaine'] => $serv['nomdomaine']){ 
                   ?>
                <option value="<?=$serv['idserv'];?>"><?=$serv['nomdomaine'];?></option>
                <?php }?>
            </select>
            <?php }?>
        </div>


</body>

        <script ttype="text/javascript" src=""></script>
        <script type="text/javascript" src="app.js"></script>

</html>