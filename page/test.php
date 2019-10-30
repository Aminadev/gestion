<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" name="aa" value="<?//=?>">
    <input type="submit" name="bb">  
    <?php   
        if(isset($_POST['bb'])){
          extract($_POST);
          $jour = Date("l $aa");
          // $ds = explode("-", $aa);
          // $tabDate = explode('-', $aa);
          //   $timestamp = mktime(0, 0, 0, $ds[2], $ds[0], $ds[1]);
          //   $jour = date('D', $timestamp);
          echo $jour;
        }
    ?>
</form>
</body>
</html>