

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-6 text-center main-title">
            <h2 class="text-primary fw-bold"><?php echo e($title); ?></h2>
            <p>Look for some amazing post that might you need.</p>
            <?php echo $__env->make('templates/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="content mt-2">
        <div class="container">
            <div class="row d-flex">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-4 mb-3">
                        <a href="/posts?category=<?php echo e($category->slug); ?>">
                            <div class="card bg-dark text-white border-0 shadow-sm">
                                <img src="https://source.unsplash.com/1200x600?<?php echo e($category->name); ?>" class="card-img"
                                    alt="<?php echo e($category->name); ?>">
                                <div class="card-img-overlay d-flex align-items-end p-0">
                                    <h5 class="card-title text-center flex-fill bg-primary mb-0 py-2"><?php echo e($category->name); ?>

                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/categories.blade.php ENDPATH**/ ?>