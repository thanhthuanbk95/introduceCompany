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
                    <form method="POST" action="<?php echo e(route('papers.store')); ?>" accept-charset="UTF-8" id="papers" class="papersForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề bài viết:</label>
                                <input class="form-control" name="title" type="text" id="name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parentcat">Chọn danh mục:</label>
                                <select name="parentcat" id="parentcat" class="form-control" onchange="setCat()">
                                    <?php $__currentLoopData = $parentcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($parentcat->id); ?>"><?php echo e($parentcat->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="categoryform">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="category">Chọn tiểu mục:</label>
                                <select name="category" class="form-control">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($category->id_parent == $parentcats[0]->id): ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="describe">Mô tả:</label>
                                <textarea name="describe" class="form-control" id="describe" width="100%" rows="5"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="papers" class="btn btn-primary" name="submit" value="Thêm"><i class="glyphicon glyphicon-plus"></i> Thêm ảnh</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<script>
    function setCat() {
        var value = $("#parentcat :selected").val();
        if (value == 0) {
            $('#categoryform').html("<div class=\"col-sm-12\"><label for=\"category\">Chọn tiểu mục:</label><label for=\"category\" class=\"form-control\"><span style=\"color: #9f191f\">BẠN CHƯA CHỌN DANH MỤC</span></label></div><div class=\"clearfix\"></div>");
        } else {
            $.ajax({
                url: "<?php echo e(route('setCategories')); ?>",
                type: 'POST',
                cache: false,
                data: {
                    'id_parent': value
                },
                success: function(data){
                    $('#categoryform').html(data);
                },
                error: function (){
                }
            });
        }
    }

        //EDITOR
        CKEDITOR.replace('describe', {
        filebrowserBrowseUrl: "<?php echo e(asset('admin/js/ckfinder/ckfinder.html')); ?>",
        filebrowserImageBrowseUrl: "<?php echo e(asset('admin/js/ckfinder/ckfinder.html?type=Images')); ?>",
        filebrowserFlashBrowseUrl: "<?php echo e(asset('admin/js/ckfinder/ckfinder.html?type=Flash')); ?>",
        filebrowserUploadUrl: "<?php echo e(asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>",
        filebrowserImageUploadUrl: "<?php echo e(asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>",
        filebrowserFlashUploadUrl: "<?php echo e(asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>"
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>