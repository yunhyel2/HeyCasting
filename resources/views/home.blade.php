@extends('layouts.mainMenu')

@section('content')
    <div id="main-slide">
        <nav class="arrow">
            <ul>
                <li><a href="#" name="left"><img src="/image/arrow01_side_left.png" alt="왼쪽버튼"/></a></li>
                <li><a href="#" name="right"><img src="/image/arrow01_side_right.png" alt="오른쪽버튼"/></a></li>
            </ul>
        </nav>
        <nav class="button">
            <ul>
                <li class="active"><a href="#"><i class="fa fa-circle" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
        <ul class="slide">
            @for($i=0;$i<3;$i++)
            <li style="background:url('/image/img_top_banner.png') no-repeat; background-size:cover;">
                <img src="/image/logo_on_top_banner.png" alt=""/>
                <p>988명의 엔터테이너와 함께합니다</p>
                <p class="button-box">
                    <a href="{{ url('/user-join') }}">일반회원으로 가입하기</a>
                    <a href="{{ url('/enter-join') }}">엔터회원으로 가입하기</a>
                </p>
            </li>
            @endfor
        </ul>
    </div>
    <div class="section new">
        <h2>새로운 엔터테이너</h2>
        <p>새롭게 등록한 엔터테이너를 만나보세요</p>
        <nav class="arrow">
            <ul>
                <li><a href="#" name="left"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                <li><a href="#" name="right"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
        <div class="slide-wrap">
            <ul class="slider">
                @foreach($new_enters as $new)
                <li>
                    <div class="img-box">
                        <a href="#" class="profile" style="{{ 'background:url(' . $new->main_image->image . ') center no-repeat;background-size:cover;' }}"></a>
                    </div>
                    <p class="title">{{ $new->profile->name }}<span></span></p>
                    <p>{{ $new->profile->intro }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr/>
    <div class="section best">
        <h2>베스트 엔터테이너</h2>
        <p>모든 카테고리 안에서 종합 7위안에 드는 베스트 엔터테이너입니다</p>
        <ul>
            @foreach($best_enters as $i=>$best)
            <li class="{{ $i < 3 ? 'triple' : '' }}">
                <a href="#" class="img-box" style="{{ 'background:url(' . $best->enter->main_image->image . ') center no-repeat;background-size:cover;' }}">
                    <div class="cover"></div>
                    <div class="detail">
                        <p class="enter-name {{ $i == 0 ? 'best' : '' }}">{{ $best->name }}</p>
                        <p class="enter-type {{ $i == 0 ? 'best' : '' }}">직업</p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <hr/>
    <div class="section special">
        <h2>특집 캐스팅</h2>
        <p>헤이캐스팅에서 직접 제안하는 캐스팅 디렉션</p>
        <nav class="arrow">
            <ul>
                <li><a href="#" name="left"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                <li><a href="#" name="right"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
        <div class="slide-wrap">
            <ul class="slider">
                <li>
                @for($i=0;$i<3;$i++)
                    @if( $i<$banners->count() )
                    <a href="{{ $banners[$i]->content_image }}"><img src="{{ $banners[$i]->image }}" alt=""/></a>
                    @endif
                @endfor
                </li>
                <li>
                @for($i=3;$i<6;$i++)
                    @if( $i<$banners->count() )
                    <a href="{{ $banners[$i]->content_image }}"><img src="{{ $banners[$i]->image }}" alt=""/></a>
                    @endif
                @endfor
                </li>
            </ul>
        </div>
    </div>
    <hr/>
    <div class="section today">
        <h2>오늘의 일상</h2>
        <p>오늘 올라온 따끈따끈한 엔터테이너들의 일상 사진을 구경하세요</p>
        <div class="gallery">
            <div class="wrap">
                <div class="half"><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div class="half"><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
            </div>
            <div class="wrap">
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
            </div>
            <div class="wrap">
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div class="half"><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div class="half"><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
            </div>
            <div class="wrap">
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
                <div><a href="#" style="background:url('https://secure.static.tumblr.com/201d4cf004265e8365064d354950b65f/vxokifl/j64o689c8/tumblr_static_tumblr_static_filename_640.jpg') no-repeat;background-size:cover;"></a></div>
            </div>
        </div>
    </div>
    <div class="section app">
        
    </div>
@endsection
