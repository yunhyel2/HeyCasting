@extends('layouts.app')

@section('content')
    <div id="wrap">   
        <h1>프로필 등록하기</h1>
        <div class="button">
            <a href="{{ url('singer/create') }}" class="singer">
                <img src="img/singer.png" alt="">
            </a>
            <a href="{{ url('actor/create') }}" class="actor">
                <img src="img/actor.png" alt="">
            </a>
            <a href="{{ url('player/create') }}" class="player">
                <img src="img/player.png" alt="">
            </a>
            <a href="{{ url('dancer/create') }}" class="dancer">
                <img src="img/dancer.png" alt="">
            </a>
            <a href="{{ url('host/create') }}" class="host">
                <img src="img/host.png" alt="">
            </a>
            <a href="{{ url('model/create') }}" class="model">
                <img src="img/model.png" alt="">
            </a>
        </div><!--//button-->
    </div>
@endsection
