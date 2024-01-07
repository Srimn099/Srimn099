<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logo.png')); ?>" type="image/png">
    <title>b-l0g | <?php echo e($title); ?></title>

    <!-- FontAwesome JS -->
    <script defer src="<?php echo e(asset('assets/plugins/fontawesome/js/all.js')); ?>"></script>

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/trix/trix.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/trix/trix.js')); ?>"></script>
    
    <!-- My CSS -->
    <link href="<?php echo e(asset('assets/css/dashboard.css')); ?>" rel="stylesheet">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"],
        trix-toolbar .trix-button--icon-increase-nesting-level,
        trix-toolbar .trix-button--icon-decrease-nesting-level {display: none;}
        .img-preview {width: 200px !important;height: 110px !important;}.logo-title{font-family:BioRhyme,serif;color:#7f98fc!important}.alert{margin-top:20px}.border-success{border-color:#39d65b!important}.text-success{color:#39d65b!important}.border-danger{border-color:#f36161!important}.bg-danger{background:#f36161!important}.text-danger{color:#f36161!important}.bg-primary{background:#7f98fc!important}.text-primary{color:#7f98fc!important}.navbar,.sidebar-heading{height:70px!important}
    </style>
</head>
<body>
    <?php echo $__env->make('templates/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Modal delete -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm p-4">
            <div class="modal-content border-0 shadow-sm">
                <h6 class="modal-title text-center mt-4" id="deleteLabel">Delete the post now?</h6>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn bg-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <form method="POST" id="formDelete">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="btn bg-danger text-white rounded-pill px-4">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom fs-3 logo-title py-3">Sri-blog</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light px-3 border-0 <?php echo e(Request::is('dashboard') || Request::is('dashboard/posts*') && !Request::is('dashboard/posts/create') ? 'active bg-primary' : ''); ?>" href="/dashboard/posts">
                    <small><i class="fas fa-file-alt me-2 <?php echo e(Request::is('dashboard') || Request::is('dashboard/posts*') && !Request::is('dashboard/posts/create') ? 'text-white' : 'text-primary'); ?>"></i></small> Posts
                </a>
                <a class="list-group-item list-group-item-action list-group-item-light px-3 border-0 <?php echo e(Request::is('dashboard/posts/create') ? 'active bg-primary' : ''); ?>" href="/dashboard/posts/create">
                    <small><i class="fas fa-plus-circle me-1 <?php echo e(Request::is('dashboard/posts/create') ? 'text-white' : 'text-primary'); ?>"></i></small> New Post
                </a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    <a class="list-group-item list-group-item-action list-group-item-light px-3 border-0 <?php echo e(Request::is('dashboard/users*') ? 'active bg-primary' : ''); ?>" href="/dashboard/users">
                        <i class="fas fa-user me-1 <?php echo e(Request::is('dashboard/users*') ? 'text-white' : 'text-primary'); ?>"></i> Users
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light px-3 border-0 <?php echo e(Request::is('dashboard/categories*') && !Request::is('dashboard/categories/create') ? 'active bg-primary' : ''); ?>" href="/dashboard/categories">
                        <small><i class="fas fa-shapes me-1 <?php echo e(Request::is('dashboard/categories*') && !Request::is('dashboard/categories/create') ? 'text-white' : 'text-primary'); ?>"></i></small> Categories
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light px-3 border-0 <?php echo e(Request::is('dashboard/categories/create') ? 'active bg-primary' : ''); ?>" href="/dashboard/categories/create">
                        <small><i class="fas fa-plus-square me-2 <?php echo e(Request::is('dashboard/categories/create') ? 'text-white' : 'text-primary'); ?>"></i></small> New Category
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                    <a class="nav-link dropdown-toggle text-secondary" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(auth()->user()->name); ?> <img src="<?php echo e(asset('storage/' . auth()->user()->image)); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="mx-2 rounded-circle" width="29">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm me-3" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-secondary" href="/">
                            <small><i class="fas fa-home me-1 text-primary"></i></small> Home
                        </a>
                        <a class="dropdown-item text-secondary" href="/dashboard/users/<?php echo e(auth()->user()->id); ?>">
                            <small><i class="fas fa-user me-2 text-primary"></i></small> Profile
                        </a>
                        <a class="dropdown-item text-secondary" data-bs-toggle="modal" data-bs-target="#logout" style="cursor: pointer">
                            <small><i class="fas fa-sign-out-alt me-1 text-primary"></i></small> Sign Out
                        </a>
                    </div>
                </div>
            </nav>
            <?php echo $__env->make('templates/modalLogout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page content-->
            <div class="container-fluid px-lg-5">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery-3.4.1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script>
        const formDelete = document.querySelector('#formDelete');
        const btnDeletePost = document.querySelectorAll('#btn-delete-post');
        btnDeletePost.forEach(btn => btn.addEventListener('click', function() {
            var slug = this.dataset.slug;
            formDelete.setAttribute('action', '/dashboard/posts/'+slug);
        }));
                
        const btnDeleteUser = document.querySelectorAll('#btn-delete-user');
        btnDeleteUser.forEach(btn => btn.addEventListener('click', function() {
            var id = this.dataset.id;
            formDelete.setAttribute('action', '/dashboard/users/'+id);
        }));
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\b-log\resources\views/templates/dashboard.blade.php ENDPATH**/ ?>