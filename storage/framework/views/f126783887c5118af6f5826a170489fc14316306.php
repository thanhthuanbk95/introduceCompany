<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left">
            Danh mục
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo e(route('parentcats.create')); ?>">Thêm mới</a>
        </h1>
    </section>

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
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Tên danh mục</th>
                                    <th class="text-center" colspan="3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(count($parentcats) <1): ?>
                                <td  class="text-center" colspan="2">Danh sách danh mục hiện đang trống!</td>
                            <?php else: ?>
                            <?php $__currentLoopData = $parentcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($parentcat->name); ?></td>
                                    <td class="text-center">
                                        <form method="POST" action="<?php echo e(route('parentcats.destroy',$parentcat->id)); ?>" accept-charset="UTF-8">
                                            <?php echo e(csrf_field()); ?>

                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class='btn-group'>
                                                <a href="<?php echo e(route('parentcats.show',$parentcat->id)); ?>" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="<?php echo e(route('parentcats.edit',$parentcat->id)); ?>" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&#039;Danh mục con của danh mục này sẽ bị xóa theo?&#039;)">
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
                            <?php echo e($parentcats->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>