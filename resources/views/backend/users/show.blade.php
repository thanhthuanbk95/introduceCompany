@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="pull-left">
            Thông tin người dùng
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('users.create') }}">Thêm mới</a>
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
                                    <th class="text-center" colspan="2"><h4>Thông tin người dùng</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mã người dùng</td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td>Tên người dùng</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Họ và tên</td>
                                    <td>{{ $user->fullname }}</td>
                                </tr>
                                <tr>
                                    <td>Cấp bậc</td>
                                    <td>
                                        @if($user->level == 2)
                                            Super Admin
                                        @elseif($user->level == 1)
                                            Admin
                                        @else
                                            User
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td class="text-success">{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Cập nhật gần nhất</td>
                                    <td class="text-danger">{{ $user->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td>Ảnh đại diện</td>
                                    <td><img src="{{ url("storage/avatars/$user->avatar") }}" width="200px"></td>
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