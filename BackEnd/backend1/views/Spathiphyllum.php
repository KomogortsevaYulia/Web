<?php 
    $is_image=$url=="/Spathiphyllum/image";
    $is_info=$url=="/Spathiphyllum/info";
    ?>
<h1>Спатифиллум</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?= $is_image ? "active" : '' ?>" href="/Spathiphyllum/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/Spathiphyllum/info">Описание</a>
  </li>
</ul>

 <ul class="list-group">
  <li class="list-group-item">
    
  <?php 
    
    if ($is_image) { ?>
        <img src="/images/img-Spatif.jpg" alt="" style="height: 250px"><?php 
    } elseif ($is_info) {
        require "../views/Spathiphyllum-info.php";
    }
 ?>

  </li>
</ul>