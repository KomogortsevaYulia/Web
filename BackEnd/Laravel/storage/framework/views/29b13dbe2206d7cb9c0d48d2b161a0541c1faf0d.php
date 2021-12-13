<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/search">Поиск</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/flower/create">Добавить цветок</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/types">Типы</a>
            </li>
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/?type=<?php echo e($type->id); ?>"><?php echo e($type->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
</nav>
     <div class="container">
         <?php echo $__env->yieldContent('content'); ?>
     </div>
</body>
</html>
<?php /**PATH C:\Yulia\Study\3_course\Web\BackEnd\Laravel\resources\views/__layout.blade.php ENDPATH**/ ?>