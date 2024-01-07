
<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center mb-5">
        <div class="text-center main-title mb-1">
            <h2 class="text-primary fw-bold"><?php echo e($title); ?></h2>
            <p>Look for some amazing post that might you need.</p>
        </div>
        <div class="col-sm-10 col-md-6">
            <?php echo $__env->make('templates/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="row cards d-flex flex-wrap">
        <?php if($posts->count()): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-image">
                            <?php if($post->image): ?>
                                <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="card-img-top img-fluid"
                                    alt="<?php echo e($post->title); ?>">
                            <?php else: ?>
                                <img src="https://source.unsplash.com/1200x600?<?php echo e($post->category->name); ?>"
                                    class="card-img-top img-fluid" alt="<?php echo e($post->title); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <a href="/posts?category=<?php echo e($post->category->slug); ?>"
                                class="text-decoration-none badge bg-primary mb-2 text-white"><small><?php echo e($post->category->name); ?></small></a>
                            <a href="/posts/<?php echo e($post->slug); ?>" class="text-decoration-none text-dark">
                                <h5 class="card-title text-truncate"><?php echo e($post->title); ?></h5>
                            </a>
                            <p class="card-text"><?php echo e($post->excerpt); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-center fs-4">No post found.</p>
        <?php endif; ?>

        <?php echo e($posts->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/posts.blade.php ENDPATH**/ ?>