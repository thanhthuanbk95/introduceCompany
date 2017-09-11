<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Trang chủ
    </h1>
</section>

<section class="content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-database" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">DANH MỤC</a></span>
                    <span class="info-box-number"><?php echo e($parent_count); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file-code-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">TIỂU MỤC</a></span>
                    <span class="info-box-number"><?php echo e($cat_count); ?></span>
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
                <span class="info-box-icon bg-green"><i class="fa fa-newspaper-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">BÀI VIẾT</a></span>
                    <span class="info-box-number"><?php echo e($paper_count); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><a href="">NGƯỜI DÙNG</a></span>
                    <span class="info-box-number"><?php echo e($user_count); ?></span>
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
                    <h3 class="box-title">Người dùng</h3>

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
                    	<?php for($i=1;$i<4;$i++): ?>
                        <li>
                            <img src="<?php echo e(url("storage/avatars/avatar.png")); ?>" alt="User Image">
                            <a class="users-list-name" >Nguyen Manh Linh</a>
                            <span class="users-list-date">linhnm</span>
                        </li>
                    	<?php endfor; ?>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="<?php echo e(route('users.index')); ?>" class="uppercase">Show all</a>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- ChartJS 1.0.1 -->
<script src="<?php echo e(asset('admin/js/Chart.min.js')); ?>"></script>
    <script>
        $(function() {
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = [

                {
                    value: <?php echo e($countUsers); ?>,
                    color: "red",
                    highlight: "red",
                    label: "User"
                },
                {
                    value: <?php echo e($countAdmins); ?>,
                    color: "green",
                    highlight: "green",
                    label: "Admin"
                },
                {
                    value: <?php echo e($countSuperAdmins); ?>,
                    color: "yellow",
                    highlight: "yellow",
                    label: "Super Admin"
                },



            ];
            var pieOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 50,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true,
                maintainAspectRatio: true,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        pieChart.Doughnut(PieData, pieOptions);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>