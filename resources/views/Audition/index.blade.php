@extends('layouts.mainMenu')

@section('content')

    <div class="section audition">
        <div class="navi">
            @foreach( $categories as $job )
            <a href="#" style="background:url('{{ '/image/Tab_' . $job->id . '.png' }}') center no-repeat;background-size:cover;">{{ '#'.$job->job }}</a>
            @endforeach
        </div>
        <div>
            <nav class="tab">
                <ul>
                    <li name="company" class="active"><a href="#">기업오디션</a></li>
                    <li name="private"><a href="#">개인오디션</a></li>
                </ul>
            </nav>
            <a href="#" class="my-audition"><img src="/image/icon_book_mark_pressed_ent.png"/>내 오디션 보기</a>
            <ul id="company" class="grid" data-masonry='{ "itemSelector": ".grid-item" }'>
                <div id="company">
                    @for($i=0;$i<12;$i++)
                    <li class="grid-item">
                        <div class="img-box">
                            <a href="#" class="img"><div class="cover"></div><img src="http://res.heraldm.com/content/image/2014/03/20/20140320001092_0.jpg"/></a>
                            <a href="#" class="bookmark"><img src="/image/icon_book_mark_pressed_ent.png"/></a>
                            <a href="#" class="social"><img src="/image/icon_share_unpressed.png"/></a>
                        </div>
                        <p class="category">
                            <span>가수</span>
                            <span>연주자</span>
                            <span>모델</span>
                        </p>
                        <p class="title">DSP media 신인 아이돌 전국 공개 오디션</p>
                        <p class="detail">마감 2017.06.07</p>
                        <p class="goUrl"><a href="#" class="goUrl"><img src="/image/icon_enroll_ent.png">지원하기</a></p>
                    </li>
                    <li class="grid-item">
                        <div class="img-box">
                            <a href="#" class="img">
                                <div class="cover"></div>
                                <img src="http://cfile9.uf.tistory.com/image/1508B540503629CC1A05F8"/>
                            </a>
                            <a href="#" class="bookmark"><img src="/image/icon_book_mark_pressed_ent.png"/></a>
                            <a href="#" class="social"><img src="/image/icon_share_unpressed.png"/></a>
                        </div>
                        <p class="category">
                            <span>가수</span>
                            <span>연주자</span>
                            <span>모델</span>
                        </p>
                        <p class="title">나도 오페라 가수다 오디션</p>
                        <p class="detail">마감 2017.06.07</p>
                        <p class="goUrl"><a href="#" class="goUrl"><img src="/image/icon_enroll_ent.png">지원하기</a></p>
                    </li>
                    @endfor
                </div>
                <div id="private">
                    @for($i=0;$i<12;$i++)
                    <li class="grid-item">
                        <div class="img-box">
                            <a href="#" class="img">
                                <div class="cover"></div>
                                <img src="http://cfile9.uf.tistory.com/image/1508B540503629CC1A05F8"/>
                            </a>
                            <a href="#" class="bookmark"><img src="/image/icon_book_mark_pressed_ent.png"/></a>
                            <a href="#" class="social"><img src="/image/icon_share_unpressed.png"/></a>
                        </div>
                        <p class="category">
                            <span>가수</span>
                            <span>연주자</span>
                            <span>모델</span>
                        </p>
                        <p class="title">나도 오페라 가수다 오디션</p>
                        <p class="detail">마감 2017.06.07</p>
                        <p class="goUrl"><a href="#" class="goUrl"><img src="/image/icon_enroll_ent.png">지원하기</a></p>
                    </li>
                    <li class="grid-item">
                        <div class="img-box">
                            <a href="#" class="img"><div class="cover"></div><img src="http://res.heraldm.com/content/image/2014/03/20/20140320001092_0.jpg"/></a>
                            <a href="#" class="bookmark"><img src="/image/icon_book_mark_pressed_ent.png"/></a>
                            <a href="#" class="social"><img src="/image/icon_share_unpressed.png"/></a>
                        </div>
                        <p class="category">
                            <span>가수</span>
                            <span>연주자</span>
                            <span>모델</span>
                        </p>
                        <p class="title">DSP media 신인 아이돌 전국 공개 오디션</p>
                        <p class="detail">마감 2017.06.07</p>
                        <p class="goUrl"><a href="#" class="goUrl"><img src="/image/icon_enroll_ent.png">지원하기</a></p>
                    </li>
                    @endfor
                </div>
            </ul>
            <ul id="private" class="grid2 hidden" data-masonry='{ "itemSelector": ".grid-item2" }'>
                @for($i=0;$i<12;$i++)
                <li class="grid-item2">
                    <div class="img-box">
                        <a href="#" class="img">
                            <div class="cover"></div>
                            <img src="http://cfile9.uf.tistory.com/image/1508B540503629CC1A05F8"/>
                        </a>
                        <a href="#" class="bookmark"><img src="/image/icon_book_mark_pressed_ent.png"/></a>
                        <a href="#" class="social"><img src="/image/icon_share_unpressed.png"/></a>
                    </div>
                    <p class="category">
                        <span>가수</span>
                        <span>연주자</span>
                        <span>모델</span>
                    </p>
                    <p class="title">나도 오페라 가수다 오디션</p>
                    <p class="detail">마감 2017.06.07</p>
                    <p class="goUrl"><a href="#" class="goUrl"><img src="/image/icon_enroll_ent.png">지원하기</a></p>
                </li>
                <li class="grid-item2">
                    <div class="img-box">
                        <a href="#" class="img"><div class="cover"></div><img src="http://res.heraldm.com/content/image/2014/03/20/20140320001092_0.jpg"/></a>
                        <a href="#" class="bookmark"><img src="/image/icon_book_mark_pressed_ent.png"/></a>
                        <a href="#" class="social"><img src="/image/icon_share_unpressed.png"/></a>
                    </div>
                    <p class="category">
                        <span>가수</span>
                        <span>연주자</span>
                        <span>모델</span>
                    </p>
                    <p class="title">DSP media 신인 아이돌 전국 공개 오디션</p>
                    <p class="detail">마감 2017.06.07</p>
                    <p class="goUrl"><a href="#" class="goUrl"><img src="/image/icon_enroll_ent.png">지원하기</a></p>
                </li>
                @endfor
            </ul>
        </div>
    </div>
    <script src="/js/masonry.pkgd.min.js"></script>
    <script>
        $('nav.tab a').on('click',function(e){
            e.preventDefault();
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('ul#'+ $(this).parent().attr('name') ).removeClass('hidden').siblings('ul').addClass('hidden');
            $('#private:not(.hidden)').masonry({
                itemSelector: '.grid-item2'
            });
        })
    </script>
@endsection
