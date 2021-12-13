

<?php $__env->startSection('content'); ?>
  <h1><?php echo e($object->title); ?></h1>
<p><?php echo e($object->description); ?></p>
  <ul class="nav nav-pills">
    <li class="nav-item">
     
      <a href="/flower/<?php echo e($object->id); ?> ?show=image" class="<?php echo \Illuminate\Support\Arr::toCssClasses(["btn","me-2","btn-primary "=>$is_image,"btn-link"=>!$is_image]) ?>" >Картинка</a>
      </li>
    <li class="nav-item ">
      <a href="/flower/<?php echo e($object->id); ?> ?show=info" class="<?php echo \Illuminate\Support\Arr::toCssClasses(["btn","me-2","btn-primary "=>$is_info,"btn-link"=>!$is_info]) ?>">Описание</a>
      
    </li>
  </ul>
  
  <div class="mt-2">
    <ul class="list-group">
      <li class="list-group-item">
       <?php if($is_image): ?>
        <img src="<?php echo e($object->image); ?>" style="width: 300px;"/>
      <?php elseif($is_info): ?>
        <?php echo e($object->info); ?>

      <?php else: ?>
        Выбирайте что хотите смотреть
      <?php endif; ?>
  </li>
    </ul>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('__layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Yulia\Study\3_course\Web\BackEnd\Laravel\resources\views/object.blade.php ENDPATH**/ ?>