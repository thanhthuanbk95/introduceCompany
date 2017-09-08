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
                    <form method="POST" action="" accept-charset="UTF-8" id="room">
                        <!-- {{ csrf_field() }} -->
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <!-- Name Field -->
                            <div class="col-sm-12">
                                <label for="intro">Giới thiệu về Công ty</label>
                                <textarea class="form-control" name="intro" id="intro" rows="4" cols="20"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <!-- Submit Field -->
                            <div class="col-sm-12">

                                <input class="btn btn-primary" type="submit" value="Save">
                                <a href="{{ route('parentcats.index')}}" class="btn btn-default">Cancel</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php phpinfo(); ?>

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