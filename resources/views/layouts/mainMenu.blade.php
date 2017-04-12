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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!---js-->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/jquery.fullPage.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!--favicon-->
        <link rel="shortcut icon" href="favicon/favicon.ico">
        
        <!--네이버 앱 등록을 위한 메타태그-->
        <meta name="naver-site-verification" content="9825546416484eb76d4bd6d8b35a05cc4b41834b"/>
        <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="app">
            <div class="sub-nav">
                <ul>
                    <li><a href="#"><img src="/image/icon_download_app.png" alt="" class="down"><span>APP 다운받기</span></a></li>
                    <li><a href="#"><img src="/image/icon_facebook_top.png" alt="헤이캐스팅 페이스북"/></a></li>
                    <li><a href="#"><img src="/image/icon_instagram_top.png" alt="헤이캐스팅 인스타그램"/></a></li>
                </ul>
                <ul class="right">
                    @if ( Auth::guest() )
                    <li><a href="#">로그인</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    로그아웃
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li><a href="#">회원가입</a></li>
                </ul>
            </div>
            <nav id="main-nav">
                <h1 class="logo"><a href="{{ url('/') }}"><img src="/image/heycasting_logo_prototype.png" alt=""/><img src="/image/textlogo_prototype.png" alt="헤이캐스팅"/></a></h1>
                <ul class="small">
                    <li><a href="#" class="tabmenu"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
                </ul>
                <ul class="hidden">
                    <li class="active"><a href="#">홈</a></li>
                    <li><a href="#">엔터테이너</a></li>
                    <li><a href="#">오디션</a></li>
                    <li><a href="#">커뮤니티</a></li>
                    <li><a href="#">마이페이지</a></li>
                </ul>
            </nav>
                @yield('content')
            <div id="footer">
                <a href="#" class="app"><img src="/image/launcher_icon.png" alt="헤이캐스팅 앱 바로가기"/></a>
                <ul class="introduction">
                    <li>회사 : 주식회사 플랫폼스토리</li>
                    <li>전화번호 : 02-222-2222</li>
                    <li>문의사항 : </li>
                    <li>이메일 : </li>
                </ul>
                <p>
                    <a href="#"><img src="/image/icon_facebook_bottom.png" alt="헤이캐스팅 페이스북"/></a>
                    <a href="#"><img src="/image/icon_instagram_bottom.png" alt="헤이캐스팅 인스타그램"/></a>
                </p>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="/js/main.js"></script>
</html>