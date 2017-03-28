@extends('layouts.app')

@section('content')
    <div class="join-form">
        <nav class="join-nav">
            <ul>
                <li class="active" name="user-account"><a href="#" onclick="return false;">계정 정보 입력</a></li>
                <li name="user-contents"><a href="#" onclick="return false;">컨텐츠 첨부</a></li>
                <li name="user-profile"><a href="#" onclick="return false;">프로필 작성</a></li>
            </ul>
        </nav>
        <form method="POST" name="join-form" class="join-form validate" action="{{ url('join-in') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="step-wrap">
                <div id="user-account" class="step hidden">
                    <div class="group">
                        <h2>일반 회원가입</h2>
                        <div class="form-group">
                            <label for="user-email" class="icon"><img src="/img/icon_mail_address.png" alt="" width="20px" height="auto"/></label>
                            <input type="email" name="user-email" id="user-email" class="required email" placeholder="이메일을 입력하세요"/>
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
                            <li><a href="#"><img src="/img/social_kakao.png" alt="카카오톡으로가입하기"/></a></li>
                            <li><a href="#"><img src="/img/social_google.png" alt="구글로가입하기"/></a></li>
                            <li><a href="#"><img src="/img/social_facebook.png" alt="페이스북으로가입하기"/></a></li>
                            <li><a href="#"><img src="/img/social_naver_line.png" alt="라인으로가입하기"/></a></li>
                        </ul>
                    </div>
                </div>
                <div id="user-contents" class="step">
                    <div class="group video">
                        <div class="form-group">
                            <label for="videos" class="title">활동 영상 첨부</label>
                            <p class="explanation">최소 2개 이상의 영상을 등록해주세요</p>
                            <div class="preview-items">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                            <div class="items">
                                <input type="text" name="videos[]" id="videos1" class="required" placeholder="영상 주소 입력"/>
                                <a href="#" class="preview">등록</a>
                            </div>
                            <div class="items">
                                <input type="text" name="videos[]" id="videos2" class="required" placeholder="영상 주소 입력"/>
                                <a href="#" class="preview">등록</a>
                            </div>
                        </div>
                        <a class="btn add-items"><img src="/img/icon_plus_contents.png" class="icon" alt=""/></i> 영상 추가 하기</a>
                    </div>
                    <div class="group main-profile">
                        <div class="form-group">
                            <label for="main-profile" class="title">메인 프로필 사진</label>
                            <p class="explanation">엔터테이너 리스트에 노출되는 대표 사진입니다</p>
                            <div class="preview button">메인 사진 등록</div>
                            <input type="file" name="main-profile" id="main-profile" class="required image dont-show"/>
                        </div>
                    </div>
                    <div class="group photos">
                        <div class="form-group">
                            <label for="photos" class="title">추가 프로필 사진</label>
                            <p class="explanation">최대 6개까지 등록 가능합니다</p>
                            <div class="preview button small"><a href="#"><img src="/img/icon_plus_contents.png"/></a></div>
                            <input type="file" name="photos" id="photos" class="required image dont-show"/>
                        </div>
                    </div>
                    <div class="group user" id="user-profile">
                        <div class="form-group">
                            <label for="user-info" class="title">개인정보</label>
                            <p class="explanation">실명과 핸드폰 번호를 적어주세요.</p>
                            <label for="user-name" class="icon">이름</label>
                            <input type="text" name="user-name" id="user-name" class="required"/>
                        </div>
                        <div class="form-group">
                            <label for="user-phone" class="icon">연락처</label>
                            <input type="text" name="user-phone" id="user-phone" class="required"/>
                        </div>
                    </div>
                    <div class="group">
                        <h2>직군선택</h2>
                        <div class="form-group">
                            <select class="required" name="user-job" id="user-job">
                                <option selected disabled value>선택하세요</option>
                                <option value="사회자">MC/사회자</option>
                                <option value="가수">가수</option>
                                <option value="연기자">연기자</option>
                                <option value="연주자">연주자</option>
                                <option value="퍼포먼스">퍼포먼스</option>
                                <option value="모델">모델</option>
                                <option value="크리에이터">크리에이터</option>
                                <option value="기타아티스트">기타아티스트</option>
                            </select>
                            <select class="half required" name="user-job2">
                                <option selected disabled value>세부분야</option>
                            </select>
                            <select class="half required selectpicker" name="user-job3">
                                <option selected disabled value>세부분야</option>
                            </select>
                            <script type="text/javascript"> 
                                $(document).ready(function(){ 
                                    $('select[name="user-job"]').change(function(){ 
                                        $this = $(this);
                                        jQuery.ajax({ 
                                            type:"POST", 
                                            url:"/php/detailJob.php", 
                                            data:"Name="+$(this).val(), 
                                            success:function(msg){ 
                                                $this.next().html(msg); 
                                            }, error:function(){

                                            }
                                        });
                                        jQuery.ajax({ 
                                            type:"POST", 
                                            url:"/php/detailJob2.php", 
                                            data:"Name="+$(this).val(), 
                                            success:function(msg){ 
                                                $this.next().next().html(msg); 
                                            }, error:function(){

                                            }
                                        }); 
                                    }); 
                                }); 
                            </script> 
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="user-gender" class="title">성별</label>
                            <span class="left-mrg">
                                <input type="radio" name="gender" id="male" value="male" class="required dont-show"/>
                                <label for="male">남</label>
                            </span>
                            <span>
                                <input type="radio" name="gender" id="female" value="female" class="required dont-show"/>
                                <label for="female">여</label>
                            </span>
                            <span>
                                <input type="radio" name="gender" id="all" value="all" class="required dont-show"/>
                                <label for="all">남여모두</label>
                            </span>
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="user-team" class="title">팀 여부 선택</label>
                            <span class="left-mrg">
                                <input type="radio" name="team" id="no-team" value="no-team" class="required dont-show"/>
                                <label for="no-team">개인</label>
                            </span>
                            <span>
                                <input type="radio" name="team" id="team" value="team" class="required dont-show"/>
                                <label for="team">팀</label>       
                            </span>                 
                        </div>
                    </div>
                    <div class="group">
                        <h2>나이대 (평균)</h2>
                        <div class="form-group">
                            <select name="user-age" id="user-age" class="required">
                                <option value disabled selected>선택하세요</option>
                                <option value="10s">10대</option>
                                <option value="20s">20대</option>
                                <option value="30s">30대</option>
                                <option value="40s">40대</option>
                            </select>
                        </div>
                    </div>
                    <div class="group career">
                        <h2>경력 경험 선택</h2>
                        <div class="form-group">
                            <ul>
                                <li class="no-left">
                                    <label class="strong">기업</label>
                                </li>
                                <li>
                                    <label for="busi01" class="lhsmall">신년회<br/>송년회</label>
                                    <input type="checkbox" id="busi01" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="busi02" class="lhsmall">MT<br/>워크샵</label>
                                    <input type="checkbox" id="busi02" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="busi03" class="lhsmall">기업내부<br/>행사</label>
                                    <input type="checkbox" id="busi03" name="career" class="dont-show"/>
                                </li>
                                <li class="no-right">
                                    <label for="busi04" class="lhsmall">기업대상<br/>강의</label>
                                    <input type="checkbox" id="busi04" name="career" class="dont-show"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">학교</label>
                                </li>
                                <li>
                                    <label for="school01" class="lhsmall">오리엔<br/>테이션</label>
                                    <input type="checkbox" id="school01" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="school02">축제</label>
                                    <input type="checkbox" id="school02" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="school03" class="lhsmall">입학<br/>졸업식</label>
                                    <input type="checkbox" id="school03" name="career" class="dont-show"/>
                                </li>
                                <li class="no-right">
                                    <label for="school04" class="lhsmall">대학교<br/>강연</label>
                                    <input type="checkbox" id="school04" name="career" class="dont-show"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">가족</label>
                                </li>
                                <li>
                                    <label for="family01">결혼식</label>
                                    <input type="checkbox" id="family01" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="family02" class="lhsmall">돌잔치<br/>백일</label>
                                    <input type="checkbox" id="family02" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="family03" class="lhsmall">환갑<br/>칠순잔치</label>
                                    <input type="checkbox" id="family03" name="career" class="dont-show"/>
                                </li>
                                <li class="no-right no-pointer">
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">커플</label>
                                </li>
                                <li>
                                    <label for="couple01">약혼식</label>
                                    <input type="checkbox" id="couple01" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="couple02">프로포즈</label>
                                    <input type="checkbox" id="couple02" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="couple03">이벤트</label>
                                    <input type="checkbox" id="couple03" name="career" class="dont-show"/>
                                </li>
                                <li class="no-right">
                                    <label for="couple04">피로연</label>
                                    <input type="checkbox" id="couple04" name="career" class="dont-show"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label class="strong">기타</label>
                                </li>
                                <li>
                                    <label for="etc01" class="lhsmall">축제<br/>행사</label>
                                    <input type="checkbox" id="etc01" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="etc02">파티</label>
                                    <input type="checkbox" id="etc02" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="etc03">박람회</label>
                                    <input type="checkbox" id="etc03" name="career" class="dont-show"/>
                                </li>
                                <li class="no-right">
                                    <label for="etc04">화보</label>
                                    <input type="checkbox" id="etc04" name="career" class="dont-show"/>
                                </li>
                            </ul>
                            <ul>
                                <li class="no-left">
                                    <label for="etc05">모터쇼</label>
                                    <input type="checkbox" id="etc05" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="etc06">사진전</label>
                                    <input type="checkbox" id="etc06" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="etc07">홈쇼핑</label>
                                    <input type="checkbox" id="etc07" name="career" class="dont-show"/>
                                </li>
                                <li>
                                    <label for="etc08">시상식</label>
                                    <input type="checkbox" id="etc08" name="career" class="dont-show"/>
                                </li>
                                <li class="no-right">
                                    <label for="etc09">패션쇼</label>
                                    <input type="checkbox" id="etc09" name="career" class="dont-show"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="group cost">
                        <div class="form-group">
                            <label for="casting-cost" class="title">캐스팅 비용</label>
                            <p class="explanation">비용 기준을 공개하면 더 빠른 캐스팅에 도움이 됩니다</p>
                            <span class="left label">최소</span>
                            <span class="right label">만원 기준</span>
                            <input type="text" id="casting-cost" maxlength="10" style="text-align:right" name="casting-cost" class="digits"/>
                            <input type="checkbox" name="cost-secret" id="cost-secret" class="dont-show" value="on"/>
                            <label for="cost-secret">캐스팅 비용 비공개</label>
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="user-intro" class="title">한줄 소개</label>
                            <input type="text" id="user-intro" maxlength="20" name="user-intro" placeholder="메인에 노출되는 대표 문구입니다(최대 20자)" class="required intro"/>
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
@endsection