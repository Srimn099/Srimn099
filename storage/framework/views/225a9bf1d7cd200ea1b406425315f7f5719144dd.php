
<?php $__env->startSection('content'); ?>
<div class="my-4 row justify-content-center">
    <div class="card border-0">
        <small class="text-muted text-center mt-2 mb-3">
            <span class="badge bg-primary text-white">Detail</span>
        </small>
        <h3 class="mb-4 text-center"><?php echo e($post->title); ?></h3>
        <div class="card-image mb-3 px-4">
            <?php if($post->image): ?>
            <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="card-img-top img-fluid" alt="<?php echo e($post->title); ?>">
            <?php else: ?>
            <img src="https://source.unsplash.com/1200x400?<?php echo e($post->category->name); ?>" class="card-img-top img-fluid" alt="<?php echo e($post->title); ?>">
            <?php endif; ?>
        </div>
        <div class="px-5" style="color: #707070">
            <p class="card-text"><?php echo $post->content; ?></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/dashboard/posts/detail.blade.php ENDPATH**/ ?>