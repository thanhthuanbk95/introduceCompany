@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cập nhật thông tin
        </h1>
    </section>

    <section class="content">
        @if(Session::has('success'))
                    <div class="alert alert-success"><p><strong>{{ Session::get('success') }}</strong></p></div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger"><p><strong>{{ Session::get('fail') }}</strong></p></div>
                @endif
                <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('introUpdate') }}" accept-charset="UTF-8" id="introForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="intro">Giới thiệu về Công ty</label>
                                <textarea class="form-control" name="detail" id="intro" rows="4" cols="20">{{ $introduces->detail }}</textarea>
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

    <script>
        CKEDITOR.replace('intro', {
        filebrowserBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html') }}",
        filebrowserImageBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html?type=Images') }}",
        filebrowserFlashBrowseUrl: "{{ asset('admin/js/ckfinder/ckfinder.html?type=Flash') }}",
        filebrowserUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
        filebrowserImageUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
        filebrowserFlashUploadUrl: "{{ asset('admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
    });
    </script>

</div>

@stop