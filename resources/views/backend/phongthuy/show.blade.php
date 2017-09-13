@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix"></div>
                <div class="box box-default">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Chi tiết bài viết
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="{{ route('papers.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                            <a class="btn btn-primary pull-right" href="{{ route('phongthuy.edit',$phongthuy->id) }}" style="margin-right: 10px;"><i class="glyphicon glyphicon-edit"></i> Sửa tin</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            
                            <tbody>
                                <tr>
                                    <td class="text-bold">ID</td>
                                    <td>{{ $phongthuy->id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">ngày tạo</td>
                                    <td>{{ $phongthuy->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Hình ảnh</td>
                                    <td>
                                        @if(empty($phongthuy->feature_image))
                                            <img src="{{URL::asset('/images/noimage.png')}}" height="150px">
                                        @else
                                            <img src="{{URL::asset('/images/phongthuy/'.$phongthuy->feature_image)}}" height="150px">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Tiêu đề</td>
                                    <td>{{ $phongthuy->title }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Mô tả</td>
                                    <td>{{ $phongthuy->preview_text }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Nội dung chi tiết</td>
                                    <td>{{ $phongthuy->detail_text }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop