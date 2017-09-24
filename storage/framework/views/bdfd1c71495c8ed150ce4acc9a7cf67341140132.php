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
                            Chi tiết bài viết <span style="color: #9f191f"><?php echo e($paper->name); ?></span>
                        </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            
                            <tbody>
                                <tr>
                                    <td>Tiêu đề</td>
                                    <td><?php echo e($paper->title); ?></td>
                                </tr>
                                <tr>
                                    <td>Danh mục</td>
                                    <td><?php echo e($paper->parentcat); ?></td>
                                </tr>
                                <tr>
                                    <td>Tiểu mục</td>
                                    <td><?php echo e($paper->category); ?></td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td><?php echo $paper->describe; ?></td>
                                </tr>
                                <tr>
                                    <td>Người đăng</td>
                                    <td class="text-blue"><?php echo e($paper->user); ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td class="text-success"><?php echo e($paper->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td>Cập nhật gần nhất</td>
                                    <td class="text-danger"><?php echo e($paper->updated_at); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="list-image">
                            <table class="table">
                                <tr>
                                    <th colspan="2" class="text-center"><h3><span style="color: #337ab7"><i class="fa fa-picture-o" aria-hidden="true"></i> Ảnh bài viết</span></h3></th>
                                </tr>
                            <?php for($i = 0 ; $i < count($images) ; $i += 2): ?>
                                <tr>
                                    <td class="text-center">
                                        <img src="<?php echo e(asset('../storage/images/'.$images[$i]->name)); ?>" alt="<?php echo e($images[$i]->name); ?>" class="img-thumbnail" width="400px">
                                    </td>
                                    <?php if($i+1 <count($images)): ?>
                                    <td class="text-center">
                                        <img src="<?php echo e(asset('../storage/images/'.$images[$i+1]->name)); ?>" alt="<?php echo e($images[$i+1]->name); ?>" class="img-thumbnail" width="400px">
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endfor; ?>
                            </table>
                            <button class="btn btn-warning" type="button" style="margin-left: 5px;">
                                <a href="<?php echo e(route('showPaper',$paper->id)); ?>">
                                    <i class="glyphicon glyphicon-remove"></i> Trở về
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>