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
                    <form method="POST" action="{{ route('furniture.store') }}" accept-charset="UTF-8" id="phongthuy" class="phongthuyForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="title">Tiêu đề:</label>
                                <input class="form-control" name="title" type="text" id="title">
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="upload">Ảnh hiển thị:</label><br />
                                <input type="file" name="upload" id="upload" value="upload">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="phongthuy" class="btn btn-primary" name="submit" value="Thêm"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
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
@stop