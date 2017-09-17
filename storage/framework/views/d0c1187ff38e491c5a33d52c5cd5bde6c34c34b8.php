<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
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
                    Thêm ảnh Homepage mới
                </h3>
            </div>
            <div class="box-body">
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><p><strong><?php echo e(Session::get('success')); ?></strong></p></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><p><strong><?php echo e(Session::get('fail')); ?></strong></p></div>
                <?php endif; ?>
                <div class="row">
                    <form method="POST" action="<?php echo e(route('indexImage.store')); ?>" enctype="multipart/form-data" id="indexImage" class="userForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <!-- Image Field -->
                            <div class="col-sm-6">
                                <label for="avatar">Tải ảnh lên từ máy tính <span style="color: #9f191f">( Vui lòng chọn ảnh có kích cỡ lớn )</span></label>
                                <input class="form-control" name="indexImage" type="file" id="indexImage" onchange="viewImg(this)">
                                <br>
                                <p><img id="indexImage-show" src="<?php echo e(url('storage/indexImage/default.jpg')); ?>" alt="indexImage" class="img-responsive" width="500px" height="300px"></p>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="indexImage" class="btn btn-primary" name="submit" value="Thêm"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<script>
    function viewImg(img) {
        console.log(img);
        var fileReader = new FileReader;
        fileReader.onload = function(img) {
            console.log(img);
            var avartarShow = document.getElementById("indexImage-show");
            avartarShow.src = img.target.result
        }, fileReader.readAsDataURL(img.files[0]);

    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>