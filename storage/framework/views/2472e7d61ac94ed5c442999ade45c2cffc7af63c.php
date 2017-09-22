<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
        <?php if(Session::has('fail')): ?>
            <div class="alert alert-danger"><p><strong><?php echo e(Session::get('fail')); ?></strong></p></div>
        <?php endif; ?>
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
                    Thêm bài viết
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="<?php echo e(route('phongthuy.store')); ?>" accept-charset="UTF-8" id="phongthuy" class="phongthuyForm" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề bài viết:</label>
                                <input class="form-control" name="title" type="text" id="title">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="preview_text">Mô tả ngắn:</label>
                                <input class="form-control" name="preview_text" type="text" id="preview_text">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="detail_text">Nội dung:</label>
                                <textarea name="detail_text" class="form-control" id="detail_text" width="100%" rows="5"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="upload">Ảnh hiển thị:</label><br />
                                <!-- <button type="file" class="btn btn-default" name="upload" value="Upload"><i class="glyphicon glyphicon-upload"></i> Upload</button> -->
                                <input type="file" name="upload" id="upload" value="upload">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="phongthuy" class="btn btn-primary" name="submit" value="Thêm"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        //EDITOR
        CKEDITOR.replace('detail_text', {
        filebrowserBrowseUrl: "<?php echo e(asset('admin/js/ckfinder/ckfinder.html')); ?>",
        filebrowserImageBrowseUrl: "<?php echo e(asset('admin/js/ckfinder/ckfinder.html?type=Images')); ?>",
        filebrowserFlashBrowseUrl: "<?php echo e(asset('admin/js/ckfinder/ckfinder.html?type=Flash')); ?>",
        filebrowserUploadUrl: "<?php echo e(asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>",
        filebrowserImageUploadUrl: "<?php echo e(asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>",
        filebrowserFlashUploadUrl: "<?php echo e(asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>"
        });
    </script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>