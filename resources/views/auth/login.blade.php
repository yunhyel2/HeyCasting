@extends('layouts.mainMenu')

@section('content')
<div class="section-wrap form">
    <div class="section form">
        <h2>로그인</h2>
        <div class="group">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">이메일</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">비밀번호</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember" class="dont-show"> 
                    <label for="remember">로그인 기억</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        로그인
                    </button>
                </div>
                <a class="forgot" href="{{ url('/password/reset') }}">비밀번호를 잊으셨습니까?</a>
            </form>
        </div>
    </div>
</div>
@endsection
