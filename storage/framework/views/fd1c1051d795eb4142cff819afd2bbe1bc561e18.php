<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><p><strong><?php echo e(Session::get('success')); ?></strong></p></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><p><strong><?php echo e(Session::get('fail')); ?></strong></p></div>
                <?php endif; ?>
                <div class="clearfix"></div>
                <div class="box box-default">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Bài viết Phong thủy
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="<?php echo e(route('phongthuy.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Tiêu đề bài viết</th>
                                    <th class="text-center">Mô tả</th>
                                    <th class="text-center">Ảnh hiển thị</th>
                                    <th class="text-center" width="100px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($phongthuy) < 1): ?>
                                <td  class="text-center" colspan="8">Chưa có bài viết nào!</td>
                            <?php else: ?>
                            <?php $__currentLoopData = $phongthuy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($item->id); ?></td>
                                    <td class="text-center"><?php echo e($item->title); ?></td>
                                    <td class="text-center"><?php echo e($item->preview_text); ?></td>
                                    <td class="text-center">
                                        <?php if(empty($item->feature_image)): ?>
                                            <img src="<?php echo e(URL::asset('/images/noimage.png')); ?>" height="150px">
                                        <?php else: ?>
                                            <img src="<?php echo e(URL::asset('/storage/phongthuy/'.$item->feature_image)); ?>" height="150px">
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" action="<?php echo e(route('phongthuy.destroy',$item->id)); ?>" accept-charset="UTF-8">
                                            <?php echo e(csrf_field()); ?>

                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class='btn-group'>
                                                <a href="<?php echo e(route('phongthuy.show',$item->id)); ?>" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="<?php echo e(route('phongthuy.edit',$item->id)); ?>" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&#039;Bạn muốn xóa bài viết này?&#039;)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pagination-sm no-margin pull-right">
                            <?php echo e($phongthuy->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>