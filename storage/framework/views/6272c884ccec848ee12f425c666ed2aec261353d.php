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
                    <form method="POST" action="" accept-charset="UTF-8" id="room">
                        <!-- <?php echo e(csrf_field()); ?> -->
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="intro">Giới thiệu về Công ty</label>
                                <textarea class="form-control" name="intro" id="intro" rows="4" cols="20"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">

                                <input class="btn btn-primary" type="submit" value="Save">
                                <a href="<?php echo e(route('parentcats.index')); ?>" class="btn btn-default">Cancel</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php phpinfo(); ?>

    <script>
        CKEDITOR.replace('intro', {
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