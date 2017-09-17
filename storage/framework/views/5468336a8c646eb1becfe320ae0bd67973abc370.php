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
                    Cập nhật bài viết
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="<?php echo e(route('papers.update',$paper->id)); ?>" accept-charset="UTF-8" id="papers" class="papersForm">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề bài viết:</label>
                                <input class="form-control" name="title" type="text" id="name" value="<?php echo e($paper->title); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parentcat">Chọn danh mục:</label>
                                <select name="parentcat" id="parentcat" class="form-control" onchange="setCat()">
                                    <?php $__currentLoopData = $parentcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($parentcat->id); ?>" <?php if($parentcat->id == $paper->idparent): ?> selected="selected" <?php endif; ?>><?php echo e($parentcat->name); ?></option>
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
                                        <?php if($category->id_parent == $paper->idparent): ?>
                                            <option value="<?php echo e($category->id); ?>" <?php if($category->id == $paper->idcat): ?> selected="selected" <?php endif; ?>><?php echo e($category->name); ?></option>
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
                                <textarea name="describe" class="form-control" id="describe" width="100%" rows="5"><?php echo e($paper->describe); ?></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="papers" class="btn btn-primary" name="submit" value="Lưu"><i class="glyphicon glyphicon-edit"></i> Lưu</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <div id="list-images" class="col-sm-10 col-sm-offset-1">
                        <div id="list">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="picture-<?php echo e($image->id); ?>">
                                    <img src="<?php echo e(asset('../storage/images/'.$image->name)); ?>" class="img-thumbnail" width="400px">
                                    <form method="POST" action="javascript:void(0)">
                                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                        <input type="submit" value="Xóa Ảnh" onclick="deleteImage(<?php echo e($image->id); ?>)">
                                    </form>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="javascript:void(0)" id="form-upload-photo">
                            <?php echo e(csrf_field()); ?>

                            <label for="upload-file-selector">
                                <label for="upload-file-selector">Thêm ảnh từ máy tính</label>
                                <span class="bton">
                                        <input id="upload-file-selector" name="addimage" type="file" onchange="return uploadPhoto()">
                                    </span>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script>
    function uploadPhoto() {
        var fakePath = $('#upload-file-selector').val();
        var arr_path = fakePath.split('/');
        var filename = arr_path[arr_path.length - 1];
        var filename = filename.split('.');
        var type = filename[filename.length - 1];
        if(type == 'jpg' || type == 'png' || type == 'jpeg' || type =='gif'){
            $('#form-upload-photo').submit();
        }else{
            alert('Tập tin không đúng định dạng ảnh!');
        }
    }
    $(document).on('submit','#form-upload-photo', function (e){
        var token = $("input[name='_token']").val();
        var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: "<?php echo e(route('uploadImage',[$paper->id])); ?>",
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formdata,
            success: function(data){
                alert(data.name);
                var show = '<div class=\"picture-'+data.id+'\"><img src=\"../../../storage/images/'+ data.name +'\" class=\"img-thumbnail\" width=\"400px\">';
                show = show + '<form method=\"POST\" action=\"javascript:void(0)\">'
                    + '<meta name=\"csrf-token\" content=\"<?php echo e(csrf_token()); ?>\">'
                    + '<input type=\"submit\" value=\"Xóa Ảnh\" onclick=\"deleteImage('+data.id+')\">';
                show = show+'</form></div>'
                $('#list').append(show);
            },
            error: function (){
            },
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,
        });
        return false;
    });
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
    function deleteImage(id){
        $.ajax({
            url: "<?php echo e(route('deleteImage')); ?>",
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                'idimage': id
            },
            success: function (data) {
                $('.picture-' + data).remove();
            },
            error: function () {
            }
        });
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