@extends('layouts.app')

@section('content')
    <div class="join-form enter">
        <nav class="join-nav">
            <ul>
                <li class="enter {{ strpos( Request::segment(1) , 'social' ) ? '' : 'active' }}" name="user-account"><a href="#" onclick="return false;">계정 정보 입력</a></li>
                <li class="enter {{ strpos( Request::segment(1) , 'social' ) ? 'active' : '' }}" name="user-contents"><a href="#" onclick="return false;">컨텐츠 첨부</a></li>
                <li class="enter" name="user-profile"><a href="#" onclick="return false;">프로필 작성</a></li>
            </ul>
        </nav>
        <form method="POST" name="join-form" class="join-form validate" action="{{ url('join-in') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="step-wrap">
                <div id="user-account" class="step {{ strpos( Request::segment(1) , 'social' ) ? 'hidden' : '' }}">
                    <div class="group">
                        <h2>엔터테이너 회원가입<span class="required"><img src="/img/required.png" alt="(필수)"></span></h2>
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
                            <li><a href="/join/kakao"><img src="/img/social_kakao.png" alt="카카오톡으로가입하기"/></a></li>
                            <li><a href="/join/google"><img src="/img/social_google.png" alt="구글로가입하기"/></a></li>
                            <li><a href="/join/facebook"><img src="/img/social_facebook.png" alt="페이스북으로가입하기"/></a></li>
                            <li><a href="/join/naver"><img src="/img/social_naver_line.png" alt="네이버로가입하기"/></a></li>
                        </ul>
                    </div>
                </div>
                <div id="user-contents" class="step {{ strpos( Request::segment(1) , 'social' ) ? '' : 'hidden' }}">
                    @if( strpos( Request::segment(1) , 'social' ) )
                        <input type="hidden" name="user-email" value="{{ $user-email }}"/>
                        <input type="hidden" name="link" value="{{ $link }}"/>
                    @endif
                    <div class="group video">
                        <div class="form-group">
                            <label for="videos" class="title">활동 영상 첨부</label>
                            <p class="explanation">최소 2개 이상의 영상을 등록해주세요</p>
                            <div class="preview-items">
                                <ul class="video">
                                    <li name="video1"></li>
                                    <li name="video2"></li>
                                    <li name="video3" class="hidden"></li>
                                </ul>
                            </div>
                            <div class="items bt-mrg">
                                <input type="text" name="videos[]" id="video1" class="required no-pad" placeholder="Youtube 주소 입력" autocomplete="Off"/>
                            </div>
                            <div class="bt-mrg">
                                <input type="text" name="videos[]" id="video2" class="required no-pad" placeholder="Youtube 주소 입력" autocomplete="Off"/>
                            </div>
                        </div>
                        <a href="#" class="btn add-items video"><img src="/img/icon_plus_contents.png" class="icon" alt=""/></i>영상 추가 하기</a>
                    </div>
                    <div class="group main-profile">
                        <div class="form-group">
                            <label for="main-profile" class="title">메인 프로필 사진</label>
                            <p class="explanation">엔터테이너 리스트에 노출되는 대표 사진입니다</p>
                            <div class="preview button" id="profile_image">메인 사진 등록</div>
                        </div>
                    </div>
                    <div class="group photos">
                        <div class="form-group">
                            <label for="photos" class="title">추가 프로필 사진</label>
                            <p class="explanation">최대 6개까지 등록 가능합니다</p>
                            <div class="preview-items">
                                <ul class="photos-preview">
                                    <li><label for="photo1"><i class="fa fa-plus" aria-hidden="true"></i></label></li>
                                    <li><label for="photo2"><i class="fa fa-plus" aria-hidden="true"></i></label></li>
                                    <li><label for="photo3"><i class="fa fa-plus" aria-hidden="true"></i></label></li>
                                    <li><label for="photo4"><i class="fa fa-plus" aria-hidden="true"></i></label></li>
                                    <li><label for="photo5"><i class="fa fa-plus" aria-hidden="true"></i></label></li>
                                    <li><label for="photo6"><i class="fa fa-plus" aria-hidden="true"></i></label></li>
                                </ul>
                            </div>
                            <div class="dont-show">
                                <input type="file" name="photos[]" id="photo1" class="image items dont-show"/>
                                <input type="file" name="photos[]" id="photo2" class="image items dont-show"/>
                                <input type="file" name="photos[]" id="photo3" class="image items dont-show"/>
                                <input type="file" name="photos[]" id="photo4" class="image items dont-show"/>
                                <input type="file" name="photos[]" id="photo5" class="image items dont-show"/>
                                <input type="file" name="photos[]" id="photo6" class="image items dont-show"/>
                            </div>
                        </div>
                    </div>
                    <div class="group user" id="user-profile">
                        <div class="form-group">
                            <label for="user-info" class="title">개인정보</label>
                            <p class="explanation">실명과 핸드폰 번호를 적어주세요.</p>
                            <label for="user-name" class="icon">이름</label>
                            <input type="text" name="user-name" id="user-name" class="required large-pad" autocomplete="Off"/>
                        </div>
                        <div class="form-group">
                            <label for="user-phone" class="icon">연락처</label>
                            <input type="text" name="user-phone" id="user-phone" class="required large-pad" autocomplete="Off"/>
                        </div>
                    </div>
                    <div class="group">
                        <h2>직군선택</h2>
                        <div class="form-group">
                            <select class="required" name="user-job" id="user-job">
                                <option selected value>선택하세요</option>
                                <option value="사회자">MC/사회자</option>
                                <option value="가수">가수</option>
                                <option value="연기자">연기자</option>
                                <option value="연주자">연주자</option>
                                <option value="퍼포먼스">퍼포먼스</option>
                                <option value="모델">모델</option>
                                <option value="크리에이터">크리에이터</option>
                                <option value="기타 아티스트">기타 아티스트</option>
                            </select>
                            <ul class="select hidden">
                                <li name="사회자">MC/사회자</li>
                                <li name="가수">가수</li>
                                <li name="연기자">연기자</li>
                                <li name="연주자">연주자</li>
                                <li name="퍼포먼스">퍼포먼스</li>
                                <li name="모델">모델</li>
                                <li name="크리에이터">크리에이터</li>
                                <li name="기타 아티스트">기타 아티스트</li>
                            </ul>
                            <div class="half">
                                <select class="half disable required" name="user-job2">
                                    <option selected value>세부분야</option>
                                </select>
                                <ul class="select hidden half">
                                </ul>
                            </div>
                            <div class="half left-mrg">
                                <select class="half disable" name="user-job3">
                                    <option selected value>세부분야</option>
                                </select>
                                <ul class="select hidden half">
                                </ul>
                            </div> 
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="team-name" class="title">활동 시 이름</label>
                            <input type="text" name="team-name" id="team-name" placeholder="예명, 팀명 등을 입력해주세요" class="required intro" autocomplete="Off"/>
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="user-team" class="title inline">팀 여부 선택</label>
                            <span class="left-mrg">
                                <input type="radio" name="isTeam" id="no-team" value="0" class="required dont-show"/>
                                <label for="no-team">개인</label>
                            </span>
                            <span>
                                <input type="radio" name="isTeam" id="team" value="1" class="required dont-show"/>
                                <label for="team">팀</label>       
                            </span>                 
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="user-gender" class="title inline">성별</label>
                            <span class="left-mrg">
                                <input type="radio" name="gender" id="male" value="0" class="required dont-show"/>
                                <label for="male">남</label>
                            </span>
                            <span>
                                <input type="radio" name="gender" id="female" value="1" class="required dont-show"/>
                                <label for="female">여</label>
                            </span>
                            <span>
                                <input type="radio" name="gender" id="all" value="2" class="required dont-show"/>
                                <label for="all">남여모두</label>
                            </span>
                        </div>
                    </div>
                    <div class="group">
                        <h2>나이대 (평균)</h2>
                        <div class="form-group">
                            <select name="user-age" id="user-age" class="required">
                                <option value selected>선택하세요</option>
                                <option value="10">~ 10대</option>
                                <option value="20">20대</option>
                                <option value="30">30대</option>
                                <option value="40">40대</option>
                                <option value="50">50대 ~</option>
                            </select>
                            <ul class="select hidden">
                                <li name="10">~ 10대</li>
                                <li name="20">20대</li>
                                <li name="30">30대</li>
                                <li name="40">40대</li>
                                <li name="50">50대 ~</li>
                            </ul>
                        </div>
                    </div>
                    <div class="group location">
                        <h2>지역 선택</h2>
                        <div class="form-group half">
                            <label for="location1">거주지</label>
                            <select name="location1" id="location1" class="required">
                                <option value selected>선택하세요</option>
                                <option value="1">한국 내</option>
                                <option value="2">한국 외</option>
                            </select>
                            <ul class="select hidden">
                                <li name="1">한국 내</li>
                                <li name="2">한국 외</li>
                            </ul>
                        </div>
                        <div class="form-group half">
                            <label for="location2">본 국적</label>
                            <select name="location2" id="location2" class="required">
                                <option value selected>선택하세요</option>
                                <option value="1">한국</option>
                                <option value="2">중국</option>
                                <option value="3">일본</option>
                                <option value="4">아시아(그 외)</option>
                                <option value="5">러시아</option>
                                <option value="6">미국</option>
                                <option value="7">유럽</option>
                                <option value="8">기타</option>
                            </select>
                            <ul class="select hidden">
                                <li name="1">한국</li>
                                <li name="2">중국</li>
                                <li name="3">일본</li>
                                <li name="4">아시아(그 외)</li>
                                <li name="5">러시아</li>
                                <li name="6">미국</li>
                                <li name="7">유럽</li>
                                <li name="8">기타</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="location3">캐스팅 선호 지역</label>
                            <select name="location3" id="location3" class="required">
                                <option value selected>선택하세요</option>
                                <option value="1">국내 외 전체</option>
                                <option value="2">국내 전체</option>
                                <option value="3">서울·수도권</option>
                                <option value="4">강원</option>
                                <option value="5">경상</option>
                                <option value="6">전라</option>
                                <option value="7">충청</option>
                                <option value="8">제주</option>
                            </select>
                            <ul class="select hidden">
                                <li name="1">국내 외 전체</li>
                                <li name="2">국내 전체</li>
                                <li name="3">서울·수도권</li>
                                <li name="4">강원</li>
                                <li name="5">경상</li>
                                <li name="6">전라</li>
                                <li name="7">충청</li>
                                <li name="8">제주</li>
                            </ul>
                        </div>
                    </div>
                    <div class="group career">
                        <h2>경력 경험 선택</h2>
                        <p class="explanation">선택사항이며, 최대 5개까지 선택 가능합니다</p>
                        <div class="form-group">
                            <ul>
                                <li class="no-left">
                                    <label class="strong">기업</label>
                                </li>
                                <li>
                                    <label for="busi01" class="lhsmall">신년회<br/>송년회</label>
                                    <input type="checkbox" id="busi01" name="career[]" class="dont-show" value="1"/>
                                </li>
                                <li>
                                    <label for="busi02" class="lhsmall">MT<br/>워크샵</label>
                                    <input type="checkbox" id="busi02" name="career[]" class="dont-show" value="2"/>
                                </li>
                                <li>
                                    <label for="busi03" class="lhsmall">기업내부<br/>행사</label>
                                    <input type="checkbox" id="busi03" name="career[]" class="dont-show" value="3"/>
                                </li>
                                <li class="no-right">
                                    <label for="busi04" class="lhsmall">기업대상<br/>강의</label>
                                    <input type="checkbox" id="busi04" name="career[]" class="dont-show" value="4"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">학교</label>
                                </li>
                                <li>
                                    <label for="school01" class="lhsmall">오리엔<br/>테이션</label>
                                    <input type="checkbox" id="school01" name="career[]" class="dont-show" value="5"/>
                                </li>
                                <li>
                                    <label for="school03" class="lhsmall">입학<br/>졸업식</label>
                                    <input type="checkbox" id="school03" name="career[]" class="dont-show" value="7"/>
                                </li>
                                <li>
                                    <label for="school02">대학축제</label>
                                    <input type="checkbox" id="school02" name="career[]" class="dont-show" value="6"/>
                                </li>
                                <li class="no-right">
                                    <label for="school04" class="lhsmall">대학교<br/>강연</label>
                                    <input type="checkbox" id="school04" name="career[]" class="dont-show" value="8"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">가족</label>
                                </li>
                                <li>
                                    <label for="family01">결혼식</label>
                                    <input type="checkbox" id="family01" name="career[]" class="dont-show" value="9"/>
                                </li>
                                <li>
                                    <label for="family02" class="lhsmall">백일<br/>돌잔치</label>
                                    <input type="checkbox" id="family02" name="career[]" class="dont-show" value="10"/>
                                </li>
                                <li>
                                    <label for="family03" class="lhsmall">환갑<br/>칠순잔치</label>
                                    <input type="checkbox" id="family03" name="career[]" class="dont-show" value="11"/>
                                </li>
                                <li class="no-right no-pointer">
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">커플</label>
                                </li>
                                <li>
                                    <label for="couple03">이벤트</label>
                                    <input type="checkbox" id="couple03" name="career[]" class="dont-show" value="14"/>
                                </li>
                                <li>
                                    <label for="couple02">프로포즈</label>
                                    <input type="checkbox" id="couple02" name="career[]" class="dont-show" value="13"/>
                                </li>
                                <li>
                                    <label for="couple01">약혼식</label>
                                    <input type="checkbox" id="couple01" name="career[]" class="dont-show" value="12"/>
                                </li>
                                <li class="no-right">
                                    <label for="couple04">피로연</label>
                                    <input type="checkbox" id="couple04" name="career[]" class="dont-show" value="15"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">기타</label>
                                </li>
                                <li>
                                    <label for="etc01" class="lhsmall">축제<br/>행사</label>
                                    <input type="checkbox" id="etc01" name="career[]" class="dont-show" value="16"/>
                                </li>
                                <li>
                                    <label for="etc02">파티</label>
                                    <input type="checkbox" id="etc02" name="career[]" class="dont-show" value="21"/>
                                </li>
                                <li class="no-right">
                                    <label for="etc04">화보</label>
                                    <input type="checkbox" id="etc04" name="career[]" class="dont-show" value="22"/>
                                </li>
                                <li class="no-right">
                                    <label for="etc09">패션쇼</label>
                                    <input type="checkbox" id="etc09" name="career[]" class="dont-show" value="20"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label for="etc05">모터쇼</label>
                                    <input type="checkbox" id="etc05" name="career[]" class="dont-show" value="18"/>
                                </li>
                                <li>
                                    <label for="etc08">시상식</label>
                                    <input type="checkbox" id="etc08" name="career[]" class="dont-show" value="24"/>
                                </li>
                                <li>
                                    <label for="etc06">사진전</label>
                                    <input type="checkbox" id="etc06" name="career[]" class="dont-show" value="19"/>
                                </li>
                                <li>
                                    <label for="etc03">박람회</label>
                                    <input type="checkbox" id="etc03" name="career[]" class="dont-show" value="17"/>
                                </li>
                                <li>
                                    <label for="etc07">홈쇼핑</label>
                                    <input type="checkbox" id="etc07" name="career[]" class="dont-show" value="23"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="group cost">
                        <div class="form-group">
                            <label for="casting-cost" class="title">평균 캐스팅 비용</label>
                            <select class="required" name="casting-cost" id="casting-cost">
                                <option selected value>비용 선택(건당)</option>
                                <option value="cost1">0 ~ 30만원</option>
                                <option value="cost2">30 ~ 50만원</option>
                                <option value="cost3">50 ~ 100만원</option>
                                <option value="cost4">100 ~ 200만원</option>
                                <option value="cost5">200 ~ 500만원</option>
                                <option value="cost6">500만원 이상</option>
                            </select>
                            <ul class="select hidden">
                                <li name="cost1">0 ~ 30만원</li>
                                <li name="cost2">30 ~ 50만원</li>
                                <li name="cost3">50 ~ 100만원</li>
                                <li name="cost4">100 ~ 200만원</li>
                                <li name="cost5">200 ~ 500만원</li>
                                <li name="cost6">500만원 이상</li>
                            </ul>
                            <p class="explanation">캐스팅 비용은 헤이캐스팅 내의 참고 정보로 활용되며, 프로필에는 노출되지 않습니다.(수정 가능)</p>
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="user-intro" class="title">한줄 소개</label>
                            <input type="text" id="user-intro" maxlength="20" name="user-intro" placeholder="메인에 노출되는 대표 문구입니다(최대 20자)" class="required intro" autocomplete="Off"/>
                        </div>
                    </div>
                    <div class="group additional">
                        <h2>추가 작성</h2>
                        <div class="form-group">
                            <label for="detail-intro" class="sub-title">상세 소개<a class="toggle-folder" href="#"><i class="fa fa-angle-down" aria-hidden="true"></i>작성</a></label>
                            <textarea id="detail-intro" name="detail-intro" class="intro hidden" placeholder="(100자 이내)" maxlength="100"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="spec-intro" class="sub-title">경력 및 수상 내역<a class="toggle-folder" href="#"><i class="fa fa-angle-down" aria-hidden="true"></i>작성</a></label>
                            <table class="hidden">
                                <tr>
                                    <th>날짜</th>
                                    <th>주요내용</th>
                                    <th>내용</th>
                                </tr>
                                <tr class="items">
                                    <td><input type="text" id="spec-intro" name="spec-intro1[]" class="intro digits spec" placeholder="ex)2017" disabled autocomplete="Off"/></td>
                                    <td><input type="text" name="spec-intro2[]" class="intro spec" placeholder="부산영화제" disabled autocomplete="Off"/></td>
                                    <td><input type="text" name="spec-intro3[]" class="intro spec" disabled autocomplete="Off"/></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="long"><a href="#" class="btn add-items spec"><img src="/img/icon_plus_contents.png" class="icon" alt=""/></i>수상/경력 추가하기</a><a href="#" class="delete"><img src="/img/icon_delete_contents.png" alt="삭제"/>삭제</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="group sns">
                        <div class="form-group">
                            <label for="social_select" class="title">SNS 주소</label>
                            <select name="social_select" id="social_select">
                                <option selected value>SNS 추가</option>
                                <option value="instagram">인스타그램</option>
                                <option value="facebook">페이스북</option>
                                <option value="blog">블로그</option>
                                <option value="twitter">트위터</option>
                                <option value="youtube">유투브</option>
                            </select>
                            <ul class="select hidden sns">
                                <li name="instagram">인스타그램</li>
                                <li name="facebook">페이스북</li>
                                <li name="blog">블로그</li>
                                <li name="twitter">트위터</li>
                                <li name="youtube">유투브</li>
                            </ul>
                            <div id="social_instagram" class="hidden">
                                <label for="social_instagram" class="icon"><i class="fa fa-instagram" aria-hidden="true"></i> <span>https://www.instagram.com/</span></label>
                                <input type="text" name="social_instagram" autocomplete="Off"/>
                                <a href="#" class="delete"><img src="/img/icon_delete_contents.png" alt="삭제"/></a>
                            </div>
                            <div id="social_facebook" class="hidden">
                                <label for="social_facebook" class="icon"><i class="fa fa-facebook" aria-hidden="true"></i> <span>https://www.facebook.com/</span></label>
                                <input type="text" name="social_facebook" autocomplete="Off"/>
                                <a href="#" class="delete"><img src="/img/icon_delete_contents.png" alt="삭제"/></a>
                            </div>
                            <div id="social_blog" class="hidden">
                                <label for="social_blog" class="icon"><i class="fa fa-star" aria-hidden="true"></i> <span>http://blog.naver.com/</span></label>
                                <input type="text" name="social_blog" autocomplete="Off"/>
                                <a href="#" class="delete"><img src="/img/icon_delete_contents.png" alt="삭제"/></a>
                            </div>
                            <div id="social_twitter" class="hidden">
                                <label for="social_twitter" class="icon"><i class="fa fa-twitter" aria-hidden="true"></i> <span>https://twitter.com/</span></label>
                                <input type="text" name="social_twitter" autocomplete="Off"/>
                                <a href="#" class="delete"><img src="/img/icon_delete_contents.png" alt="삭제"/></a>
                            </div>
                            <div id="social_youtube" class="hidden">
                                <label for="social_youtube" class="icon"><i class="fa fa-youtube-play" aria-hidden="true"></i> <span>https://www.youtube.com/channel/</span></label>
                                <input type="text" name="social_youtube" autocomplete="Off"/>
                                <a href="#" class="delete"><img src="/img/icon_delete_contents.png" alt="삭제"/></a>
                            </div>
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
    <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="jquery.picture.cut/src/jquery.picture.cut.js"></script>
    <script>
        $('div#profile_image').PictureCut({
            InputOfImageDirectory       : "image",
            PluginFolderOnServer        : "/jquery.picture.cut/",
            FolderOnServer              : "/uploads/",
            EnableCrop                  : true,
            CropWindowStyle             : "Bootstrap"
        });
    </script> 
@endsection