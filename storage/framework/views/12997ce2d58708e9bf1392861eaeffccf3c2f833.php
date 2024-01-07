
<?php $__env->startSection('content'); ?>
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Post by <?php echo e(auth()->user()->name); ?></h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($posts->count()): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($post->title); ?></td>
                        <td><?php echo e($post->category->name); ?></td>
                        <td><?php echo e(date('d/F/Y', strtotime($post->created_at))); ?></td>
                        <td>
                            <a href="/dashboard/posts/<?php echo e($post->slug); ?>" class="text-decoration-none text-info"><i class="fas fa-eye"></i></a>
                            <a href="/dashboard/posts/<?php echo e($post->slug); ?>/edit" class="text-decoration-none text-warning mx-2"><i class="fas fa-pencil-alt"></i></a>
                            <button class="text-decoration-none text-danger border-0 bg-transparent" id="btn-delete-post" data-slug="<?php echo e($post->slug); ?>" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fas fa-times"></i></button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="pt-3"><p class="text-center">No post found.</p></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/dashboard/posts/index.blade.php ENDPATH**/ ?>