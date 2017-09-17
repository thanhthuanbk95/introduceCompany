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
                            Danh sách liên hệ
                        </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-responsive table-bordered" id="tours-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">email</th>
                                    <th class="text-center">Số diện thoại</th>
                                    <th class="text-center" width="150px">Ngày gửi</th>
                                    <th class="text-center" width="110px">Tình trạng</th>
                                    <th class="text-center" width="100px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($contacts) < 1)
                                <td  class="text-center" colspan="8">Chưa có liên hệ nào!</td>
                            @else
                            @foreach($contacts as $item)
                                <tr>
                                    <td class="text-center">{{ $item->fullname }}</td>
                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">{{$item->created_at}}</td>
                                    <td class="text-center">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div class="reply">
                                        @if($item->reply == "Chưa trả lời")
                                        <a href="javascript:void(0)" onclick="replyContact({{$item->id}});" style="font-weight: bold; color: red;">{{$item->reply}}</a>
                                        @else
                                        <span style="font-weight: bold; color: green;">Đã trả lời</span>
                                        @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('adcontact.destroy',$item->id) }}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <div class='btn-group'>
                                                <a href="{{ route('adcontact.show',$item->id) }}" class='btn btn-default btn-xs'>
                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&#039;Bạn muốn xóa liên hệ này?&#039;)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pagination-sm no-margin pull-right">
                            {{ $contacts->links() }}
                        </div>
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
                        $('.reply').html('<span style=\"font-weight: bold; color: green;\">Đã trả lời</span>');
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