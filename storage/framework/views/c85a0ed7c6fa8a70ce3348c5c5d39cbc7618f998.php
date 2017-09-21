<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix"></div>
                <div class="box box-default">
                    <div class="box-header" style="background-color: #f4f4f4; ">
                        <h3 class="pull-left" style="margin: 4px 5px 0px 5px;">
                            Chi tiết liên hệ
                        </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="contact-table">
                            
                            <tbody>
                                <tr>
                                    <td class="text-bold">ID</td>
                                    <td><?php echo e($contact->id); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Họ tên</td>
                                    <td><?php echo e($contact->fullname); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Email</td>
                                    <td><?php echo e($contact->email); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Số điện thoại</td>
                                    <td><?php echo e($contact->phone); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Nội dung</td>
                                    <td><?php echo e($contact->content); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Ngày gửi</td>
                                    <td><?php echo e($contact->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Tình trạng</td>
                                    <td>
                                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                        <div class="reply">
                                        <?php if($contact->reply == "Chưa trả lời"): ?>
                                        <a href="javascript:void(0)" onclick="replyContact(<?php echo e($contact->id); ?>);" style="font-weight: bold; color: red;"><?php echo e($contact->reply); ?></a>
                                        <?php else: ?>
                                        <span style="font-weight: bold; color: green;">Đã trả lời</span>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Thời gian trả lời</td>
                                    <td><?php echo e($contact->reply_time); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Người trả lời</td>
                                    <td><?php echo e($contact->user); ?></td>
                                </tr>   
                            </tbody>
                        </table>
                        <br>
                        <button class="btn btn-warning" type="button" onclick="window.location='<?php echo e(route('adcontact.index')); ?>';" style="margin-top: 15px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function replyContact(id){
            if(confirm("Bạn đã trả lời liên hệ này?")){
                $.ajax({
                    url: "<?php echo e(route('replyContact')); ?>",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'post',
                    cache: false,
                    data: {
                        'id': id
                    },
                    success: function (data) {
                        location.reload();
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        }
    </script>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>