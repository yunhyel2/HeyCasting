<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>헤이캐스팅 Hey Casting - 전 세계 유일의 캐스팅 플랫폼</title>
    <meta name="description" content="헤이캐스팅은 캐스팅이 필요한 일반회원과 헤이캐스팅의 엔터테이너 회원을 직접 연결시켜주는 캐스팅 플랫폼입니다.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!---css-->
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    <link href="/jQuery.filer.master/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="/jQuery.filer.master/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---js-->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.12/vue.js"></script>

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
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="{{ Request::segment(1) == 'join' || Request::segment(2) == 'create' ? 'back' : '' }}">
    <div id="app">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="logo" class="{{ Request::segment(2) == 'create' ? 'fixed' : '' }}">
            <a href="{{ url('/') }}">
                
            </a>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
