

<?php


if($encoded=json_decode($result[0],true))
{
  
function filter_callback_room($element) {
  if (isset($element['room_type']) && $element['room_type'] == 'Private room') {
    return TRUE;
  }
  return FALSE;
}

$room_array = array_filter($encoded, 'filter_callback_room');
//echo "room: ".count($room_array);



// On détermine le nombre total d'articles
$nbRooms = count($room_array);
//echo $nbRooms;
   
  //print_r($encoded);
   // On détermine le nombre d'articles par page
    $parPage = 10;

    // On calcule le nombre de pages total
    $pages = ceil($nbRooms / $parPage);


    // Calcul du 1er article de la page
    $premier = ($currentPage * $parPage) - $parPage;

    // splice them according to offset and limit
    $final = array_splice($room_array, $premier, $parPage);
    ?>
<h1><?= $final[0]['room_type'] ?></h1>

<ul class="list-group bg-white d-flex flex-row flex-wrap justify-content-around">
    <?php
     // On récupère les données
     foreach($final as $room){
                     
        include 'show.php';
     
    } 
    //range des prix
  
}  
?>
</ul>
      

<!-- pagination - bas -->
<div>
  <ul class="pagination pagination-sm justify-content-center">
      <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
      <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
          <a href="./?type=chambres&min=<?= $_GET['min'] ?>&max=<?= $_GET['max'] ?>&page=<?= $currentPage - 1 ?>" class="page-link" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for($page = $currentPage-2; $page <= $currentPage+3; $page++): ?>
          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
          <?php if(($page > 0 )&&($page < $pages )) {?>
          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
              <a href="./?type=chambres&min=<?= $_GET['min'] ?>&max=<?= $_GET['max'] ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
          </li>
      <?php }endfor ?>
          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
          <a href="./?type=chambres&min=<?= $_GET['min'] ?>&max=<?= $_GET['max'] ?>&page=<?= $currentPage + 1 ?>" class="page-link" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
  </ul>
</div>
<!-- fin pagination bas -->