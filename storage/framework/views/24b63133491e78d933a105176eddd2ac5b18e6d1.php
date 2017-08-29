<?php echo $__env->make('backend.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<header class="main-header">

    <a href="<?php echo e(route('admin.index')); ?>" class="logo">
        <span class="logo-mini"><b>A</b></span>
        <span class="logo-lg"><b>Admin</b></span>    
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <?php echo $__env->make('backend.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </nav>

</header>

<aside class="main-sidebar">
    <?php echo $__env->make('backend.layouts.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</aside>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('backend.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>