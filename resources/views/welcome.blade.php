<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>헤이캐스팅 Hey Casting - 전 세계 유일의 캐스팅 플랫폼</title>
        <meta name="description" content="헤이캐스팅은 캐스팅이 필요한 일반회원과 헤이캐스팅의 엔터테이너 회원을 직접 연결시켜주는 캐스팅 플랫폼입니다.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!---css-->
        <link rel="stylesheet" href="css/app.css">
        <!---js-->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/jquery.fullPage.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!--favicon-->
        <link rel="shortcut icon" href="favicon/favicon.ico">
        
        <!--사이트소유확인을 위한 네이버 메타태그-->
        <meta name="naver-site-verification" content="9825546416484eb76d4bd6d8b35a05cc4b41834b"/>

        <!--이미지 미리보기를 위한 네이버 메타태그-->
        <meta property="og:title" content="헤이캐스팅 Hey Casting - 전 세계 유일의 캐스팅 플랫폼"/>

        <meta property="og:type" content="website"/>

        <meta property="og:url" content="http://heycasting.com"/>

        <meta property="og:description" content="헤이캐스팅은 캐스팅이 필요한 일반회원과 헤이캐스팅의 엔터테이너 회원을 직접 연결시켜주는 캐스팅 플랫폼입니다."/>

        <meta property="og:image" content="img/logo_pk.png"/>

        <!--네이버 앱 등록을 위한 메타태그-->
        <meta name="naver-site-verification" content="9825546416484eb76d4bd6d8b35a05cc4b41834b"/>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="logo">
            <a href="{{ url('/') }}">
            <img src="{{ url('/img') . '/logo.png' }}" class="logo1" />
            <img src="{{ url('/img') . '/logo2.png' }}" class="logo2"/>
            </a>
        </div>

        <div id="fullpage">
            <div class="section" id="section_1">
                    <div class="contents">
                        <p>등록된 엔터테이너 <span class="counter">988</span>팀</p>
                        <h1>전세계 어디서나 캐스팅이 쉬워진다 ♬</h1>
                        <h1>세계 최고의 엔터테이너 캐스팅 플랫폼</h1>

                        <div class="btn">
                            <a href="https://play.google.com/store/apps/details?id=com.platformstory.www.entertainment" target="_blank" class="download">Download App</a>
                            <a href="{{ url('/enter-join') }}" class="profile">엔터테이너 회원가입</a>
                        </div>
                    </div><!--//contents-->
            </div>
            <div class="section" id="section_2">
                <div class="contents">
                    <div class="info_1">
                        <h2>PROFILE 중심의 캐스팅</h2>
                        <p>엔터테이너가 직접 올린 프로필과 이미지&amp;동영상을 보고 캐스팅할 수 있습니다.</p>
                    </div>
                    <div class="info_2">
                        <h2>누구나 쉽게 CASTING 가능</h2>
                        <p>연예계에 아는 사람 하나 없어도 지금 바로 엔터테이너를 캐스팅 할 수 있습니다.</p>
                    </div>
                    <div class="info_3">
                        <h2>ONE-STOP 캐스팅</h2>
                        <p>합리적인 캐스팅 시스템을 통해 시간과 비용을 절약할 수 있습니다.</p>
                    </div>
                </div>
            </div>
            <div class="section" id="section_3">
                <div class="slide" id="slide_1">
                    <div class="contents">
                        <h2>HEY PICK</h2>
                        <p>헤이캐스팅에서 추천하는 다양한 이벤트 및 상품을 만나볼 수 있습니다.</p>
                    </div>
                    <div class="img">
                        <img src="img/slide_1.jpg" />
                    </div>
                </div>
                <div class="slide" id="slide_2">
                    <div class="contents">
                        <h2>CATEGORY</h2>
                        <p>다양한 카테고리로 원하는 엔터테이너를 직종, 행사, 비용, 위치별로 찾을 수 있습니다.</p>
                    </div>
                    <div class="img">
                        <img src="img/slide_2.png" />
                    </div>
                </div>
                <div class="slide" id="slide_3">
                    <div class="contents">
                        <h2>PROFILE</h2>
                        <p>캐스팅을 원하는 엔터테이너의 상세 프로필, 이미지 및 동영상 등을 확인할 수 있습니다.</p>
                    </div>
                    <div class="img">
                        <img src="img/slide_3.png" />
                    </div>
                </div>
                <div class="slide" id="slide_4">
                    <div class="contents">
                        <h2>CASTING</h2>
                        <p>일반회원과 엔터테이너를 빠르고 합리적인 캐스팅 시스템으로 연결시켜드립니다.</p>
                    </div>
                    <div class="img">
                        <img src="img/slide_4.png" />
                    </div>
                </div>
            </div>
            <div class="section" id="section_4">
                <div class="contents">
                    <p class="info">WORLD'S BEST CASTING PLATFORM</p>
                    <a href="https://www.facebook.com/heycasting2016/" target="_blank"><img src="./img/facebook.png" />Facebook : facebook.com/heycasting2016</a>
                    <a href="https://www.instagram.com/hey_casting/" target="_blank"><img src="./img/instagram.png" />Instagram : instagram.com/hey_casting</a>
                    <p class="mail">Tel : +82 2 3407 6207 &nbsp;&nbsp; Email : heycasting@platformstory.com</p>
                    <a class="operate" href="OperatingPolicyKr.html">서비스 이용약관 &amp; 개인정보 취급방침</a>
                </div>
            </div>
        </div>
        <script src="js/jquery.counterup.min.js"></script>
        <script>
            $('#fullpage').fullpage({
                verticalCentered: false
            });

            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-69859195-13','auto');ga('send','pageview');
        </script>
    </body>
</html>