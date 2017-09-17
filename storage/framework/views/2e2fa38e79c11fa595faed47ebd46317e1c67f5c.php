<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
        <?php if($errors->count()>0): ?>
            <ul class="alert alert-danger" style="list-style-type: none">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <div class="box box-primary">
        <div class="box-header with-border" style="background-color: #c4e3f3;" >
                <h3 style="margin: 0px 5px; color: #0d6496;">
                    Thêm người dùng
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="<?php echo e(route('users.store')); ?>" accept-charset="UTF-8" id="user" class="userForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-6">
                                <label for="name" style="color: #9c3328">Tên người dùng (duy nhất ):</label>
                                <input class="form-control" name="name" type="text" id="name">
                            </div>
                            <!-- Email Field -->
                            <div class="col-sm-6">
                                <label for="email">Email:</label>
                                <input class="form-control" name="email" type="email" id="email">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Password Field -->
                            <div class="col-sm-6">
                                <label for="password">Mật khẩu:</label>
                                <input class="form-control" name="password" type="password" id="password">
                            </div>

                            <!-- Password Confirmation Field -->
                            <div class="col-sm-6">
                                <label for="password_confirmation">Xác nhận mật khẩu:</label>
                                <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="">
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Fullname Field -->
                            <div class="col-sm-6">
                                <label for="fullname">Họ và tên:</label>
                                <input class="form-control" name="fullname" type="text" id="fullname">
                            </div>
                            <!-- Level Field -->
                            <div class="col-sm-6">
                                <label for="level">Cấp bậc:</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="2">Super Admin</option>
                                    <option value="1">Admin</option>
                                    <option value="0" selected>User</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="user" class="btn btn-primary" name="submit" value="Thêm"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>