<?php
  require './class/fullPageCache.php';

  $fpc = new FPC();
  $fpc->start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
 
</head>
<body>

<?php

  echo "<h1>LARADOCK IS READY !</h1>";

?>
  <a href="index.php">R E T O U R</a>
  <a href="generate.php">F I B O N A C C I</a>

</body>
</html>

<?php
   $fpc->end(); 
?>

