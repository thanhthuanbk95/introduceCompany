<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo e(url("storage/avatars/".Auth::user()->avatar)); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo e(Auth::user()->fullname); ?></p>
            @ <?php echo e(Auth::user()->name); ?>

        </div>
    </div>

    <ul class="sidebar-menu" id="list_pages">

        <li class="<?php echo e(Request::is('admin/index')? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.index')); ?>">
                <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
        </li>
        <?php if(Auth::user()->level ==  2): ?>

            <li class="<?php echo e(Request::is('admin/users*')? 'active' : ''); ?>">
                <a href="<?php echo e(route('users.index')); ?>">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                </a>
            </li>

        <?php endif; ?>
        <li class="<?php echo e(Request::is('admin/parentcats*')? 'active' : ''); ?>">
            <a href="<?php echo e(route('parentcats.index')); ?>">
                <i class="fa fa-database"></i> <span>Danh mục</span>
            </a>
        </li>
        <li class="<?php echo e(Request::is('admin/categories*')? 'active' : ''); ?>">
            <a href="<?php echo e(route('categories.index')); ?>">
                <i class="fa fa-file-code-o"></i> <span>Tiểu mục</span>
            </a>
        </li>
        <li class="<?php echo e(Request::is('admin/papers*')? 'active' : ''); ?>">
            <a href="<?php echo e(route('papers.index')); ?>">
                <i class="fa fa-newspaper-o"></i> <span>Bài viết</span>
            </a>
        </li>

    </ul>
</section>