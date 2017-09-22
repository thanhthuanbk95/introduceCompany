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
                            Chi tiết bài viết
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="<?php echo e(route('phongthuy.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                            <a class="btn btn-primary pull-right" href="<?php echo e(route('phongthuy.edit',$phongthuy->id)); ?>" style="margin-right: 10px;"><i class="glyphicon glyphicon-edit"></i> Sửa tin</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            
                            <tbody>
                                <tr>
                                    <td class="text-bold" width="100px">ID</td>
                                    <td><?php echo e($phongthuy->id); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">ngày tạo</td>
                                    <td><?php echo e($phongthuy->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Hình ảnh</td>
                                    <td>
                                        <?php if(empty($phongthuy->feature_image)): ?>
                                            <img src="<?php echo e(URL::asset('/images/noimage.png')); ?>" height="150px">
                                        <?php else: ?>
                                            <img src="<?php echo e(URL::asset('/storage/phongthuy/'.$phongthuy->feature_image)); ?>" height="150px">
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Tiêu đề</td>
                                    <td><?php echo e($phongthuy->title); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Mô tả</td>
                                    <td><?php echo e($phongthuy->preview_text); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Nội dung chi tiết</td>
                                    <td><?php echo $phongthuy->detail_text; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <button class="btn btn-warning" type="button" onclick="window.location='<?php echo e(route('phongthuy.index')); ?>';" style="margin-top: 15px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>