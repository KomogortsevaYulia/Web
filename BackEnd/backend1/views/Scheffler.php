<?php 
    $is_image=$url=="/Scheffler/image";
    $is_info=$url=="/Scheffler/info";
    ?>
<h1>Шеффлера</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { ?>active<?php } ?>" href="/Scheffler/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($is_info) { ?>active<?php } ?>" href="/Scheffler/info">Описание</a>
  </li>
</ul>


<ul class="list-group">
  <li class="list-group-item">
    
  <?php 
    
    if ($is_image) { ?>
        <img src="/images/img-Scheffler.jpg" alt="" style="height: 250px"><?php 
    } elseif ($is_info) {
        require "../views/Scheffler-info.php";
    }
 ?>

  </li>
</ul>