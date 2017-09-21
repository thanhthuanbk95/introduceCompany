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
                    Thêm ảnh cho bài viết
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-10 col-md-offset-1">
                        <table class="table table-hovered">
                            <tr>
                                <th colspan="2" class="text-center success"><h3 style="margin: 0px;"><span>Thông tin bài viết</span></h3></th>
                            </tr>
                            <tr>
                                <td>Tiêu đề</td>
                                <td>{{ $paper->title }}ề</td>
                            </tr>
                            <tr>
                                <td>Danh mục</td>
                                <td>{{ $paper->parentcat }}</td>
                            </tr>
                            <tr>
                                <td>Tiểu mục</td>
                                <td>{{ $paper->category }}</td>
                            </tr>
                            <tr>
                                <td>Mô tả</td>
                                <td>{{ $paper->describe }}</td>
                            </tr>
                            <tr>
                                <td>Lượt xem</td>
                                <td>{{ $paper->seen }}</td>
                            </tr>
                        </table>
                        <div id="list_photo">

                        </div>
                        <form method="POST" enctype="multipart/form-data" action="javascript:void(0)" id="form-add-photo">
                            {{ csrf_field() }}
                            <label for="upload-file-selector">
                                <label for="upload-file-selector">Chọn ảnh từ máy tính</label>
                                    <span class="bton">
                                        <input id="upload-file-selector" name="addimage" type="file" onchange="return uploadPhoto()">
                                    </span>
                            </label>
                        </form>
                        {{--<button class="btn btn-primary">--}}
                            <a href="{{ route('papers.show', $paper->id) }}" title="Lưu" class="btn btn-primary" onclick="return confirm('Nhấn OK để xem toàn bộ bài viết')"><i class="glyphicon glyphicon-edit"></i> Lưu</a>
                        {{--</button>--}}
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
            $('#form-add-photo').submit();
        }else{
            alert('Tập tin không đúng định dạng ảnh!');
        }
    }
    $(document).on('submit','#form-add-photo', function (e){
        var token = $("input[name='_token']").val();
        var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: "{{ route('uploadImage',[$paper->id]) }}",
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formdata,
            success: function(data){
                var show = '<div class=\"picture-'+data.id+'\"><img src=\"../../storage/images/'+ data.name +'\" class=\"img-thumbnail\" width=\"400px\">';
                show = show + '<form method=\"POST\" action=\"javascript:void(0)\">'
                            + '<meta name=\"csrf-token\" content=\"{{ csrf_token() }}\">'
                            + '<input type=\"submit\" value=\"Xóa Ảnh\" onclick=\"deleteImage('+data.id+')\">';
                show = show+'</form></div>'
                $('#list_photo').append(show);
            },
            error: function (){
            },
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,
        });
        return false;
    });
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
    function viewImg(img) {
        var fileReader = new FileReader;
        fileReader.onload = function(img) {
            var avartarShow = document.getElementById("avartar-img-show");

            avartarShow.src = img.target.result
        }, fileReader.readAsDataURL(img.files[0])
    }
</script>
@stop