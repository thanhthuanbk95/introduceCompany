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
                            Bài viết
                        </h3>
                        <div class="pull-right" style="margin: 0px 10px;">
                            <a class="btn btn-success pull-right" href="{{ route('createPaper',$idParent) }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Tiêu đề bài viết</th>
                                    <th class="text-center">Người đăng</th>
                                    <th class="text-center">Tiểu mục</th>
                                    <th class="text-center">Danh mục</th>
                                    <th class="text-center">Số lượng ảnh</th>
                                    <th class="text-center" colspan="3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($papers) < 1)
                                <td  class="text-center" colspan="8">Chưa có bài viết nào!</td>
                            @else
                            @foreach($papers as $paper)
                                <tr>
                                    <td class="text-center">{{ $paper->title }}</td>
                                    <td class="text-center">{{ $paper->fullname }}</td>
                                    <td class="text-center">{{ $paper->category }}</td>
                                    <td class="text-center">{{ $paper->parent_cat }}</td>
                                    <td class="text-center">{{ $paper->images }}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('papers.destroy',$paper->id) }}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class='btn-group'>
                                                <a href="{{ route('papers.show',$paper->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="{{ route('papers.edit',$paper->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&#039;Nếu bạn xóa bài viết này\nTất cả các hình ảnh của bài viết này sẽ bị xóa theo!\n\tBạn muốn xóa?&#039;)">
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
                            {{ $papers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop