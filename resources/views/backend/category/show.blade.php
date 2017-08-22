@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left">
            Tiểu mục
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('categories.create') }}">Thêm mới</a>
        </h1>
    </section>

    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix"></div>
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr class="info">
                                    <th class="text-center" colspan="2"><h3>Chi tiết tiểu mục {{ $category->name }}</h3></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mã tiểu mục</td>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <td>Tên tiểu mục</td>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Thuộc danh mục</td>
                                    <td>{{ $category->parent_name }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td class="text-success">{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Cập nhật gần nhất</td>
                                    <td class="text-danger">{{ $category->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop