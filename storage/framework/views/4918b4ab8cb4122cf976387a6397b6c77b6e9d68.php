<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FontAwesome JS -->
    <script defer src="<?php echo e(asset('assets/plugins/fontawesome/js/all.js')); ?>"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/sign.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logo.png')); ?>" type="image/png">
    
    <title><?php echo e($title); ?></title>
</head>

<body class="sign">
    <?php echo $__env->make('templates/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
</body>
</html><?php /**PATH C:\laragon\www\b-log\resources\views/templates/auth.blade.php ENDPATH**/ ?>