@extends('backend.layouts.master')
@section('content')

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
                                    <td>{{ $contact->id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Họ tên</td>
                                    <td>{{ $contact->fullname }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Email</td>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Số điện thoại</td>
                                    <td>{{ $contact->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Nội dung</td>
                                    <td>{{ $contact->content }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Ngày gửi</td>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Tình trạng</td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div class="reply">
                                        @if($contact->reply == "Chưa trả lời")
                                        <a href="javascript:void(0)" onclick="replyContact({{$contact->id}});" style="font-weight: bold; color: red;">{{$contact->reply}}</a>
                                        @else
                                        <span style="font-weight: bold; color: green;">Đã trả lời</span>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Thời gian trả lời</td>
                                    <td>{{ $contact->reply_time }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Người trả lời</td>
                                    <td>{{ $contact->user }}</td>
                                </tr>   
                            </tbody>
                        </table>
                        <br>
                        <button class="btn btn-warning" type="button" onclick="window.location='{{ route('adcontact.index') }}';" style="margin-top: 15px;"><i class="glyphicon glyphicon-remove"></i> Trở về</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function replyContact(id){
            if(confirm("Bạn đã trả lời liên hệ này?")){
                $.ajax({
                    url: "{{ route('replyContact') }}",
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

@stop