@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left">
            Users
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('users.create') }}">Add New</a>
        </h1>
    </section>

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
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Fullname</th>
                                    <th>Level</th>
                                    <th class="text-center" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>sdfsdfsdf</td>
                                    <td>sdfsdfsdf</td>
                                    <td>sdfsdfsdf</td>
                                    <td>sdfsdfsdf</td>
                                    <td>sdfsdfsdf</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@stop