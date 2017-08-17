@extends('frontend.layouts.master')

@section('content')

<div class="ms-body">
	<div class="listview lv-message">
		@widget('MessageRoom', ['id' => $room->id], $room->id)
		<div class="lv-body">
			<div class="row content-chat-video">
				@if($isJoin == 1)
			        
				<div class="col-md-7">
					<div class="show-video" id="ms-scrollbar" style="overflow:scroll; overflow-x: hidden; height:80vh;">
						<div class="content-video">
							@if(count($listFile) == 0)
								<div style="font-size: 350px; color: #cccccc; text-align: center;">
									<a href="#" data-toggle="modal" data-target="#myModalUpload" title="Upload Media" style="color: #f0f0f0">
										<i class="fa fa-upload" aria-hidden="true"></i>
									</a>
							    </div>
							@else

								<video width="100%" controls class="video-play" id="myVideo">
									<source src="{{ asset('storage/media/' . $listFile[0]->name) }}" type="video/mp4">
									Your browser does not support HTML5 video.
								</video>
								<h4 class="text-center title-video">{{ $listFile[0]->title }}</h4>
							@endif
						</div>
						<div class="list-video">

							<ul class="show-list-video" style="list-style: none;">
								@foreach ($listFile as $key => $file)
									
								<li class="" id="{{ $file->id }}">
									<a href="javascript:void(0)" class="change-video" >
										<i class="fa {{ ($file->type=='video') ?'fa-play-circle-o':'fa-volume-up' }}" aria-hidden="true"></i><span class="video-id hidden">
											{{ $file->id }}
										</span>
										<span class="titleVideo">
											{{ str_limit($file->title, 40) }}
										</span>
									</a>
									<em>- {{ str_limit($file->user->fullname, 20) }}</em>
									@if($file->user_id == Auth::id() || $room->user_id == Auth::id())
										<a href="{{ route('frontend.message.deletefile', $file->id) }}" onclick="event.preventDefault(); document.getElementById('deletefile-form-{{ $file->id }}').submit();" style="text-decoration: none;">
											<span class="glyphicon glyphicon-trash"></span>
										</a>

										<form id="deletefile-form-{{ $file->id }}" action="{{ route('frontend.message.deletefile', $file->id) }}" method="POST" style="display: none;">
							                {{ csrf_field() }}
							                <input type="hidden" name="_method" value="DELETE">
							            </form>
									@endif
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-5 div-chat">
					<div id="ms-scrollbar" style="overflow:scroll; overflow-x: hidden; height:72vh;" class="room-contentt" onmouseenter="return deleteNotifRoom({{ $room->id }},{{ Auth::user() }})">
						@if($messages->count()>0)
							@foreach($messages as $message)
								@if($message->status == 0)
									<div style="padding-left: 30px;">	
										<h6>
											<em style="color: #cccccc;">
												{!! $message->content !!}
											</em>
										</h6>
									</div>
								@else
									<div class="lv-item media @if($message->user_id == Auth::id()) right @else left @endif">
										<div class="lv-avatar @if($message->user_id == Auth::id()) pull-right @else pull-left @endif">
											<img src="{{ url('../storage/avatars/',$message->avatar) }}" alt="">
										</div>
										<div class="media-body">
											<div class="ms-item">
												{!! $message->content !!}
											</div>
											<small class="ms-date">
												@if($message->name != Auth::user()->name)
													<a href="{{ route('private.user', $message->name) }}">
														<strong style="font-size: 10px">{{ $message->fullname }}</strong>
													</a>
													@if($message->user_id == $room->user_id)
														- <strong style="color: red;font-size: 10px">[AD]</strong>
													@endif
												@endif
												<span class="glyphicon glyphicon-time"></span>
												&nbsp; 
												{{ date('d-m-Y', strtotime($message->created_at)) }} at {{ date('H:i:s', strtotime($message->created_at)) }}
											</small>
										</div>
									</div>
								@endif
							@endforeach
						@endif
					</div>
					<div class="clearfix"></div>
					@widget('EmotionChat')

					<div class="add-photo">
                        <form method="POST" enctype="multipart/form-data" action="javascript:void(0)" id="form-add-photo">
                            {{ csrf_field() }}
                            <label for="upload-file-selector">
                                <span class="bton">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                    <input id="upload-file-selector" name="sendPicture" type="file" onchange="uploadPhoto()">
                                </span>
                            </label>
                        </form>
                    </div>

					<div class="lv-footer ms-reply">
						<textarea rows="10" placeholder="Write messages..." id="mess-content" onclick="return deleteNotifRoom({{ $room->id }},{{ Auth::user() }})"></textarea>
						<button class="" id="btn-room-reply">
							<span class="glyphicon glyphicon-send"></span>
						</button>
					</div>
				</div>
				@else
				<div class="col-md-12">
					<div class="show-video" id="ms-scrollbar" style="overflow:scroll; overflow-x: hidden; height:530px;">
	                    <div class="border text-center">
	                        <a href="{{ route('frontend.room.join', $room->id) }}" style="font-size: 340px; color: #cccccc;">
	                            <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
	                        </a>
	                        <h5><a id="join" href="{{ route('frontend.room.join', $room->id) }}" >CLICK HERE TO JOIN THIS ROOM</a></h5>
	                    </div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('script2')
<script type="text/javascript">
	var currentRoom = {!!json_encode($room)!!};
	var isJoin = {!!json_encode($isJoin)!!};
</script>
@endsection

@section('endscript')
<script>
    function uploadPhoto(){
        var fakePath = $('#upload-file-selector').val();
        var arr_path = fakePath.split('/');
        var filename = arr_path[arr_path.length - 1];
        var filename = filename.split('.');
        var type = filename[filename.length - 1];
        if(type == 'jpg' || type == 'png' || type == 'jpeg' || type =='gif'){
            $('#form-add-photo').submit();
		}else{
            alert('khong dung dinh dang');
		}
    }

    $(document).on('submit','#form-add-photo', function (e){
        var token = $("input[name='_token']").val();
        var form = $(this);
        var formdata = false;
        if(window.FormData){
            formdata = new FormData(form[0]);
		}
        $.ajax({
		url: "{{ route('frontend.room.sendPictureMsg',$room->id) }}",
		type: 'POST',
		data: formdata,
		success: function(data){
            var mydate = new Date(data.created_at);

            var dateFormat = mydate.getDate() + '-' + mydate.getMonth() + '-' + mydate.getFullYear() + ' at ' +
                mydate.getHours() + ":" + mydate.getMinutes() + ":" + mydate.getSeconds();


            var stringDivData = ' <div class="lv-item media right"> '+' <div class="lv-avatar pull-right"> '
                +' <img src="../../storage/avatars/'+ data.avatar +'" alt=""> '
                +' </div> '+' <div class="media-body"> '+' <div class="ms-item"> '+data.content+' </div> '+' <small class="ms-date"> '
                +' <span class="glyphicon glyphicon-time"> '+' </span> '+' &nbsp; ' +dateFormat
                +' </small> '+' </div> '+' </div> ';
            $('.room-contentt').append(stringDivData);
            if($('.room-contentt').length){
                scroll('.room-contentt');
            }
			socket.emit('send action','video',currentRoom,data,'upload image');
		},
		error: function (){
		},
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false,
		});
        return false;
    });

    index = 10;
    scroll('.room-contentt');
	@if($isJoin == 1)
    $('#mess-content').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == 13) {
			$('#btn-room-reply').click();
            $('#mess-content').val('');
        }
    });

    function changeVideo(id){
    	$.ajax({
			url: "{{ route('frontend.room.changeVideo', $room->id) }}",
			type: 'POST',
			cache: false,
			data: {
				file_id: id,
			},
			success: function(data){
				
				var video = $('#myVideo')[0];
				$("#myVideo source").attr("src",data);
				video.load();
				socket.emit('send action','video',currentRoom,[data, $('.title-video').html()],'load');
 			},
			error: function (){
			}
		});
    }
    $('.change-video').click(function(){
		var id = $(this).find('.video-id').html();
		var titleVideo = $(this).find('.titleVideo').html();
		$('.title-video').html(titleVideo);	
    	changeVideo(id);
    });

    $('#myVideo').bind('play', function () {
   		//whatever you want to do
   		socket.emit('send action','video',currentRoom,null,'play');
	});
	$('#myVideo').bind('pause', function () {
   		//whatever you want to do
   		socket.emit('send action','video',currentRoom,null,'pause');
	});
	
    socket.on('receiver action',function(type,room,action,data){
    	var vid = $('#myVideo')[0];
    	if(currentRoom.id == room.id){
    		if( action == 'load'){
				$("#myVideo source").attr("src",data[0]);
				$('.title-video').html(data[1]);	
				vid.load();
	    	} else if ( action == 'play') {
	    		vid.play();
	    	} else if ( action == "pause") {
	    		vid.pause();
	    	} else if ( action == "uploaded") {
	    		//add video div if list file is empty
	    		var count = {!!count($listFile)!!};
	    		if(count == 0){
	    			// $(".content-video").html('<video width="100%" controls class="video-play" id="myVideo"> <source src="" type="video/mp4"> Your browser does not support HTML5 video. </video>')
	    			window.location = "http://localhost:8000/message/room/"+currentRoom.id;
	    		}
	    		//add message
       			$('.room-contentt').append('<div style="padding-left: 30px;">'
                            +'<h6>'+'<em style="color: #cccccc;">'+data[3]+'</em>'+'<h6>'+'</div>');
	    		//add to video list
	    		var videoDiv = '<li class=""> <a href="javascript:void(0)" class="change-video"> <i class="fa fa-play-circle-o" aria-hidden="true"></i><span class="video-id hidden">'+ data[0] + '</span> <span>'+ data[1] + '</span> </a> <em>- '+ data[4] +'</em> </li>';
	    		$('.title-video').html(data[1]);
	    		$('.show-list-video').append(function(){
	    			return $(videoDiv).click(function(){
	    				changeVideo(data[0]);
	    			});
	    		});

	    	} else if ( action == 'file-deleted'){
	    		//add delete message
       			$('.room-contentt').append('<div style="padding-left: 30px;">'+'<h6>'+'<em style="color: #cccccc;">'+data[3]+'</em>'+'<h6>'+'</div>'); 
       			//remove li
       			var li = '#'+data[0]; 
       			$(li).remove();
       		} else if( action == 'IconAction'){
       			//haha
       			console.log(data);
                var haha = new Audio();
                haha.src = '/audio/hahaha.mp3';
                haha.play();
       		} else if( action == 'upload image'){
       			console.log(data);
                var mydate = new Date(data.created_at);

                var dateFormat = mydate.getDate() + '-' + mydate.getMonth() + '-' + mydate.getFullYear() + ' at ' +
                    mydate.getHours() + ":" + mydate.getMinutes() + ":" + mydate.getSeconds();

                var stringDivData = ' <div class="lv-item media left"> '+' <div class="lv-avatar pull-left"> '
                    +' <img src="../../storage/avatars/'+data.avatar +'" alt=""> '
                    +' </div> '+' <div class="media-body"> '+' <div class="ms-item"> '+data.content+' </div> '+' <small class="ms-date"> '
                    +'<a href="/chat/'+ data.username +'"><strong style="font-size: 10px">'+data.fullname+'</strong></a>';

                if(data.room_userid == data.user_id){
                    stringDivData = stringDivData + '- <strong style="color: red;font-size: 10px">[AD]</strong>';
                }

                stringDivData = stringDivData + ' <span class="glyphicon glyphicon-time"> '+' </span> '+' &nbsp; ' +dateFormat
                    +' </small></div></div> ';

                $('.room-contentt').append(stringDivData);
                if($('.room-contentt').length){
                    scroll('.room-contentt');
                }
       		}
    	}
    });

    function deleteNotifRoom(roomid,userid) {
        $.ajax({
            url : "{{ route('deleteNotifRoom') }}",
            type : "post",
            dataType:"text",
            data : {
                'roomid' : roomid,
                'userid' : userid
            },
            success : function (result){
            },error: function (){
            }
        });
    }
    @endif
	$(function(){
        $('.room-contentt').scroll(function(){
            var distance = $('.room-contentt').scrollTop();
            if(distance == 0){
                $.ajax({
                    url : "{{ route('getmoreMsgRoom') }}",
                    type : "post",
                    dataType:"text",
                    data : {
                        'roomid' : {{ $room->id  }},
                        'offset': index
                    },
                    success : function (result){
                        if(result != 0){
                    		
                            $('.room-contentt').prepend(result);
                            distance = $('.room-contentt').scrollTop(500);
						}
                    },error: function (){
                    }
                });
                index = index + 10;
            }
        });
    });
    @if(Session::has('fileUpload'))
		var str = "{!!Session::get('fileUpload') !!}";
		var fileInfor = str.split("|");
		//send to other that file is uploaded
		socket.emit('send room message','file uploaded',currentRoom,fileInfor);
    @endif
    @if(Session::has('fileDelete'))
    	var str = "{!!Session::get('fileDelete')!!}";
    	var fileInfor = str.split("|");
    	socket.emit('send room message','file deleted',currentRoom,fileInfor);
    @endif

    $('#hahaIco').click(function(){
        var haha = new Audio();
        haha.src = '/audio/hahaha.mp3';
        haha.play();
    	socket.emit('send action','Icon',currentRoom,'haha','IconAction');
    })
</script>

@if($isJoin == 1)
<script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/validate.js') }}" type="text/javascript"></script>

@endif
@endsection

@if(Session::has('success'))
    @section('scriptAlert')
    <script type="text/javascript">
        notes.show("{{ Session::get('success') }}", {
            type: 'success',
            title: 'Success',
            icon: '<i class="icon icon-check-sign"></i>'
        });
    </script>
    @endsection
@endif

@if(Session::has('danger'))
    @section('scriptAlert')
    <script type="text/javascript">
        notes.show("{{ Session::get('danger') }}", {
            type: 'danger',
            title: 'Error',
            icon: '<i class="icon icon-exclamation-sign"></i>'
        });
    </script>
    @endsection
@endif