<section class="sidebar">


    <ul class="sidebar-menu" id="list_pages">
        <li class="<?php echo e(Request::is('homepage')? 'active' : ''); ?>">
            <a href="<?php echo e(route('homepage')); ?>">
                <i class="fa fa-home"></i> <span>Trang chủ</span>
            </a>
        </li>
        <li class="<?php echo e(Request::is('admin/index')? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.index')); ?>">
                <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
            </a>
        </li>
        <li class="<?php echo e(Request::is('admin/indexImage*')? 'active' : ''); ?>">
            <a href="<?php echo e(route('indexImage.index')); ?>">
                <i class="fa fa-image"></i> <span>Ảnh Homepage</span>
            </a>
        </li>
        <?php if(Auth::user()->level ==  2): ?>

            <li class="<?php echo e(Request::is('admin/users*')? 'active' : ''); ?>">
                <a href="<?php echo e(route('users.index')); ?>">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/infor')? 'active' : ''); ?>">
                <a href="<?php echo e(route('infor')); ?>">
                    <i class="fa fa-info-circle"></i> <span>Thông tin</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/introInfo')? 'active' : ''); ?>">
                <a href="<?php echo e(route('introInfo')); ?>">
                    <i class="fa fa-file-text-o"></i> <span>Giới thiệu</span>
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
        <li class="<?php echo e(Request::is('admin/phongthuy*')? 'active' : ''); ?>">
            <a href="<?php echo e(route('phongthuy.index')); ?>">
                <i class="fa fa-adjust"></i> <span>Phong thủy</span>
            </a>
        </li>

        <li class="<?php echo e(Request::is('admin/adcontact*')? 'active' : ''); ?>">
            <a href="<?php echo e(route('adcontact.index')); ?>">
                <i class="fa fa-envelope"></i> <span>Liên hệ</span>
            </a>
        </li>

    </ul>
</section>