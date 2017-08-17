@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Home
    </h1>
</section>

<section class="content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-folder-o" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">Rooms</a></span>
                    <span class="info-box-number">2</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">File</a></span>
                    <span class="info-box-number">3</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">Users</a></span>
                    <span class="info-box-number">5</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-smile-o" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">Emotions</a></span>
                    <span class="info-box-number">4</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <!-- Chat box -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">User</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        	<i class="fa fa-minus"></i>
            			</button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                        	<i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="150"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="fa fa-circle-o text-red"></i> User</li>
                                <li><i class="fa fa-circle-o text-green"></i> Admin</li>
                                <li><i class="fa fa-circle-o text-yellow"></i> Super Admin</li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.box -->

            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User register recent</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                    	@for($i=1;$i<4;$i++)
                        <li>
                            <img src="{{ url("storage/avatars/avatar.png") }}" alt="User Image">
                            <a class="users-list-name" >Nguyen Manh Linh</a>
                            <span class="users-list-date">linhnm</span>
                        </li>
                    	@endfor
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ route('users.index') }}" class="uppercase">Show all</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <!-- Map box -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">The biggest rooms</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Count of member</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                	<tr>
                                        <td>asdasdasd</td>
                                        <td>12</td>
                                        <td>asdasdasdasd</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="" class="btn btn-sm btn-info btn-flat pull-left">Create room</a>
                    <a href="" class="btn btn-sm btn-default btn-flat pull-right">Show all rooms</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</section>
<!-- /.content -->
</div>

@stop

@section('script')
    <!-- ChartJS 1.0.1 -->
<script src="{{ asset('admin/js/Chart.min.js') }}"></script>
@endsection