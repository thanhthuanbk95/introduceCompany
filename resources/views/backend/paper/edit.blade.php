@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật tiểu mục
        </h1>
    </section>

    <section class="content">
        @if($errors->count()>0)
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('papers.update',$paper->id) }}" accept-charset="UTF-8" id="papers">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề bài viết:</label>
                                <input class="form-control" name="title" type="text" id="name" value="{{ $paper->title }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parentcat">Chọn danh mục:</label>
                                <select name="parentcat" id="parentcat" class="form-control" onchange="setCat()">
                                    @foreach($parentcats as $parentcat)
                                        <option value="{{ $parentcat->id }}" @if($parentcat->id == $paper->idparent) selected="selected" @endif>{{ $parentcat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="categoryform">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="category">Chọn tiểu mục:</label>
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                        @if($category->id_parent == $paper->idparent)
                                            <option value="{{ $category->id }}" @if($category->id == $paper->idcat) selected="selected" @endif>{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="describe">Mô tả:</label>
                                <textarea name="describe" class="form-control" id="describe" width="100%" rows="5">{{ $paper->describe }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <input class="btn btn-primary" type="submit" value="Lưu">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <div class="list-images">
                        <div class="list">
                            @foreach($images as $image)
                                <div class="picture-{{ $image->id }}">
                                    <img src="{{ asset('../storage/images/'.$image->name) }}" class="img-thumbnail" width="400px">
                                    <form method="POST" action="javascript:void(0)">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <input type="submit" value="Xóa Ảnh" onclick="deleteImage({{ $image->id }})">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="javascript:void(0)" id="form-add-photo">
                            {{ csrf_field() }}
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
    function setCat() {
        var value = $("#parentcat :selected").val();
        if (value == 0) {
            $('#categoryform').html("<div class=\"col-sm-12\"><label for=\"category\">Chọn tiểu mục:</label><label for=\"category\" class=\"form-control\"><span style=\"color: #9f191f\">BẠN CHƯA CHỌN DANH MỤC</span></label></div><div class=\"clearfix\"></div>");
        } else {
            $.ajax({
                url: "{{ route('setCategories') }}",
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
            url: "{{ route('deleteImage') }}",
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
</script>
@stop