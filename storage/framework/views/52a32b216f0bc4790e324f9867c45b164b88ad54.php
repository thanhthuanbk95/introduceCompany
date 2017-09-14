		<footer class="main-footer">
		    <div class="pull-right hidden-xs">
		        Công ty tư vấn và thiết kế xây dựng Việt Vũ Long
		    </div>
		    <strong>Evita <a href="<?php echo e(route('admin.index')); ?>">Quản trị website</a>.</strong>
		</footer>
		<div class="control-sidebar-bg"></div>
		</div>

		<script src="<?php echo e(asset('admin/js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(asset('admin/js/validate.js')); ?>" type="text/javascript"></script>

		<script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/js/app.min.js')); ?>"></script>

		

		<?php echo $__env->yieldContent('script'); ?>
	</body>
</html>
