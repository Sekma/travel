
    <li class="list-group-item my-2 border-0 border-bottom">
     
        <div class="my-3 row">
          <div class="rounded col" style="width:300px; height:250px; background-image: url(<?= 'https://source.unsplash.com/category/'.$room['room_id'].'/400x400' ?>); background-size:cover; background-position:center">
          
            
            <p class="rounded mt-2" style="background-color: rgba(255, 255, 255, 0.7); width:100px; text-align:center;">Ref: <?= $room['room_id'] ?></p>
            <h1 class="fw-bold text-danger text-center mt-5 py-2 bg-white opacity-50 rounded">F A K E</h1>
          </div>
            <div class="col">
                <h5>Ville: <?= $room['neighborhood'] ?></h5>
                <p>Type: <?= $room['room_type'] ?></p>
                <div class="bg-dark opacity-25" style="width: 40px; height:1px"></div>
                <p class="m-0 opacity-50"><small><?= $room['accommodates'] ?> voyageurs.</small></p>
                <p class="m-0 opacity-50"><small><?= (!empty($room['bedrooms']))?$room['bedrooms']:"N/A"; ?> chambres.</small></p>
                <p class="m-0 opacity-50"><small>minimum <?= $room['minstay'] ?> nuits.</small></p>
                <div class="bg-dark opacity-25 my-1" style="width: 30px; height:1px"></div>
                <h6>Prix: <span class="text-success"><?= $room['price'] ?>€</span>/nuit.</h6>
                
                <!-- if else -->
                <?php
                if(empty($room['overall_satisfaction'])){
                ?>
                <p class=" mt-1"><i class="fa-solid fa-star" style="color:rgb(210, 0, 98)"></i>&nbsp; N/A</p>
                <?php
                }else{
                ?>
                <p class=" mt-1"><i class="fa-solid fa-star" style="color:rgb(210, 0, 98)"></i>&nbsp;<?= $room['overall_satisfaction'] ?><span class="opacity-50">&nbsp;<?="(".$room['reviews']." avis)" ?></span></p>
                <!-- end if else -->
                <?php
                }
                ?>
            </div>
        </div>
      
    </li>
