

<?php $__env->startSection('content'); ?>
<div class="row d-flex">
    <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-4 mb-6 align-items-stretch">
        <div class="border p-2 d-flex flex-column justify-content-between position-relative">
            <div class="position-absolute" style="right:4px;top:4px">
                <?php echo csrf_field(); ?>
                <form method="post" action="<?php echo e(route("flower.delete",$object->id)); ?>">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
            <div class="position-absolute" style="right:4px;top:35px">
                <form method="get" action="<?php echo e(route("flower.edit",$object->id)); ?>">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </form>
            </div>
        <div class="img-thumbnail mb-2" style="width:100%;height:300px;overflow:hidden;">
            <img src=" <?php echo e($object->image); ?>" style="width:100%;height:100%;object-fit:cover;" alt="">
        </div>
        <div class="d-flex flex-column">
            <a class="btn btn-primary mb-1" href="<?php echo e(route("flower",$object->id)); ?>"> <?php echo e($object->title); ?></a>
            <div class="d-flex justify-content-center">
                <a class="me-3" href="/flower/<?php echo e($object->id); ?> ?show=image">Картинка</a>
                <a href="/flower/<?php echo e($object->id); ?> ?show=info">Описание</a>
            </div>
        </div>
        </div>  
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('__layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Yulia\Study\3_course\Web\BackEnd\Laravel\resources\views/main.blade.php ENDPATH**/ ?>