@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="col-md-4 float-left">
				<div class="card">
					<div class="card-header">@lang('common.users')</div>
					<div class="card-body">
						@if(count($allUsers) > 0)
						<ul>
							@foreach($allUsers as $userId => $userName)
							<li><a href="{{ route('private.chat', $userId) }}">{{ $userName }}</a></li>
							@endforeach
						</ul>
						@else
						<p>There no users.</p>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-8 float-right">
				<div class="card">
					<div class="card-header">{{ $chatTitle }}</div>
					<div class="card-body">
						<div id="chat-container">
							@foreach($messages as $message)
							<div class="message-header">
								<b>{{ $message->getSender->name }}</b><em class="float-right">{{$message->created_at}}</em>
							</div>
							<div class="message-body">
								<span>{{ $message->message }}</span>
							</div>
							@endforeach
						</div>
						<form id="private-chat" v-on:submit.prevent="sendMessage()">
							<div class="form-group col-md-10 float-left">
								<textarea  v-model="message" id="chat" class="form-control" rows="2" required=""></textarea>
							</div>
							<div class="text-right col-md-2 float-left">
								<button type="submit" class="btn btn-primary">Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	var sendMessageRoute = "{{ route('general.send.message', $chatRoom) }}";
</script>
@endsection
