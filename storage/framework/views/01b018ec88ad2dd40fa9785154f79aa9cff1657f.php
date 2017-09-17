<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix"></div>
                <div class="box box-primary">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Thông tin người dùng
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="<?php echo e(route('users.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr class="info">
                                    <th class="text-center" colspan="2"><h4>Thông tin người dùng</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mã người dùng</td>
                                    <td><?php echo e($user->id); ?></td>
                                </tr>
                                <tr>
                                    <td>Tên người dùng</td>
                                    <td><?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <td>Họ và tên</td>
                                    <td><?php echo e($user->fullname); ?></td>
                                </tr>
                                <tr>
                                    <td>Cấp bậc</td>
                                    <td>
                                        <?php if($user->level == 2): ?>
                                            Super Admin
                                        <?php elseif($user->level == 1): ?>
                                            Admin
                                        <?php else: ?>
                                            User
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td class="text-success"><?php echo e($user->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td>Cập nhật gần nhất</td>
                                    <td class="text-danger"><?php echo e($user->updated_at); ?></td>
                                </tr>
                                <tr>
                                    <td>Ảnh đại diện</td>
                                    <td><img src="<?php echo e(url("storage/avatars/$user->avatar")); ?>" width="200px"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-warning" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-top: 15px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>