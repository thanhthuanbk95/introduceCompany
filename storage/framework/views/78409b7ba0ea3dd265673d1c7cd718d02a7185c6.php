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
                    <form method="POST" action="<?php echo e(route('furniture.update', $furniture->id)); ?>" accept-charset="UTF-8" id="phongthuy" class="phongthuyForm" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="title">ID:</label>
                                <input class="form-control" name="id" type="text" id="id" value="<?php echo e($furniture->id); ?>" readonly="readonly">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề:</label>
                                <input class="form-control" name="title" type="text" id="title" value="<?php echo e($furniture->title); ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="categoryform">
                            <!-- Cat -->
                            <div class="col-sm-12">
                                <label for="category">Chọn tiểu mục:</label>
                                <select name="category" class="form-control">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($category->id_parent == $idParent): ?>
                                            <option value="<?php echo e($category->id); ?> <?php if($category->id == $furniture->idcat): ?> selected="selected" <?php endif; ?>"><?php echo e($category->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="upload">Ảnh hiển thị:</label><br />
                                <div class="feature_image">
                                <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                <?php if(empty($furniture->image)): ?>
                                    <input type="file" name="upload" id="upload" value="upload">
                                <?php else: ?>
                                    <img src="<?php echo e(URL::asset('/storage/images/'.$furniture->image)); ?>" height="200px">
                                    <button type="button" class="btn btn-warning" name="deleteImage" value="deleteImage" onclick="delImage(<?php echo e($furniture->id); ?>);" style="vertical-align: bottom; margin-left: 10px;"><i class="glyphicon glyphicon-remove"></i> Xóa ảnh</button>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="phongthuy" class="btn btn-primary" name="submit" value="Sửa"><i class="glyphicon glyphicon-edit"></i> Sửa</button>
                                <button class="btn btn-default" type="button" onclick="window.location='<?php echo e(url()->previous()); ?>';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    </form>
                    </div>
                </div>
            </div>
    </section>

</div>
<script type="text/javascript">
    function delImage(id){
        if(confirm("Bạn muốn xóa ảnh này?")){
            $.ajax({
                url: "<?php echo e(route('delFurnitureImage')); ?>",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                cache: false,
                data: {
                    'id': id
                },
                success: function (data) {
                    $('.feature_image').html('<input type=\"file\" name=\"upload\" id=\"upload\" value=\"upload\">');
                },
                error: function () {
                    alert("error while delete image");
                }
            });
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>