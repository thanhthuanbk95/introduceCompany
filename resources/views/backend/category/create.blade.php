@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Thêm tiểu mục
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
                    <form method="POST" action="{{ route('categories.store') }}" accept-charset="UTF-8" id="room">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="name">Tên tiểu mục:</label>
                                <input class="form-control" name="name" type="text" id="name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Parent Cat -->
                            <div class="col-sm-12">
                                <label for="parent">Chọn danh mục:</label>
                                <select name="parent" id="level" class="form-control">
                                    @foreach($parentcat as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
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

@stop