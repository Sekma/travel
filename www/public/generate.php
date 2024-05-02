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
  <title>Fibonacci</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="fibonacci">
    <?php
      require './class/fibonacci.php';
      $fib = new Fibonacci();
      $list = $fib->get(35);
      for($j=0; $j<count($list); $j++){
        echo "<span>" . $list[$j] . "</span>";
      }
    ?>
  </div>
</body>
</html>

<?php
  $fpc->end();
?>