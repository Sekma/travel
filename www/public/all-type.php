<h1 class="text-success my-3">Liste des articles</h1>

<ul class="list-group bg-white d-flex flex-row flex-wrap justify-content-around">

<?php

if($encoded=json_decode($result[0],true))
{

  if(isset($_GET['min'])&&isset($_GET['max'])){
    function filter_callback_range($element) {
      if (isset($element['price']) && $element['price'] >= $_GET['min'] && $element['price'] <= $_GET['max']) {
        return TRUE;
      }
      return FALSE;
    }
    $encoded = array_filter($encoded, 'filter_callback_range');

     // On détermine le nombre total d'articles
     $nbArticles = count($encoded);
    
  }else{
    // On détermine le nombre total d'articles
    $nbArticles = count($encoded);
    //echo $nbArticles;
  }

   // On détermine le nombre d'articles par page
    $parPage = 10;

    // On calcule le nombre de pages total
    $pages = ceil($nbArticles / $parPage);

    // Calcul du 1er article de la page
    $premier = ($currentPage * $parPage) - $parPage;

    // splice them according to offset and limit
    $final = array_splice($encoded, $premier, $parPage); 
     // On récupère les données
     foreach($final as $room){
                     
      include 'show.php';
   
  }
  
}  
 
?>
</ul>
<!-- pagination -->
<div>
  <ul class="pagination pagination-sm justify-content-center">
      <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
      <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
          <a href="./?min=<?= $currentMin ?>&max=<?= $currentMax ?>&page=<?= $currentPage - 1 ?>" class="page-link" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for($page = $currentPage-2; $page <= $currentPage+3; $page++): ?>
          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
          <?php if(($page > 0 )&&($page < $pages )) {?>
          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
              <a href="./?min=<?= $currentMin ?>&max=<?= $currentMax ?>&page=<?= $page ?>" class="page-link"><?= $page ?></a>
          </li>
      <?php }endfor ?>
          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
          <a href="./?min=<?= $currentMin ?>&max=<?= $currentMax ?>&page=<?= $currentPage + 1 ?>" class="page-link" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
  </ul>
</div>
<!-- fin pagination -->