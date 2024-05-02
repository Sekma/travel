<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redis Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  
<?php
  require __DIR__ . '/vendor/autoload.php';

  // On se connecte à là base de données
  $client = new Predis\Client(['host'=>'redis', 'port'=>'6379', 'password'=>'secret_redis']);
  // On récupère les données
  $data = file_get_contents("example.json");

  $status = $client->hmset('airbnb:1',array($data));

  $result = $client->hgetall('airbnb:1');
  
  $appart = "apparts";
  $chambre = "chambres";

  // On détermine sur quelle page on se trouve
  if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
  }else{
    $currentPage = 1;
  } 
  // On détermine sur quelle type on se trouve
  if(isset($_GET['type']) && !empty($_GET['type'])){
    $currentType = strip_tags($_GET['type']);
  }else{
    $currentType = "";
  }
// On détermine sur quelle range de prix on se trouve
  if(isset($_GET['min']) && !empty($_GET['min'])){
    $currentMin = strip_tags($_GET['min']);
  }else{
    $currentMin = 10;
  }
  if(isset($_GET['max']) && !empty($_GET['max'])){
    $currentMax = strip_tags($_GET['max']);
  }else{
    $currentMax = 2000;
  }
  include 'index.tpl.php';

  
 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
