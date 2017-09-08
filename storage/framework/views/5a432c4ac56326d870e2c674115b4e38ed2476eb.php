<form method="POST" action="/admin/uploadimage/95" enctype="multipart/form-data" id="form-add-photo">
    <?php echo e(csrf_field()); ?>

    <label for="upload-file-selector">
        <label for="upload-file-selector">Chọn ảnh từ máy tính</label>
        <span class="bton">
                                        <input id="upload-file-selector" name="addimage" type="file" onchange="return uploadPhoto()">
                                    </span>
        <input type="submit" value="submit">
    </label>
</form>