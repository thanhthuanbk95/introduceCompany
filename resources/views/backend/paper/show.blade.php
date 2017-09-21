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
                            Chi tiết bài viết <span style="color: #9f191f">{{ $paper->name }}</span>
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="{{ route('papers.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            
                            <tbody>
                                <tr>
                                    <td>Tiêu đề</td>
                                    <td>{{ $paper->title }}</td>
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
                                    <td>{!! $paper->describe !!}</td>
                                </tr>
                                <tr>
                                    <td>Người đăng</td>
                                    <td class="text-blue">{{ $paper->user }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td class="text-success">{{ $paper->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Cập nhật gần nhất</td>
                                    <td class="text-danger">{{ $paper->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="list-image">
                            <table class="table">
                                <tr>
                                    <th colspan="2" class="text-center"><h3><span style="color: #337ab7"><i class="fa fa-picture-o" aria-hidden="true"></i> Ảnh bài viết</span></h3></th>
                                </tr>
                            @for($i = 0 ; $i < count($images) ; $i += 2)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('../storage/images/'.$images[$i]->name) }}" alt="{{ $images[$i]->name }}" class="img-thumbnail" width="400px">
                                    </td>
                                    @if($i+1 <count($images))
                                    <td class="text-center">
                                        <img src="{{ asset('../storage/images/'.$images[$i+1]->name) }}" alt="{{ $images[$i+1]->name }}" class="img-thumbnail" width="400px">
                                    </td>
                                    @endif
                                </tr>
                            @endfor
                            </table>
                            <button class="btn btn-warning" type="button" onclick="window.location='{{ url()->previous() }}';" style="margin-left: 5px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop