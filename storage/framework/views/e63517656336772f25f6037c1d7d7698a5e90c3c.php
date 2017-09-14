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
                    Cập nhật người dùng
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="<?php echo e(route('users.update',$user->id)); ?>" accept-charset="UTF-8" id="user_update" class="userForm" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-6">
                                <label for="name">Tên người dùng:</label>
                                <input class="form-control" name="name" type="text" id="name" value="<?php echo e($user->name); ?>">
                            </div>
                            <!-- Email Field -->
                            <div class="col-sm-6">
                                <label for="email">Email:</label>
                                <input class="form-control" name="email" type="email" id="email" value="<?php echo e($user->email); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Password Field -->
                            <div class="col-sm-6">
                                <label for="password">Mật khẩu mới:</label>
                                <input class="form-control" name="password" type="password" id="password" value="">
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
                                <label for="fullname">Họ và têm:</label>
                                <input class="form-control" name="fullname" type="text" id="fullname" value="<?php echo e($user->fullname); ?>">
                            </div>
                            <!-- Level Field -->
                            <div class="col-sm-6">
                                <label for="level">Cấp bậc:</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="2" <?php if($user->level == 2): ?> selected="selected" <?php endif; ?>>Super Admin</option>
                                    <option value="1" <?php if($user->level == 1): ?> selected="selected" <?php endif; ?>>Admin</option>
                                    <option value="0" <?php if($user->level == 0): ?> selected="selected" <?php endif; ?>>User</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Avatar Field -->
                            <div class="col-sm-6">
                                <label for="avatar">Ảnh đại diện:</label>
                                <input class="form-control" name="avatar" type="file" id="avatar" onchange="viewImg(this)">
                                <br>
                                <p><img id="avartar-img-show" src="<?php echo e(url('storage/avatars/' . $user->avatar)); ?>" alt="avatar" class="img-responsive" width="100px" height="100px"></p>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="user_update" class="btn btn-primary" name="submit" value="Sửa"><i class="glyphicon glyphicon-edit"></i> Sửa</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<script>
    function viewImg(img) {
        var fileReader = new FileReader;
        fileReader.onload = function(img) {
            var avartarShow = document.getElementById("avartar-img-show");

            avartarShow.src = img.target.result
        }, fileReader.readAsDataURL(img.files[0])
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>