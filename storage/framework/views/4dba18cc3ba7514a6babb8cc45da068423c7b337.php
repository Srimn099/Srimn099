

<?php $__env->startSection('content'); ?>
    <div class="content my-4">
        <div class="row">
            <div class="col-lg-8 col-12 mb-3">
                <div class="card detail-post border-0 shadow-sm">
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
                        <h3 class="mb-3"><?php echo e($post->title); ?></h3>
                        <div style="color: #707070">
                            <p class="card-text"><?php echo $post->content; ?></p>
                        </div>
                        <p class="card-text border-top pt-2 d-flex flex-wrap">
                            <small class="text-muted me-3"><i class="fas fa-calendar-alt me-1"></i> Last updated 3 mins
                                ago</small>
                            <small class="text-muted me-3">
                                <i class="fas fa-tag me-1"></i>
                                <a href="/posts?category=<?php echo e($post->category->slug); ?>"
                                    class="text-decoration-none"><?php echo e($post->category->name); ?></a>
                            </small>
                            <small class="text-muted ms-auto">
                                <i class="fas fa-user me-1"></i>
                                <a href="/posts?author=<?php echo e($post->author->username); ?>"
                                    class="text-decoration-none"><?php echo e($post->author->name); ?></a>
                            </small>
                        </p>

                    </div>
                </div>
            </div>
            <div class="related-post col-lg-4 col-12 mb-3">
                <div class="card border-0 shadow-sm p-3">
                    <h3 class="logo-title">Related Post</h3>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="post border-bottom mt-2 mb-3 pb-1 d-flex">
                            <div class="caption-img">
                                <?php if($category->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $category->image)); ?>" class="card-img-top img-fluid"
                                        alt="<?php echo e($category->title); ?>">
                                <?php else: ?>
                                    <img src="https://source.unsplash.com/1200x600?<?php echo e($category->category->name); ?>"
                                        class="card-img-top img-fluid" alt="<?php echo e($post->title); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="caption card-body">
                                <p class="card-text">
                                    <small class="text-muted">
                                        <a href="/posts?category=<?php echo e($category->category->slug); ?>"
                                            class="text-primary text-decoration-none"><?php echo e($category->category->name); ?></a> -
                                        <?php echo e(date('d/F/Y', strtotime($category->created_at))); ?>

                                    </small>
                                </p>
                                <a href="/posts/<?php echo e($category->slug); ?>" class="text-decoration-none">
                                    <h6 class="card-title text-dark"><?php echo e($category->title); ?></h6>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\b-log\resources\views/post.blade.php ENDPATH**/ ?>