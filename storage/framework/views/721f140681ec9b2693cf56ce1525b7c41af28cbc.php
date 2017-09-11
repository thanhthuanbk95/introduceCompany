<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật thông tin
        </h1>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="<?php echo e(route('inforUpdate')); ?>" accept-charset="UTF-8" id="information">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="name">Tên công ty</label>
                                <input class="form-control" name="name" type="text" id="name" value="<?php echo e($information->name); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="address">Địa chỉ</label>
                                <input class="form-control" name="address" type="text" id="address" value="<?php echo e($information->address); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" name="phone" type="text" id="phone" value="<?php echo e($information->phone); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" type="text" id="email" value="<?php echo e($information->email); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="facebook">Facebook</label>
                                <input class="form-control" name="facebook" type="text" id="facebook" value="<?php echo e($information->facebook); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="google">Google</label>
                                <input class="form-control" name="google" type="text" id="google" value="<?php echo e($information->google); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="pinterest">Pinterest</label>
                                <input class="form-control" name="pinterest" type="text" id="pinterest" value="<?php echo e($information->pinterest); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="twitter">Twitter</label>
                                <input class="form-control" name="twitter" type="text" id="twitter" value="<?php echo e($information->twitter); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <input class="btn btn-primary" type="submit" value="Lưu">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>