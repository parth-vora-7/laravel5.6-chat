@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    You are logged in!
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">@lang('common.general_chat')</div>
                <div class="card-body">
                    <a href="{{ route('general.chat') }}">@lang('common.general_chat')</a>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">@lang('common.group_chat')</div>
                <div class="card-body">
                    <a href="{{ route('group.chat') }}">@lang('common.group_chat')</a>
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">@lang('common.private_chat')</div>
                <div class="card-body">
                    @if($users->count())
                    <ul>
                        @foreach($users as $userId => $userName)
                        <li><a href="{{ route('private.chat', $userId) }}">{{ $userName }}</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p>There no users.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
