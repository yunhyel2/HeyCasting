@extends('layouts.FormLayout')

@section('content')
    <div class="join-form">
        <nav class="join-nav">
            <ul>
                <li class="active" name="user-account"><a href="#" onclick="return false;">계정 정보 입력</a></li>
                <li name="user-profile"><a href="#" onclick="return false;">프로필 작성</a></li>
            </ul>
        </nav>
        <form method="POST" name="join-form" class="join-form validate" action="{{ url('join-in-user') }}" enctype="multipart/form-data">
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
                            <li><a href="javascript:loginWithKakao()" id="custom-login-btn"><img src="/img/social_kakao.png"/></a></li>
                            <li><div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div></li>
                            <li><a href="#" id="facebook_login"><img src="/img/social_facebook.png" alt="페이스북으로가입하기"/></a></li>
                            <li><a href="#" id="naver_id_login" class="not-ready"><img src="/img/social_naver_line.png"/></a></li>
                        </ul>
                    </div>
                    <script>
                        //구글
                            function onSignIn(googleUser) {
                                // Useful data for your client-side scripts:
                                $('div.g-signin2').on('click', function(){
                                    var profile = googleUser.getBasicProfile();
                                    $('input[name="google_mail"]').val(profile.getEmail());
                                    $('input[type="password"], input[name="user-email"]').attr('disabled', 'disabled');
                                    $('div#user-contents').removeClass('hidden').parent().animate(
                                        { 
                                            left: '-100%'
                                        },{ 
                                            complete:function(){
                                                $('div#user-account').find('input.next').remove();
                                                $('body').css('background', 'url("/img/background/03_back.jpg") no-repeat').css('background-size', 'cover');
                                            }
                                        }
                                    );
                                    $('nav.join-nav').find('li:first-child').removeClass('active').next().addClass('active');
                                    // The ID token you need to pass to your backend:
                                    var id_token = googleUser.getAuthResponse().id_token;
                                    console.log("ID Token: " + id_token);
                                });
                            };
                        //카카오톡
                            // 사용할 앱의 JavaScript 키를 설정해 주세요.
                            Kakao.init('8195484f1954080cea8217c97485a60a');
                            function loginWithKakao(){
                                Kakao.Auth.login({
                                    success: function(authObj) {
                                        // 로그인 성공시, API를 호출합니다.
                                        Kakao.API.request({
                                        url: '/v1/user/me',
                                        success: function(res) {
                                            $('input[name="kakao_id"]').val(res.id);
                                                    $('input[type="password"], input[name="user-email"]').attr('disabled', 'disabled');
                                                    $('div#user-contents').removeClass('hidden').parent().animate(
                                                        { 
                                                            left: '-100%'
                                                        },{ 
                                                            complete:function(){
                                                                $('div#user-account').find('input.next').remove();
                                                                $('body').css('background', 'url("/img/background/03_back.jpg") no-repeat').css('background-size', 'cover');
                                                            }
                                                        }
                                                    );
                                                    $('nav.join-nav').find('li:first-child').removeClass('active').next().addClass('active');
                                        },
                                        fail: function(error) {
                                            alert(JSON.stringify(error));
                                        }
                                        });
                                    },
                                    fail: function(err) {
                                        alert(JSON.stringify(err));
                                    }
                                });
                            }
                    </script>
                </div>
                <div id="user-contents" class="step hidden">
                    <input type="hidden" name="kakao_id" value=""/>
                    <input type="hidden" name="google_mail" value=""/>
                    <input type="hidden" name="facebook_mail" value=""/>
                    <input type="hidden" name="naver_mail" id="naver_mail" value=""/>
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
                            <label for="agree"><a href="#" name="document1">개인정보 취급방침</a>, <a href="#" name="document2">서비스 이용약관</a>, 개인정보 제공에 동의합니다.</label>
                        </div>
                    </div>
                    <div class="group button">
                        <input type="submit" class="submit" value="작성 완료"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="cover hidden"></div>
    <div id="document1" class="docu-wrap hidden">
        <a class="close" href="#">닫기</a>
        <div class="document">
            @include('document.document1')
        </div>
    </div>
    <div id="document2" class="docu-wrap hidden">
        <a class="close" href="#">닫기</a>
        <div class="document">
            @include('document.document2')
        </div>
    </div>
    <script type="text/javascript" src="/jquery.validation.1.15.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/additional-methods.js"></script>
    <script type="text/javascript" src="/jquery.validation.1.15.0/messages_ko.min.js"></script>
    <script type="text/javascript" src="/js/form-script.js"></script>
    <script type="text/javascript" src="/js/quick-join.js"></script>
@endsection