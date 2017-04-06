@extends('layouts.FormLayout')

@section('content')
    <div class="join-form">
        <form name="join-form" class="complete">
            <div class="complete-wrap">
                <h2 class="logo"><img src="/img/logo2.png" alt="헤이캐스팅"/></h2>
                <p>{{ $user }} 회원 가입이 완료되었습니다</p>
                <a href="{{ url('/') }}" class="button">메인으로 가기</a>
                <a href="{{ $user == '엔터테이너' ? '/enter-join' : '/user-join' }}" class="button">{{ $user }} 회원 가입하기</a>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/js/form-script.js"></script>
@endsection