
<?php $__env->startSection('content'); ?>
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Users</h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role); ?></td>
                    <td>
                        <a href="/dashboard/users/<?php echo e($user->id); ?>/edit" class="text-decoration-none text-warning mx-2"><i class="fas fa-pencil-alt"></i></a>
                        <button class="text-decoration-none text-danger border-0 bg-transparent" id="btn-delete-user" data-id="<?php echo e($user->id); ?>" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fas fa-times"></i></button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>