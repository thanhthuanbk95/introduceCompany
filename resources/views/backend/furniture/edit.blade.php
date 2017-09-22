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
                    <form method="POST" action="{{ route('furniture.update', $furniture->id) }}" accept-charset="UTF-8" id="phongthuy" class="phongthuyForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="title">ID:</label>
                                <input class="form-control" name="id" type="text" id="id" value="{{ $furniture->id}}" readonly="readonly">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề:</label>
                                <input class="form-control" name="title" type="text" id="title" value="{{ $furniture->title}}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="categoryform">
                            <!-- Cat -->
                            <div class="col-sm-12">
                                <label for="category">Chọn tiểu mục:</label>
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                        @if($category->id_parent == $idParent)
                                            <option value="{{ $category->id }} @if($category->id == $furniture->idcat) selected="selected" @endif">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="upload">Ảnh hiển thị:</label><br />
                                <div class="feature_image">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                @if(empty($furniture->image))
                                    <input type="file" name="upload" id="upload" value="upload">
                                @else
                                    <img src="{{URL::asset('/storage/images/'.$furniture->image)}}" height="200px">
                                    <button type="button" class="btn btn-warning" name="deleteImage" value="deleteImage" onclick="delImage({{ $furniture->id }});" style="vertical-align: bottom; margin-left: 10px;"><i class="glyphicon glyphicon-remove"></i> Xóa ảnh</button>
                                @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="phongthuy" class="btn btn-primary" name="submit" value="Sửa"><i class="glyphicon glyphicon-edit"></i> Sửa</button>
                                <button class="btn btn-default" type="button" onclick="window.location='{{ url()->previous() }}';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
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
                url: "{{ route('delFurnitureImage') }}",
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