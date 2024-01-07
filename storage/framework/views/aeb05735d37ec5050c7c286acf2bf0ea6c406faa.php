
<?php $__env->startSection('content'); ?>
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Post Categories</h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->slug); ?></td>
                    <td>
                        <form action="/dashboard/categories/<?php echo e($category->slug); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <a href="/dashboard/categories/<?php echo e($category->slug); ?>/edit" class="text-decoration-none text-warning mx-2 d-inline"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="border-0 bg-transparent text-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/dashboard/categories/index.blade.php ENDPATH**/ ?>