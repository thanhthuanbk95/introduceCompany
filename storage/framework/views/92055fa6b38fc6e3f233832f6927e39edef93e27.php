<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix"></div>
                <div class="box box-default">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Thông tin Tiểu mục
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="<?php echo e(route('categories.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr class="info">
                                    <th class="text-center" colspan="2"><h3 style="margin: 0px;">Chi tiết tiểu mục <span style="color: #9f191f"><?php echo e($category->name); ?></span></h3></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mã tiểu mục</td>
                                    <td><?php echo e($category->id); ?></td>
                                </tr>
                                <tr>
                                    <td>Tên tiểu mục</td>
                                    <td><?php echo e($category->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Thuộc danh mục</td>
                                    <td><?php echo e($category->parent_name); ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td class="text-success"><?php echo e($category->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td>Cập nhật gần nhất</td>
                                    <td class="text-danger"><?php echo e($category->updated_at); ?></td>
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