@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))
                    <div class="alert alert-success"><p><strong>{{ Session::get('success') }}</strong></p></div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger"><p><strong>{{ Session::get('fail') }}</strong></p></div>
                @endif
                <div class="clearfix"></div>
                <div class="box box-default">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Nội Thất
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="{{ route('furniture.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered " id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Id</th>
                                    <th class="text-center align-middle">Tiêu đề</th>
                                    <th class="text-center align-middle" width="130px">Tiểu mục</th>
                                    <th class="text-center align-middle" width="150px">Người đăng</th>
                                    <th class="text-center align-middle">Ảnh hiển thị</th>
                                    <th class="text-center align-middle" width="100px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($furnitures) < 1)
                                <td  class="text-center" colspan="8">Chưa có bài viết nào!</td>
                            @else
                            @foreach($furnitures as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $item->id }}</td>
                                    <td class="text-left align-middle">{{ $item->title }}</td>
                                    <td class="text-center align-middle">{{ $item->category }}</td>
                                    <td class="text-center align-middle">{{ $item->fullname }}</td>
                                    <td class="text-center align-middle">
                                        @if(empty($item->image))
                                            <img src="{{URL::asset('/images/noimage.png')}}" height="150px">
                                        @else
                                            <img src="{{URL::asset('/storage/images/'.$item->image)}}" height="150px">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('furniture.destroy',$item->id) }}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class='btn-group'>
                                                <a href="{{ route('furniture.edit',$item->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&#039;Bạn muốn xóa bài viết này?&#039;)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pagination-sm no-margin pull-right">
                            {{ $furnitures->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop