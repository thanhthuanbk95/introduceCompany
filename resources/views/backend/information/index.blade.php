@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật thông tin
        </h1>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('inforUpdate') }}" accept-charset="UTF-8" id="information">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="name">Tên công ty</label>
                                <input class="form-control" name="name" type="text" id="name" value="{{ $information->name }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="address">Địa chỉ</label>
                                <input class="form-control" name="address" type="text" id="address" value="{{ $information->address }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" name="phone" type="text" id="phone" value="{{ $information->phone }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" type="text" id="email" value="{{ $information->email }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="facebook">Facebook</label>
                                <input class="form-control" name="facebook" type="text" id="facebook" value="{{ $information->facebook }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="google">Google</label>
                                <input class="form-control" name="google" type="text" id="google" value="{{ $information->google }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="pinterest">Pinterest</label>
                                <input class="form-control" name="pinterest" type="text" id="pinterest" value="{{ $information->pinterest }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="twitter">Twitter</label>
                                <input class="form-control" name="twitter" type="text" id="twitter" value="{{ $information->twitter }}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">
                                <input class="btn btn-primary" type="submit" value="Lưu">
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