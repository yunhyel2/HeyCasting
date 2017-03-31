@extends('layouts.app')

@section('content')
    <div class="join-form">
        <nav class="join-nav">
            <ul>
                <li class="active" name="user-account"><a href="#" onclick="return false;">계정 정보 입력</a></li>
                <li name="user-profile"><a href="#" onclick="return false;">프로필 작성</a></li>
            </ul>
        </nav>
        <form method="POST" name="join-form" class="join-form validate" action="{{ url('join-in') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="step-wrap">
                <div id="user-account" class="step">
                    <div class="group">
                        <h2>일반 회원가입</h2>
                        <div class="form-group">
                            <label for="user-email" class="icon"><img src="/img/icon_mail_address.png" alt="" width="20px" height="auto"/></label>
                            <input type="email" name="user-email" id="user-email" class="required email" placeholder="이메일을 입력하세요" autocomplete="Off"/>
                        </div>
                        <!---
                        <div class="form-group">
                            <label for="user-nickname" class="icon"><img src="/img/icon_nickname.png" alt="" width="auto" height="20px"/></label>
                            <input type="text" name="user-nickname" id="user-nickname" class="required" placeholder="닉네임을 입력하세요"/>
                        </div>
                        -->
                        <div class="form-group">
                            <label for="password" class="icon"><img src="/img/icon_password.png" alt="" width="auto" height="20px"/></label>
                            <input type="password" name="password" id="password" class="required" placeholder="비밀번호를 입력하세요"/>
                        </div>
                        <div class="form-group">
                            <label for="password-confirmation" class="icon"><img src="/img/icon_password.png" alt="" width="auto" height="20px"/></label>
                            <input type="password" name="passwordConf" id="passwordConf" class="required" placeholder="비밀번호를 한번 더 입력하세요"/>
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
                            <li><a href="#"><img src="/img/social_naver_line.png" alt="네이버로가입하기"/></a></li>
                        </ul>
                    </div>
                </div>
                <div id="user-contents" class="step hidden">
                    <div class="group">
                        <div class="form-group">
                            <label for="user_name" class="title">연락처 입력</label>
                            <p class="explanation">이름과 연락처는 캐스팅 진행시 필요한 정보입니다. 정확히 입력해주세요.</p>
                            <input type="text" id="user_name" name="user_name" class="required no-pad" placeholder="이름을 입력하세요" autocomplete="Off"/>
                            <input type="text" id="user_phone" name="user_phone" class="required no-pad digits" placeholder="연락처를 입력하세요." autocomplete="Off"/>
                        </div>
                    </div>
                    <div class="group agree">
                        <div class="form-group">
                            <input type="checkbox" name="agree" id="agree" class="required dont-show"/>
                            <label for="agree"><a href="#">개인정보 취급방침</a>, <a href="#">서비스 이용약관</a>, 개인정보 제공에 동의합니다.</label>
                        </div>
                    </div>
                    <div class="group button">
                        <input type="submit" class="submit" value="작성 완료"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/jquery.validation.1.15.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/additional-methods.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/messages_ko.min.js"></script>
    <script type="text/javascript" src="/js/form-script.js"></script>
@endsection