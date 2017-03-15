@extends('layouts.app')

@section('content')
    <div class="page join-form">
        <form method="post" ENCTYPE="multipart/form-data" action="http://52.78.206.66/entertainment_ci/index.php/Test/setenter">
            <div class="group user-group">
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="text" value="" id="email" name="email" />
                </div>
                <div class="form-group half">
                    <label for="name">실명</label>
                    <input type="text" value="" id="name" name="name"/>
                </div>
                <div class="form-group half">
                    <label for="nickname">닉네임</label>
                    <input type="text" value="" id="nickname" name="nickname"/>
                </div>
                <div class="form-group half">
                    <label for="password">비밀번호</label>
                    <input type="password" value="" id="password" name="password"/>
                </div>
                <div class="form-group half">
                    <label for="password-confirm">비밀번호확인</label>
                    <input type="password" value="" id="password-confirm" name="password-confirm"/>
                </div>
                <div class="form-group">
                    <label for="phone">핸드폰</label>
                    <input type="text" value="" id="phone" name="phone"/>
                </div>
            </div>
            <div class="group team-group">
                <div class="form-group">
                    <label for="enter_name">공연자 이름(팀명)</label>
                    <input type="text" value="" id="enter_name" name="enter_name"/>
                </div>
                <div class="form-group">
                    <label for="howmany">인원 및 성별</label>
                    <select id ="howmany" name="howmany">
                        <option value=0>솔로여자</option>
                        <option value=1>솔로남자</option>
                        <option value=2>그룹여자</option>
                        <option value=3>그룹남자</option>
                        <option value=4>혼성</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="job">직업종류</label>
                    <select id="job" name="job">
                        <option value=1>가수</option>
                        <option value=2>연주자</option>
                        <option value=3>댄서</option>
                        <option value=4>사회자</option>
                        <option value=5>연기자</option>
                        <option value=6>모델</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>분야(중복선택가능)</label>
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
                    @elseif( Request::segment(1) == 'actor' )
                        <label for="50">성인</label>
                        <input type="checkbox" name="category[]" id="50" value="0">
                        <label for="51">아역</label>
                        <input type="checkbox" name="category[]" id="51" value="1">
                        <label for="52">성우</label>
                        <input type="checkbox" name="category[]" id="52" value="2">
                    @elseif( Request::segment(1) == 'player' )
                        <label for="20">국악</label>
                        <input type="checkbox" name="category[]" id="20" value="0">
                        <label for="21">클래식</label>
                        <input type="checkbox" name="category[]" id="21" value="1">
                        <label for="22">재즈</label>
                        <input type="checkbox" name="category[]" id="22" value="2">
                        <label for="30">기타</lab0l>
                        <input type="checkbox" name="category[]" id="23" value="3">
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
                    @elseif( Request::segment(1) == 'model' )
                        <label for="60">패션/피팅</label>
                        <input type="checkbox" name="category[]" id="60" value="0">
                        <label for="61">부분모델</label>
                        <input type="checkbox" name="category[]" id="61" value="1">
                        <label for="62">광고/매거진</label>
                        <input type="checkbox" name="category[]" id="62" value="2">
                        <label for="63">기타</label>
                        <input type="checkbox" name="category[]" id="63" value="3">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="perform">행사종류</label>
                <select id ="perform" name="perform">
                    <option value=1>기업행사</option>
                    <option value=2>가족행사</option>
                    <option value=3>학교행사</option>
                    <option value=4>기타행사</option>
                </select>
            </div>
            <div class="form-group">
                <label for="intro">한줄소개</label>
                <input type="text" value="" id="intro" name="intro"/>
            </div>
            <div class="form-group">
                <label for="address">주소</label>
                <input type="text" value="" id="address" name="address"/>
            </div>
            <div class="form-group">
                <label for="perform_minutes">평균공연시간</label>
                <input type="text" value="" id="perform_minutes" name="perform_minutes"/>
            </div>
            <div class="form-group">
                <label for="cost">가격</label>
                <input type="text" value="" id="cost" name="cost"/>
                <input type="checkbox" id="cost_flag" name="cost_flag" value="N"/>
                <label for="cost_flag">비공개</label>
            </div>
            <div class="form-group">
                <label for="video">Youtube URL 주소</label>
                <input type="text" value="" id="video" name="video"/>
            </div>
            <div class="form-group">
                <label for="intro_detail">상세 소개</label>
                <textarea id="intro_detail" name="intro_detail"></textarea>
            </div>
            <div class="form-group">
                <label for="career">경력 및 수상</label>
                <textarea id="career" name="career"></textarea>
            </div>
            <div class="form-group">
                <label for="recent_perform">최근 공연 이력</label>
                <textarea id="recent_perform" name="recent_perform"></textarea>
            </div>
            <div class="form-group">
                <label for="profile-image">메인 프로필 사진</label>
                <div id="container_image"></div> 
                <!---<input type="file" id="profile-image" name="image[]" accept="image/*"/>-->
            </div>
            <div class="form-group">
                <label for="detail-image">상세이미지(중복선택가능)</label>
                <input type="file" id="detail-image" name="image[]" accept="image/*" multiple/>
            </div>
            <input type="submit"/>
        </form>
    </div>
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
    </script> 
@endsection