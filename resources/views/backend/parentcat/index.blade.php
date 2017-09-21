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
                            Danh mục
                        </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Tên danh mục</th>
                                    <th class="text-center" colspan="3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($parentcats) <1)
                                <td  class="text-center" colspan="2">Danh sách danh mục hiện đang trống!</td>
                            @else
                            @foreach($parentcats as $parentcat)
                                <tr>
                                    <td class="text-center">
                                        <strong>{{ mb_strtoupper($parentcat->name) }}</strong>
                                    </td>
                                    <td class="text-center">

                                         <div class='btn-group'>
                                             <a href="{{ route('parentcats.show',$parentcat->id) }}" class='btn btn-default btn-xs'>
                                                 <i class="glyphicon glyphicon-eye-open"></i>
                                             </a>
                                             <a href="{{ route('parentcats.edit',$parentcat->id) }}" class='btn btn-default btn-xs'>
                                                 <i class="glyphicon glyphicon-edit"></i>
                                             </a>
                                         </div>
                                    </td>
                                </tr>
                               @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pagination-sm no-margin pull-right">
                            {{ $parentcats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop