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
                    Cập nhật tiểu mục
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('categories.update',$category->id) }}" accept-charset="UTF-8" id="room">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="name">Tên tiểu mục:</label>
                                <input class="form-control" name="name" type="text" id="name" value="{{ $category->name }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parent">Chọn danh mục:</label>
                                <select name="parent" id="level" class="form-control">
                                    @foreach($parentcat as $parent)
                                        <option value="{{ $parent->id }}" @if($category->id_parent == $parent->id) selected="selected" @endif>{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <button type="submit" form="room" class="btn btn-primary" name="submit" value="Lưu"><i class="glyphicon glyphicon-edit"></i> Lưu</button>
                                <button class="btn btn-default" type="button" onclick="window.location='{{ route('categories.index')}}';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
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