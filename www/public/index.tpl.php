<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Choisissez le Type: </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= ($currentType == "") ? "active" : "" ?>" aria-current="page" href="./?type=<?= "" ?>">All type</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentType == $appart) ? "active" : "" ?>" href="./?type=<?= $appart ?>">Entire home/apt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentType == $chambre) ? "active" : "" ?>" href="./?type=<?= $chambre ?>">Private room</a>
        </li>
      </ul>
      <form class="d-flex ms-auto" method="GET">
        <input type="hidden"  name="type" value="<?= $_GET['type'] ?>">
          <label for="min">Min:</label>
          <input type="number" value="<?= $currentMin ?>" min="10" id="min" name="min">$<br><br>
          <label for="max">Max:</label>
          <input type="number" value="<?= $currentMax ?>" max="2000" id="max" name="max">$<br><br>
          <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</nav>
<main class="container">
        <div class="row">
            <section class="col-12">
             

                   
                      <?php
                   
                     
                    
                    
                    if($_GET['type'] == ""){
                      include 'all-type.php';
                      }
                      elseif($_GET['type'] == $chambre){
                        include 'room-type.php';
                      }elseif($_GET['type'] == $appart){
                        include 'home-type.php';
                      }

                
                  

                   
                  
                   ?>
                            
                       
                          
                      
                   
            </section>
        </div>
    </main>