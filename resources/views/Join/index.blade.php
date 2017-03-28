@extends('layouts.app')

@section('content')
    <div class="join-form">
        <form method="POST" name="join-form" class="join-form" action="{{ url('join') }}" enctype="multipart/form-data">
            <nav class="join-nav">
                <ul>
                    <li class="active"><a href="#">계정 정보 입력</a></li>
                    <li><a href="#">컨텐츠 첨부</a></li>
                    <li><a href="#user-profile">프로필 작성</a></li>
                </ul>
            </nav>
            <div id="user-account">
                <div class="group">
                    <h2>일반 회원가입</h2>
                    <div class="form-group">
                        <label for="user-email" class="icon"><img src="/img/icon_mail_address.png" alt="" width="20px" height="auto"/></label>
                        <input type="text" name="user-email" id="user-email" placeholder="이메일을 입력하세요"/>
                    </div>
                    <div class="form-group">
                        <label for="user-nickname" class="icon"><img src="/img/icon_nickname.png" alt="" width="auto" height="20px"/></label>
                        <input type="text" name="user-nickname" id="user-nickname" placeholder="닉네임을 입력하세요"/>
                    </div>
                    <div class="form-group">
                        <label for="password" class="icon"><img src="/img/icon_password.png" alt="" width="auto" height="20px"/></label>
                        <input type="password" name="password" id="password" placeholder="비밀번호를 입력하세요"/>
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation" class="icon"><img src="/img/icon_password.png" alt="" width="auto" height="20px"/></label>
                        <input type="password" name="password-confirmation" id="password-confirmation" placeholder="비밀번호를 한번 더 입력하세요"/>
                    </div>
                </div>
                <div class="group button">
                    <input type="submit" class="next" value="다음"/>
                </div>
                <div class="group quick-join">
                    <h2>간편 회원가입</h2>
                    <ul>
                        <li><a href="#"><img src="/img/social_kakao.png" alt="카카오톡으로가입하기"/></a></li>
                        <li><a href="#"><img src="/img/social_google.png" alt="구글로가입하기"/></a></li>
                        <li><a href="#"><img src="/img/social_facebook.png" alt="페이스북으로가입하기"/></a></li>
                        <li><a href="#"><img src="/img/social_naver_line.png" alt="라인으로가입하기"/></a></li>
                    </ul>
                </div>
            </div>
            <div id="user-contents">
                
            </div>
        </form>
    </div>
@endsection