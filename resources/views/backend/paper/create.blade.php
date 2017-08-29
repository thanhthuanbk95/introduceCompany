@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm bài viết
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
                    <form method="POST" action="{{ route('papers.store') }}" accept-charset="UTF-8" id="parentcat">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="name">Tiêu đề viết:</label>
                                <input class="form-control" name="name" type="text" id="name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parent">Chọn danh mục:</label>
                                <select name="parent" id="parentcat" class="form-control">
                                    <option value="0">---Chọn danh mục---</option>
                                    @foreach($parentcats as $parentcat)
                                    <option value="{{ $parentcat->id }}">{{ $parentcat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group" id="categoryform">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="category">Chọn tiểu mục:</label>
                                <label for="category" class="form-control"><span style="color: #9f191f">BẠN CHƯA CHỌN DANH MỤC</span></label>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parent">Mô tả:</label>
                                <textarea name="describe" class="form-control" id="describe" width="100%"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <input class="btn btn-primary" type="submit" value="Save">
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
    $('#parentcat').change(function() {
        var value = $("#parentcat :selected").val();
        if(value ==0){
            $('#categoryform').html('<option>Mời chọn danh mục</option>');
        }else{
            $.ajax({
                url : "{{ route('setCategories') }}",
                type : 'post',
                dataType:'text',
                data : {
                    'id_parrent': value
                },
                success : function (result){
                    $('#categoryform').html(result);
//                alert(result);
                },error: function (){
                    alert('aee');
                }
            });
        }
    });
</script>
@stop