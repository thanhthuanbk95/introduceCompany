@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content">
        @if($errors->count()>0)
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #c4e3f3;" >
                <h3 style="margin: 0px 5px; color: #0d6496;">
                    Cập nhật bài viết
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('phongthuy.update', $phongthuy->id) }}" accept-charset="UTF-8" id="phongthuy" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="title">ID:</label>
                                <input class="form-control" name="title" type="text" id="title" value="{{ $phongthuy->id}}" readonly="readonly">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề bài viết:</label>
                                <input class="form-control" name="title" type="text" id="title" value="{{ $phongthuy->title}}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="preview_text">Mô tả ngắn:</label>
                                <input class="form-control" name="preview_text" type="text" id="preview_text" value="{{ $phongthuy->preview_text}}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="detail_text">Nội dung:</label>
                                <textarea name="detail_text" class="form-control" id="detail_text" width="100%" rows="5">{{ $phongthuy->detail_text}}</textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="upload">Ảnh hiển thị:</label><br />
                                <div class="feature_image">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                @if(empty($phongthuy->feature_image))
                                    <input type="file" name="upload" id="upload" value="upload">
                                @else
                                    <img src="{{URL::asset('/images/phongthuy/'.$phongthuy->feature_image)}}" height="200px">
                                    <button type="button" class="btn btn-warning" name="deleteImage" value="deleteImage" onclick="delImage({{ $phongthuy->id }});" style="vertical-align: bottom; margin-left: 10px;"><i class="glyphicon glyphicon-remove"></i> Xóa ảnh</button>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="phongthuy" class="btn btn-primary" name="submit" value="Sửa"><i class="glyphicon glyphicon-edit"></i> Sửa</button>
                                <button class="btn btn-default" type="button" onclick="window.location='{{ route('phongthuy.index')}}';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script type="text/javascript">
    //EDITOR
    CKEDITOR.replace('detail_text', {
        filebrowserBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html') }}",
        filebrowserImageBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html?type=Images') }}",
        filebrowserFlashBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html?type=Flash') }}",
        filebrowserUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
        filebrowserImageUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
        filebrowserFlashUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
    });

    function delImage(id){
        if(confirm("Bạn muốn xóa ảnh này?")){
            $.ajax({
                url: "{{ route('delImage') }}",
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
@stop