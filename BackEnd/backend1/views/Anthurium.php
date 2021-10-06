<?php 
    $is_image=$url=="/Anthurium/image";
    $is_info=$url=="/Anthurium/info";
    ?>
<h1>Антуриум</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($is_image) { ?>active<?php } ?>" href="/Anthurium/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($is_info) { ?>active<?php } ?>" href="/Anthurium/info">Описание</a>
  </li>
</ul>


<ul class="list-group">
  <li class="list-group-item">
    
    <?php 
    
    if ($is_image) { ?>
        <img src="/images/img-Anthurium.jpg" alt="" style="height: 250px"><?php 
    } elseif ($is_info) {
        require "../views/Anthurium-info.php";
    }
 ?>
  </li>
</ul>

