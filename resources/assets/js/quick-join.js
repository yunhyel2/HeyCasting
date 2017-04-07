//카카오톡
    // 사용할 앱의 JavaScript 키를 설정해 주세요.
    Kakao.init('8195484f1954080cea8217c97485a60a');
    function getKakaotalkUserProfile(){
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
                console.log(error);
            }
        });
    }
    function loginWithKakao() {
        // 로그인 창을 띄웁니다.
        $('a#custom-login-btn').click(function(){
            Kakao.Auth.login({
                persistAccessToken: true,
                persistRefreshToken: true,
                success: function(authObj) {
                    getKakaotalkUserProfile();
                },
                fail: function(err) {
                    alert(JSON.stringify(err));
                }
            });
        });
    };

//구글
    function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        $('div.g-signin2').on('click', function(){
            var profile = googleUser.getBasicProfile();
            console.log(profile);
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

//페이스북
    function getUserData() {
        FB.api('/me', function(response) {
            document.getElementById('response').innerHTML = 'Hello ' + response.name;
        });
    }
    
    window.fbAsyncInit = function() {
        //SDK loaded, initialize it
        FB.init({
            appId      : '1051232541675265',
            xfbml      : true,
            version    : 'v2.2'
        });
    
        //check user session and refresh it
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                //user is authorized
                
            } else {
                //user is not authorized
            }
        });
    };
    
    //load the JavaScript SDK
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.com/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    //add event listener to login button
    document.getElementById('facebook_login').addEventListener('click', function() {
        //do the login
        FB.login(function(response) {
            if (response.authResponse) {
                //user just authorized your app
                FB.api('/me', {fields: 'email'}, function(response) {
                    $('input[name="facebook_mail"]').val(response.email);
                });
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
            }
        }, {scope: 'email,public_profile', return_scopes: true});
    }, false);

//네이버
    var naver_id_login = new naver_id_login("XMud2Vx5LvxAfLRpcb8F", "http://www.heycasting.com/enter-join");
                        
    var state = naver_id_login.getUniqState();
    naver_id_login.setButton("green", 1, 50);
    naver_id_login.setDomain("www.heycasting.com/enter-join");
    naver_id_login.setState(state);
    naver_id_login.setPopup();
    naver_id_login.init_naver_id_login();

    //statusChangeCallback
    function naverSignInCallback(e) {
        // naver_id_login.getProfileData('프로필항목명');
        // 프로필 항목은 개발가이드를 참고하시기 바랍니다.
        e.preventDefault();
        window.opener.document.getElementById('naver_mail').value = naver_id_login.getProfileData('email');
        window.opener.document.getElementById('user-email').disabled = true;
        window.opener.document.getElementById('password').disabled = true;
        window.opener.document.getElementById('passwordConf').disabled = true;
        var user_contents = window.opener.document.getElementById('user-contents');
        var joinNav = window.opener.document.getElementsByClass('join-nav');
        $(user_contents).removeClass('hidden').parent().animate(
            { 
                left: '-100%'
            },{ 
                complete:function(){
                    $('div#user-account').find('input.next').remove();
                    $('body').css('background', 'url("/img/background/03_back.jpg") no-repeat').css('background-size', 'cover');
                }
            }
        );
        $(joinNav).find('li:first-child').removeClass('active').next().addClass('active');
        self.close();
    }
