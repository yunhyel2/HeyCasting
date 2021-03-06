@extends('layouts.app')

@section('content')
    <div class="step">
        <ul>
        @if( Request::segment(1) == 'singer' )
            <li>프로필 등록하기 <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">가수 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        @elseif( Request::segment(1) == 'actor' )
            <li>프로필 등록하기 <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">배우 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        @elseif( Request::segment(1) == 'musician' )
            <li>프로필 등록하기 <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">연주자 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        @elseif( Request::segment(1) == 'dancer' )
            <li>프로필 등록하기 <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">댄서 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        @elseif( Request::segment(1) == 'host' )
            <li>프로필 등록하기 <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">MC, 사회자 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        @elseif( Request::segment(1) == 'model' )
            <li>프로필 등록하기 <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#">모델 <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        @endif
            <ul class="select">
                <li class="{{ Request::segment(1) == 'singer' ? 'hidden' : '' }}"><a href="{{ url('singer/create') }}">가수</a></li>
                <li class="{{ Request::segment(1) == 'actor' ? 'hidden' : '' }}"><a href="{{ url('actor/create') }}">배우</a></li>
                <li class="{{ Request::segment(1) == 'player' ? 'hidden' : '' }}"><a href="{{ url('player/create') }}">연주자</a></li>
                <li class="{{ Request::segment(1) == 'dancer' ? 'hidden' : '' }}"><a href="{{ url('dancer/create') }}">댄서</a></li>
                <li class="{{ Request::segment(1) == 'host' ? 'hidden' : '' }}"><a href="{{ url('host/create') }}">MC, 사회자</a></li>
                <li class="{{ Request::segment(1) == 'model' ? 'hidden' : '' }}"><a href="{{ url('model/create') }}">모델</a></li>
            </ul>
        </li>
        </ul>
    </div>
    <script>
        $('div.step > ul > li > a').on('click', function(e){
            e.preventDefault();
            $('ul.select').toggleClass('active-show');
        });
    </script>
    <div class="page join-form">
        <form method="post" ENCTYPE="multipart/form-data" action="{{ url('join') }}">
        {{ csrf_field() }}
            <div class="group user-group">
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="text" value="" id="email" name="email" placeholder="기입된 이메일은 ID로 쓰이게 됩니다."/>
                </div>
                <div class="form-group half">
                    <label for="name">실명</label>
                    <input type="text" value="" id="name" name="name" placeholder="본명을 입력해 주세요."/>
                </div>
                <div class="form-group half">
                    <label for="nickname">닉네임</label>
                    <input type="text" value="" id="nickname" name="nickname" placeholder="앱 내에서 사용될 이름입니다."/>
                </div>
                <div class="form-group half">
                    <label for="password">비밀번호</label>
                    <input type="password" value="" id="password" name="password" placeholder="영어, 숫자, !@#$%^*()_+/ 포함하여 최소 10자리."/>
                </div>
                <div class="form-group half">
                    <label for="password-confirm">비밀번호확인</label>
                    <input type="password" value="" id="password-confirm" name="password-confirm" placeholder="비밀번호를 다시 한번 입력해주세요."/>
                </div>
                <div class="form-group half">
                    <label for="phone">핸드폰</label>
                    <input type="text" value="" id="phone" name="phone" placeholder="숫자만 입력해주세요."/>
                </div>
                <div class="form-group half">
                    <label for="address">주소</label>
                    <input type="text" id="sample6_postcode" placeholder="우편번호">
                    <input type="button" onclick="sample6_execDaumPostcode()" value="우편번호찾기"><br>
                    <input type="text" name="address" id="sample6_address" placeholder="주소">
                    <!--- 주소검색 -->
                        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
                        <script>
                            function sample6_execDaumPostcode() {
                                new daum.Postcode({
                                    oncomplete: function(data) {
                                        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                                        // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                                        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                                        var fullAddr = ''; // 최종 주소 변수
                                        var extraAddr = ''; // 조합형 주소 변수

                                        // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                                        if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                                            fullAddr = data.roadAddress;

                                        } else { // 사용자가 지번 주소를 선택했을 경우(J)
                                            fullAddr = data.jibunAddress;
                                        }

                                        // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                                        if(data.userSelectedType === 'R'){
                                            //법정동명이 있을 경우 추가한다.
                                            if(data.bname !== ''){
                                                extraAddr += data.bname;
                                            }
                                            // 건물명이 있을 경우 추가한다.
                                            if(data.buildingName !== ''){
                                                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                                            }
                                            // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                                            fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                                        }

                                        // 우편번호와 주소 정보를 해당 필드에 넣는다.
                                        document.getElementById('sample6_postcode').value = data.zonecode; //5자리 새우편번호 사용
                                        document.getElementById('sample6_address').value = fullAddr;
                                    }
                                }).open();
                            }
                        </script>
                    <!--- end 주소검색 -->
                </div>
            </div>
            <div class="group team-group">
                <div class="form-group half">
                    <label for="enter_name">공연자 이름(팀명)</label>
                    <input type="text" value="" id="enter_name" name="enter_name" placeholder="엔터테이너로서의 이름을 입력해주세요."/>
                </div>
                <div class="form-group half">
                    <label for="howmany">{{ Request::segment(1) == 'singer' || Request::segment(1) == 'player' || Request::segment(1) == 'dancer' ? '인원 및 성별' : '성별' }}</label>
                    <select id ="howmany" name="howmany">
                        @if( Request::segment(1) == 'singer' || Request::segment(1) == 'player' || Request::segment(1) == 'dancer' )
                            <option value="0">솔로, 여자</option>
                            <option value="1">솔로, 남자</option>
                            <option value="2">그룹, 여자</option>
                            <option value="3">그룹, 남자</option>
                            <option value="4">그룹, 혼성</option>
                        @else
                            <option value="0">여자</option>
                            <option value="1">남자</option>
                        @endif
                    </select>
                </div>
                <div class="form-group half">
                    <label for="profile-image">메인 프로필 사진</label>
                    <div id="container_image" style="border:1px solid #333;"></div> 
                </div>
                <div class="form-group half">
                    <label for="filer_input">상세이미지(중복선택가능)</label>
                    <input type="file" id="filer_input" name="image[]" accept="image/*" multiple/>
                </div>
                <!---multiple이미지-->
                    <script>
                        $(document).ready(function() {
                            $('#filer_input').filer();       
                        });
                    </script>
                <!---end multiple이미지-->
                <div class="form-group">
                    <label>분야(중복선택가능)</label>
                    <div class="genre">
                    @if( Request::segment(1) == 'singer' )
                        <label for="10">Pop/K-pop</label>
                        <input type="checkbox" name="category[]" id="10" value="0">
                        <label for="11">R&B/힙합</label>
                        <input type="checkbox" name="category[]" id="11" value="1">
                        <label for="12">컨츄리/포크</label>
                        <input type="checkbox" name="category[]" id="12" value="2">
                        <label for="13">댄스/일렉</label>
                        <input type="checkbox" name="category[]" id="13" value="3">
                        <label for="14">라틴/레게</label>
                        <input type="checkbox" name="category[]" id="14" value="4">
                        <label for="15">락/밴드</label>
                        <input type="checkbox" name="category[]" id="15" value="5">
                        <label for="16">기타</label>
                        <input type="checkbox" name="category[]" id="16" value="6">
                        <input type="hidden" name="job" value="1"/>
                    @elseif( Request::segment(1) == 'actor' )
                        <label for="50">성인</label>
                        <input type="checkbox" name="category[]" id="50" value="0">
                        <label for="51">아역</label>
                        <input type="checkbox" name="category[]" id="51" value="1">
                        <label for="52">성우</label>
                        <input type="checkbox" name="category[]" id="52" value="2">
                        <input type="hidden" name="job" value="5"/>
                    @elseif( Request::segment(1) == 'player' )
                        <label for="20">국악</label>
                        <input type="checkbox" name="category[]" id="20" value="0">
                        <label for="21">클래식</label>
                        <input type="checkbox" name="category[]" id="21" value="1">
                        <label for="22">재즈</label>
                        <input type="checkbox" name="category[]" id="22" value="2">
                        <label for="30">기타</lab0l>
                        <input type="checkbox" name="category[]" id="23" value="3">
                        <input type="hidden" name="job" value="2"/>
                    @elseif( Request::segment(1) == 'dancer' )
                        <label for="30">비보이</label>
                        <input type="checkbox" name="category[]" id="30" value="0">
                        <label for="31">K-POP</label>
                        <input type="checkbox" name="category[]" id="31" value="1">
                        <label for="32">재즈댄스</label>
                        <input type="checkbox" name="category[]" id="32" value="2">
                        <label for="33">탭댄스</label>
                        <input type="checkbox" name="category[]" id="33" value="3">
                        <label for="34">발레</label>
                        <input type="checkbox" name="category[]" id="34" value="4">
                        <label for="35">현대/창작</label>
                        <input type="checkbox" name="category[]" id="35" value="5">
                        <label for="36">치어리더</label>
                        <input type="checkbox" name="category[]" id="36" value="6">
                        <label for="37">기타</label>
                        <input type="checkbox" name="category[]" id="37" value="7">
                        <input type="hidden" name="job" value="3"/>
                    @elseif( Request::segment(1) == 'host' )
                        <label for="40">개그맨</label>
                        <input type="checkbox" name="category[]" id="40" value="0">
                        <label for="41">전문MC</label>
                        <input type="checkbox" name="category[]" id="41" value="1">
                        <label for="42">아나운서</label>
                        <input type="checkbox" name="category[]" id="42" value="2">
                        <label for="43">외국어</label>
                        <input type="checkbox" name="category[]" id="43" value="3">
                        <label for="44">기타</label>
                        <input type="checkbox" name="category[]" id="44" value="4">
                        <input type="hidden" name="job" value="4"/>
                    @elseif( Request::segment(1) == 'model' )
                        <label for="60">패션/피팅</label>
                        <input type="checkbox" name="category[]" id="60" value="0">
                        <label for="61">부분모델</label>
                        <input type="checkbox" name="category[]" id="61" value="1">
                        <label for="62">광고/매거진</label>
                        <input type="checkbox" name="category[]" id="62" value="2">
                        <label for="63">기타</label>
                        <input type="checkbox" name="category[]" id="63" value="3">
                        <input type="hidden" name="job" value="6"/>
                    @endif
                    </div>
                </div>
            </div>
            <div class="form-group half">
                <label for="perform">행사종류</label>
                <select id ="perform" name="perform">
                    <option value=1>기업행사</option>
                    <option value=2>가족행사</option>
                    <option value=3>학교행사</option>
                    <option value=4>기타행사</option>
                </select>
            </div>
            <div class="form-group half">
                <label for="perform_minutes">평균공연시간</label>
                <input type="text" value="" id="perform_minutes" name="perform_minutes" placeholder="분 단위로 입력해주세요. ( 예 : 30 - 40 )"/>
            </div>
            <div class="form-group half">
                <label for="cost">가격</label>
                <input type="text" value="" id="cost" name="cost" placeholder="원 단위로 숫자만 입력해주세요."/>
                <div class="secret">
                    <label for="cost_flag">비공개</label>
                    <input type="checkbox" id="cost_flag" name="cost_flag" value="N"/>
                </div>
            </div>
            <div class="form-group half">
                <label for="video">활동 Youtube 영상</label>
                <input type="text" value="" id="video" name="video" placeholder="Youtube 영상 URL을 입력해주세요."/>
            </div>
            <div class="form-group">
                <label for="intro">한 줄 소개</label>
                <input type="text" value="" id="intro" name="intro" placeholder="메인프로필에 실릴 소개를 입력해주세요."/>
            </div>
            <div class="form-group">
                <label for="intro_detail">상세 소개</label>
                <textarea id="intro_detail" rows="10" name="intro_detail"></textarea>
            </div>
            <div class="form-group">
                <label for="career">경력 및 수상</label>
                <textarea id="career" name="career" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="recent_perform">최근 공연 이력</label>
                <textarea id="recent_perform" name="recent_perform" rows="10"></textarea>
            </div>
            <div class="group">
                <input type="submit"/>
            </div>
        </form>
    </div>
    <!---이미지CROP-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="/jquery.picture.cut/src/jquery.picture.cut.js"></script>
    <script>
        $("#container_image").PictureCut({
            InputOfImageDirectory       : "image",
            PluginFolderOnServer        : "/jquery.picture.cut/",
            FolderOnServer              : "/uploads/",
            EnableCrop                  : true,
            CropWindowStyle             : "Bootstrap"
        });
        $("#container_image").css('width', '100%');
        $('input[name="file-image"]').css('width', '100%');
    </script>
    <!---multiple이미지-->
    <script src="/jQuery.filer.master/js/jquery.filer.js"></script>
@endsection