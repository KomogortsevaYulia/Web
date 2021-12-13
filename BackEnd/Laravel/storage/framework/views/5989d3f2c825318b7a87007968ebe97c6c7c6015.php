

<?php $__env->startSection('content'); ?>
  <h1><?php echo e($object->title); ?></h1>
  <div>
    <a href="" class="btn btn-primary me-2">Картинка</a>
    <a href="" class="btn btn-primary me-2">Описание</a>
  </div>
  <?php if($is_image): ?>
    Картинка
  <?php elseif($is_info): ?>
    Описание
  <?php else: ?>
    Выбирайте что хотите смотреть
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('__layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Yulia\Study\3_course\Web\BackEnd\Laravel\resources\views/__object.blade.php ENDPATH**/ ?>