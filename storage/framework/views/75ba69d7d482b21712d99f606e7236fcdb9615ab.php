<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logo.png')); ?>" type="image/png">
    <title>b-l0g | <?php echo e($title); ?></title>

    <!-- FontAwesome JS -->
    <script defer src="<?php echo e(asset('assets/plugins/fontawesome/js/all.js')); ?>"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/trix/trix.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/trix/trix.js')); ?>"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"],
        trix-toolbar .trix-button--icon-increase-nesting-level,
        trix-toolbar .trix-button--icon-decrease-nesting-level {
            display: none;
        }

        .img-preview {
            width: 200px !important;
            height: 110px !important;
        }
    </style>
</head>

<body>

    <?php echo $__env->make('templates/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-wrapper">
        <header></header>
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <?php echo $__env->make('templates/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>
<?php /**PATH C:\laragon\www\b-log\resources\views/templates/main.blade.php ENDPATH**/ ?>