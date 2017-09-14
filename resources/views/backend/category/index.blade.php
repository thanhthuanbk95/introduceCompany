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
                <div class="box box-deault">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                            <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                                Tiểu mục
                            </h3>
                            <div class="pull-right" style="margin: 0px 10px;">
                                <a class="btn btn-success pull-right" href="{{ route('categories.create') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Tên tiểu mục</th>
                                    <th class="text-center">Thuộc danh mục</th>
                                    <th class="text-center" colspan="3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($categories) < 1)
                                <td  class="text-center" colspan="2">Danh sách tiểu mục hiện đang trống!</td>
                            @else
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->name }}</td>
                                    <td class="text-center">{{ $category->parent_name }}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('categories.destroy',$category->id) }}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class='btn-group'>
                                                <a href="{{ route('categories.show',$category->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <a href="{{ route('categories.edit',$category->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&#039;Bạn muốn xóa tiểu mục này?&#039;)">
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
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop