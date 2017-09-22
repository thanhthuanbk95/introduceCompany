@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content">
        @if(Session::has('fail'))
            <div class="alert alert-danger"><p><strong>{{ Session::get('fail') }}</strong></p></div>
        @endif
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
                    Thêm bài viết
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('papers.store') }}" accept-charset="UTF-8" id="papers" class="papersForm">
                        {{ csrf_field() }}
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
                                <select name="parentcat" id="parentcat" class="form-control" onchange="setCat()" disabled="disabled">
                                    @foreach($parentcats as $parentcat)
                                    <option value="{{ $parentcat->id }}" @if($parentcat->id == $idParent) selected="selected"@endif>{{ $parentcat->name }}</option>
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
                                    @if($category->id_parent == $idParent)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <textarea name="describe" class="form-control" id="describe" width="100%" rows="5"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="papers" class="btn btn-primary" name="submit" value="Thêm"><i class="glyphicon glyphicon-plus"></i> Thêm ảnh</button>
                                <button class="btn btn-default" type="button" onclick="window.location='{{ url()->previous() }}';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
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

        //EDITOR
        CKEDITOR.replace('describe', {
        filebrowserBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html') }}",
        filebrowserImageBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html?type=Images') }}",
        filebrowserFlashBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html?type=Flash') }}",
        filebrowserUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
        filebrowserImageUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
        filebrowserFlashUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
        });
    </script>
@stop