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
                <div class="box box-defautl">
                <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Danh sách ảnh Homepage
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="<?php echo e(route('indexImage.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Thêm ảnh</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <table class="table table-responsive table-bordered" id="tours-table">
                                <thead>
                                <tr>
                                    <th class="text-center">Ảnh</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($images)<1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center"><h3>Bạn chưa tải ảnh nào!</h3></td>
                                    </tr>
                                <?php else: ?>
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><img src="<?php echo e(url('storage/indexImage/'.$image->name)); ?>" alt="image-index-<?php echo e($image->id); ?>" width="50%"></td>
                                            <td class="text-center">
                                                <form method="POST" action="<?php echo e(route('indexImage.destroy', $image->id)); ?>" accept-charset="UTF-8">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class='btn-group'>
                                                        <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm(&#039;Bạn muốn xóa ảnh này?&#039;)">
                                                            <i class="glyphicon glyphicon-trash"></i> Xóa
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
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pagination-sm no-margin pull-right">
                            <?php echo e($images->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>