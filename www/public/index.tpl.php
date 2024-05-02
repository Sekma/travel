<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Travel </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="text-primary nav-link <?= ($currentType == "") ? "active" : "" ?>" aria-current="page" href="./?type=<?= "" ?>">All type</a>
        </li>
        <li class="nav-item">
          <a class="text-primary nav-link <?= ($currentType == $appart) ? "active" : "" ?>" href="./?type=<?= $appart ?>">Entire home/apt</a>
        </li>
        <li class="nav-item">
          <a class="text-primary nav-link <?= ($currentType == $chambre) ? "active" : "" ?>" href="./?type=<?= $chambre ?>">Private room</a>
        </li>
      </ul>
      <form class=" d-flex align-items-center justify-content-end ms-auto" method="GET">
          <input type="hidden"  name="type" value="<?= $_GET['type'] ?>">
        <div class="input-group input-group-sm">
          <span class="input-group-text" id="inputGroup-sizing-sm">Min: </span>
          <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="number" value="<?= $currentMin ?>" min="10" id="min" name="min">
          <span class="input-group-text">$</span>
        </div>
        <div class="input-group input-group-sm ms-1">
          <span class="input-group-text" id="inputGroup-sizing-sm">Max: </span>
          <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="number" value="<?= $currentMax ?>" max="2000" id="max" name="max">
          <span class="input-group-text">$</span>
        </div>
          <input class="btn btn-sm btn-outline-success ms-3" type="submit" value="Search">
      </form>
    </div>
  </div>
</nav>
<div style="height: 350px; width:100%; background-image:url('https://source.unsplash.com/category/travel/1200x300'); background-size:cover; background-position:center"></div>
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