

<?php $__env->startSection('content'); ?>
<h1>Редактирование цветочка</h1>
    <hr>
    <form action="<?php echo e(route("flower.update",["id" =>$object->id ])); ?>" method="post" enctype="multipart/form-data" class="row g-3">
        <?php echo csrf_field(); ?>
        <div class="col-4">
            <label class="form-label">Название</label>
            <input type="text" class="form-control" value="<?php echo e($object->title); ?>" name="title">
        </div>
        <div class="col-4">
            <label class="form-label">Краткое описание</label>
            <input type="text" class="form-control" value="<?php echo e($object->description); ?>"  name="description">
        </div>
        <div class="col-4">
            <label class="form-label">Тип</label>
            <select class="form-control" name="type">
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($type->id == $object->type): ?>
                        <option value="<?php echo e($type->id); ?>" selected><?php echo e($type->name); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-3"> 
            <img src="<?php echo e($object->image); ?>" style="width: 300px;"/>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label">Картинка</label>
            <textarea class="form-control" rows="5" name="image"><?php echo e($object->image); ?></textarea>
          </div>
        <div class="col-12">
            <textarea name="info" placeholder="Полное описание..." class="form-control" rows="10"><?php echo e($object->info); ?></textarea>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
        
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('__layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Yulia\Study\3_course\Web\BackEnd\Laravel\resources\views/update.blade.php ENDPATH**/ ?>