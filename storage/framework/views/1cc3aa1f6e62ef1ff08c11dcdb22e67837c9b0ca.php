<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show bg-white border-0 shadow-sm border-start border-success border-4 position-absolute end-0 me-4 d-flex" role="alert" style="z-index: 10;">
        <div class="me-3 d-flex align-items-center">
            <i class="fas fa-check-circle fs-2 text-success"></i>
        </div>
        <div class="">
            <strong class="d-block text-success">Success!</strong>
            <small class="d-block text-secondary"><?php echo e(session('success')); ?></small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session()->has('failed')): ?>
    <div class="alert alert-danger alert-dismissible fade show bg-white border-0 shadow-sm border-start border-danger border-4 position-absolute end-0 me-4 d-flex" role="alert" style="z-index: 10;">
        <div class="me-3 d-flex align-items-center">
            <i class="fas fa-times-circle fs-2 text-danger"></i>
        </div>
        <div class="">
            <strong class="d-block text-danger">Failed!</strong>
            <small class="d-block text-secondary"><?php echo e(session('failed')); ?></small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?><?php /**PATH C:\laragon\www\b-log\resources\views/templates/alert.blade.php ENDPATH**/ ?>