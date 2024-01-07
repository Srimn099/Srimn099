
<?php $__env->startSection('content'); ?>
    <div class="my-4 mt-5 py-3 px-5 shadow-sm">
        <div class="row">
            <div class="col-md-3 mb-3">
                <img src="<?php echo e(asset('storage/' . $user->image)); ?>" style="width: 100%" class="rounded-circle" alt="<?php echo e($user->name); ?>">
            </div>
            <div class="col-md-9 mb-3 align-self-center"">
                <div class="border-bottom p-2 mb-3">
                    <i class="fas fa-user text-primary me-2"></i> <?php echo e($user->name); ?>

                </div>
                <div class="border-bottom p-2 mb-3">
                    <i class="fas fa-envelope text-primary me-2"></i> <?php echo e($user->email); ?>

                </div>
                <div class="border-bottom p-2 mb-3">
                    <i class="fas fa-at text-primary me-2"></i> <?php echo e($user->username); ?>

                </div>
                <div class="border-bottom p-2 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Active since">
                    <i class="fas fa-calendar-alt text-primary me-2"></i> <?php echo e(date('d F Y', strtotime($user->created_at))); ?>

                </div>
                <a href="/dashboard/users/<?php echo e($user->id); ?>/edit" class="btn float-end text-white bg-primary"><i class="fas fa-pencil-alt me-1"></i> Edit Profile</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/dashboard/users/show.blade.php ENDPATH**/ ?>