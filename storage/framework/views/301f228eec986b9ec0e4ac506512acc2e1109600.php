<form action="/posts" class="d-flex">
    <?php if(request('category')): ?>
    <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
    <?php endif; ?>

    <?php if(request('author')): ?>
    <input type="hidden" name="author" value="<?php echo e(request('author')); ?>">
    <?php endif; ?>

    <input type="text" placeholder="Search" name="search" class="form-control me-2">
    <button class="btn" type="submit"><i class="fas fa-search text-white"></i></button>
</form><?php /**PATH C:\laragon\www\b-log\resources\views/templates/search.blade.php ENDPATH**/ ?>