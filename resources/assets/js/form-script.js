//Device height에 맞추기
    function sizeMatching(){
        $winHeight = $(window).height();
        $('body').css('height', $winHeight);
        if( $winHeight < 800 ){
            $('div.join-form').css('margin', '0 auto');
            $('form[name="join-form"]').not('.complete').css('height', $winHeight-47+'px' );
            $('form[name="join-form"].complete').css('height', $winHeight+5+'px' );
            $('div.docu-wrap').css('margin-top', 0).css('top', '0').find('a.close').addClass('inner');
        }else{
            $('div.join-form').css('margin', '80px auto');  
            $marginTop = $('form[name="join-form"]').offset().top;
            $('form[name="join-form"]').not('.complete').css('height', $winHeight-160-47+'px' );
            $('form[name="join-form"].complete').css('height', $winHeight-160+'px' );
            $('div.docu-wrap').css('margin-top', '-400px').css('top', '50%').find('a.close').removeClass('inner');
        }
    };
    sizeMatching();
    $(window).on('resize', sizeMatching);
    

//Next button
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    $('form.validate').validate({
        rules: {
            password: "required",
            passwordConf: {
                equalTo: "#password"
            }
        },   
        submitHandler: function(form) {
            // do other things for a valid form
            if( $('nav.join-nav').find('li[name="user-profile"]').hasClass('active') ){
                if( confirm('등록하시겠습니까?') ){
                    form.submit();
                };
            }else if( $('nav.join-nav').find('li:first-child').hasClass('active') ){
                var dataArr = { email : $('input#user-email').val() }
                $.ajaxSetup({
                        headers:{
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                    });
                $.ajax({
                    type:'POST',
                    url:'/join_check',
                    data:dataArr,
                    success:function(data){
                        if( data != 0 ){
                            alert('이미 존재하는 이메일입니다!');
                            return false;
                        }else{
                            if( confirm('다음 단계로 넘어가시겠습니까?') ){
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
                        }
                    },error:function(request,status,error){
                        console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    }
                });
            };
        }, 
        errorClass: 'error',
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if( !element.parents('div.form-group').find('label:first-child').hasClass('title') ){
                element.closest('div.group').find('h2').append(error);
            }else{
                element.closest('div.form-group').find('label.title').append(error);
            };
            if( element.attr('name') == 'agree' ){
                element.next('label').append(error);
            };
            if( element.attr('name') == 'agree' ){
                element.next('label').append(error);
            };
        }
    });
//Scroll에 따라 프로필작성ON && 배경
    $('form[name="join-form"]').on('scroll', function(){
        if( $('li[name="user-account"]').hasClass('active') ){
            return false;
        }
        var $scroll = $("div#user-profile").offset().top;
        if( $scroll < 200 ){
            $('nav.join-nav').find('li:last-child').addClass('active').prev().removeClass('active');
            $('body').css('background', 'url("/img/background/04_back.jpg") no-repeat').css('background-size', 'cover');
        }else{
            $('nav.join-nav').find('li:last-child').removeClass('active').prev().addClass('active');
            $('body').css('background', 'url("/img/background/03_back.jpg") no-repeat').css('background-size', 'cover');
        }
    });
//Add items
    $('a.add-items').on('click', function(e){
        e.preventDefault();
        if( $(this).hasClass('video') ){
            $count = $('div.video div.items:not(.hidden)').length;
            $(this).prev('div.form-group').find('ul.video').css('width', 160*($count+1)+'px');
            if( $('div.items[name="video3"]').hasClass('hidden') ){
                $(this).prev('div.form-group').find('div.items[name="video'+ ($count+1) +'"]').removeClass('hidden');
                $(this).prev('div.form-group').find('ul.video li[name="video'+ ($count+1) +'"]').removeClass('hidden');
            }else{
                $(this).prev('div.form-group').find('div.items[name="video2"]').removeClass('hidden');
                $(this).prev('div.form-group').find('ul.video li[name="video2"]').removeClass('hidden');
            }
        }else if( $(this).hasClass('spec') ){
            if( $('input[name="spec-intro1[]"]').length < 5 ){
                $(this).parents('tr').before('<tr class="items"><td><input type="text" id="spec-intro" name="spec-intro1[]" class="intro digits spec" placeholder="ex)2017" autocomplete="Off"/></td><td><input type="text" name="spec-intro2[]" class="intro spec" placeholder="부산영화제" autocomplete="Off"/></td><td><input type="text" name="spec-intro3[]" class="intro spec" autocomplete="Off"/></td></tr>');
            }
        }
    });

//Delete item
    $(document).on('click', 'a.delete' , function(e){
        e.preventDefault();
        if( $(this).parent().parent().parent().hasClass('sns') ){
            $(this).parent().addClass('hidden').find('input').val('');
            $name = $(this).prev().attr('name').replace('social_', '');
            $('ul.select').find('li[name="'+$name+'"]').removeClass('hidden');
        }else if( $(this).parent().parent().parent().hasClass('video') ){
            $count = $('input[name="videos[]"]').length;
            $nth = $(this).parent().index('div.items');
            $(this).parent().find('a.change').html('직접등록').next().removeClass('hidden').next().addClass('hidden').val('');
            $(this).closest('div.form-group').find('ul.video').css('width', 160*($count-1)+'px');
            $(this).closest('div.form-group').find('ul.video li:nth-child(' + ($nth+1) + ')').addClass('hidden');
            $(this).closest('div.form-group').find('ul.video li:nth-child(' + ($nth+1) + ') video').remove();
            $(this).parent().addClass('hidden');
        }else{
            if( $('input[name="spec-intro1[]"]').length > 1 ){
                $(this).closest('tr').prev().remove();
            }
        }
    });
//Folder item
    $('a.toggle-folder').on('click',function(){
        $(this).parent().next().toggleClass('hidden');
        if( $(this).find('i').hasClass('fa-angle-down') ){
            $(this).html('<i class="fa fa-angle-up" aria-hidden="true"></i>취소');
            if( $(this).parent().next().is('textarea') ){
                $(this).parent().next().empty().removeAttr('disabled');
            }else{
                $('input.spec').removeAttr('disabled');
            }
        }else{
            $(this).html('<i class="fa fa-angle-down" aria-hidden="true"></i>작성');
            if( $(this).parent().next().is('textarea') ){
                $(this).parent().next().attr('disabled','disabled');
            }else{
                $('input.spec').attr('disabled','disabled');
            }
        }
    });
//Select
    $('div.selected').on('click', function(){
        if( !$(this).prev('select').hasClass('disable') ){
            $(this).toggleClass('active').next('ul.select').toggleClass('hidden');
        }
    });
    // $('select').on('click', function(e){
    //     //e.preventDefault();
    //     if( !$(this).hasClass('disable') ){
    //         $(this).toggleClass('active').next('ul.select').toggleClass('hidden');
    //     }
    // });
    $('ul.select').on('click', 'li', function(){
        $value = $(this).attr('name');
        if( $(this).parent('ul.select').hasClass('sns') ){
            $('div#social_'+$value).removeClass('hidden');
            $(this).parent('ul.select').addClass('hidden').prev().removeClass('active');
            $(this).parent('ul.select').find('li[name="'+$value+'"]').addClass('hidden');
        }else{
            $data = $(this).parent('ul.select').prev().prev('select').find('option[value="'+$value+'"]').html();
            $(this).parent('ul.select').prev('div.selected').html($data);
            $(this).parent('ul.select').prev().prev('select').find('option[value="'+$value+'"]').prop("selected", true);
            $(this).parent('ul.select').addClass('hidden').prev().removeClass('active');
            if( $(this).parent('ul.select').prev().prev('select').attr('name') == 'user-job' ){
                if( $(this).attr('name') !== '기타 아티스트' ){
                    $('select[name="user-job2"], select[name="user-job3"]').removeClass('disable');
                }else{
                    $('select[name="user-job2"]').removeClass('disable');
                    $('select[name="user-job3"]').addClass('disable');
                }
                //jquery
                $this = $('select[name="user-job"]');
                jQuery.ajax({ 
                    type:"POST", 
                    url:"/php/detailJob.php", 
                    data:"Name="+$this.val(), 
                    success:function(msg){ 
                        $('select[name="user-job2"]').html(msg);
                    }, error:function(){

                    }
                });
                jQuery.ajax({ 
                    type:"POST", 
                    url:"/php/detailJob2.php", 
                    data:"Name="+$this.val(), 
                    success:function(msg){ 
                        $('select[name="user-job3"]').html(msg); 
                    }, error:function(){

                    }
                }); 
                jQuery.ajax({ 
                    type:"POST", 
                    url:"/php/detailJob_ul.php", 
                    data:"Name="+$this.val(), 
                    success:function(msg){ 
                        $('select[name="user-job2"]').next().next('ul.select').html(msg); 
                    }, error:function(){

                    }
                }); 
                jQuery.ajax({ 
                    type:"POST", 
                    url:"/php/detailJob2_ul.php", 
                    data:"Name="+$this.val(), 
                    success:function(msg){ 
                        $('select[name="user-job3"]').next().next('ul.select').html(msg); 
                    }, error:function(){

                    }
                }); 
            }
            if( $(this).parent('ul.select').prev().prev('select').attr('name') == 'user-job2' ){
                $selected = $(this).attr('name');
                $('select[name="user-job3"]').next().next('ul.select').children('li').not('[name="'+$selected+'"]').removeClass('hidden');
                $('select[name="user-job3"]').next().next('ul.select').find('li[name="'+$selected+'"]').addClass('hidden');
            }
            if( $(this).parent('ul.select').prev().prev('select').attr('name') == 'user-job3' ){
                $selected = $(this).attr('name');
                $('select[name="user-job2"]').next().next('ul.select').children('li').not('[name="'+$selected+'"]').removeClass('hidden');
                $('select[name="user-job2"]').next().next('ul.select').find('li[name="'+$selected+'"]').addClass('hidden');
            }
        }
    });

//이미지Preview
    $(document).on('change', 'input[type="file"].image', function(e){
        if ($(this).val()!="") {
            //확장자 확인
            var ext = $(this).val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                alert('gif,png,jpg,jpeg 파일만 업로드 할수 있습니다.');
                return;
            }
            if( $(this).attr('name') == 'main-profile' ){
                var reader = new FileReader();
                reader.onload = function (event) {
                    $('div.preview.button').attr('style', 'background:url('+event.target.result+') center no-repeat;background-size:cover;').html('');
                };
            }else{
                $nth = $(this).index('input[name="photos[]"]');
                var reader = new FileReader();
                reader.onload = function (event) {
                    var img = new Image();
                        $('ul.photos-preview li:nth-child('+($nth+1)+')').attr('style', 'background:url('+event.target.result+') center no-repeat;background-size:cover;');
                };
            }
            reader.readAsDataURL(this.files[0]);
            return false;
        }else{
            if( $(this).attr('name') == 'main-profile' ){
                $('div.preview.button').removeAttr('style').html('메인 사진 등록');
            }else{
                $('ul.photos-preview li:nth-child('+($nth+1)+')').removeAttr('style');
            }
        }
    });
//VideoPreview
    $(document).on('click' , 'a.change.btn' , function(e){
        e.preventDefault();
        if( $(this).html() == '직접등록' ){
            $(this).parent().find('input[type="file"]').removeClass('hidden').removeAttr('disabled').prev().addClass('hidden').attr('disabled', 'disabled');
            $(this).html('주소입력');
            $nth = $(this).next().index('input[name="videos[]"]');
            $('div.video div.preview-items li:nth-child('+($nth+1)+')').append('<video name="video'+($nth+1)+'" controls autoplay></video>');
        }else{
            $(this).parent().find('input[type="file"]').addClass('hidden').attr('disabled', 'disabled').prev().removeClass('hidden').removeAttr('disabled');
            $(this).html('직접등록');
            $nth = $(this).next().index('input[name="videos[]"]');
            $('div.video div.preview-items li:nth-child('+($nth+1)+')').html('');
        }
    });

    (function localFileVideoPlayer() {
        var URL = window.URL || window.webkitURL
        var playSelectedFile1 = function (event) {
            var file = this.files[0]
            var type = file.type
            var videoNode = document.querySelector('video[name="video1"]')
            var canPlay = videoNode.canPlayType(type)
            if (canPlay === '') canPlay = 'no'
            var message = 'Can play type "' + type + '": ' + canPlay
            var isError = canPlay === 'no'

            if (isError) {
                alert('지원하지 않는 확장자입니다!');
                return
            }

            var fileURL = URL.createObjectURL(file)
            videoNode.src = fileURL
        }  
        var playSelectedFile2 = function (event) {
            var file = this.files[0]
            var type = file.type
            var videoNode = document.querySelector('video[name="video2"]')
            var canPlay = videoNode.canPlayType(type)
            if (canPlay === '') canPlay = 'no'
            var message = 'Can play type "' + type + '": ' + canPlay
            var isError = canPlay === 'no'

            if (isError) {
                alert('지원하지 않는 확장자입니다!');
                return
            }

            var fileURL = URL.createObjectURL(file)
            videoNode.src = fileURL
        }  
        var playSelectedFile3 = function (event) {
            var file = this.files[0]
            var type = file.type
            var videoNode = document.querySelector('video[name="video3"]')
            var canPlay = videoNode.canPlayType(type)
            if (canPlay === '') canPlay = 'no'
            var message = 'Can play type "' + type + '": ' + canPlay
            var isError = canPlay === 'no'

            if (isError) {
                alert('지원하지 않는 확장자입니다!');
                return
            }

            var fileURL = URL.createObjectURL(file)
            videoNode.src = fileURL
        }  
        var inputNode1 = document.querySelector('input#videoDirect1');
        var inputNode2 = document.querySelector('input#videoDirect2');
        var inputNode3 = document.querySelector('input#videoDirect3');
        inputNode1.addEventListener('change', playSelectedFile1, false)
        inputNode2.addEventListener('change', playSelectedFile2, false)
        inputNode3.addEventListener('change', playSelectedFile3, false)
    })();

    $(document).on('focusout', 'input[name="videos[]"]', function(){
        $src = $(this).val().replace('=','/')
        if( $src=='' ){
            $('li[name="'+$(this).attr('id')+'"]').attr('style', 'background:none;');
            return false;
        }
        if( $src.indexOf('youtube') != -1 ){
            $imgSrc = $src.split('/');
            var i = $imgSrc.length;
            $preview = 'http://img.youtube.com/vi/'+$imgSrc[i-1]+'/0.jpg';       
            $('li[name="'+$(this).attr('id')+'"]').attr('style', 'background-image:url(\"'+$preview+'\"); background-size:cover; background-position:center;');
        }else{
            $('li[name="'+$(this).attr('id')+'"]').attr('style', 'background:none;');
        }
    });
//경력경험선택
    $('div.group.career label:not(.strong)').on('click', function(e){
        if( $('input[name="career"]:checked').length < 5 ){
            if( !$(this).parent('li').hasClass('active') ){
                $(this).parent('li').addClass('active');
            }else{
                $(this).parent('li').removeClass('active');
            }
        }else{
            e.preventDefault();
            if( $(this).parent('li').hasClass('active') ){
                $(this).parent('li').removeClass('active');
                $(this).next().prop('checked', false);
            }
        };
        
    })
//이용약관
    $('label[for="agree"] a').on('click', function(){
        $name = $(this).attr('name');
        $('div#'+$name).removeClass('hidden').siblings('div.cover').removeClass('hidden');
    });
    $('div.cover, a.close').on('click', function(){
        $('div.docu-wrap').scrollTop(0).addClass('hidden');
        $('div.cover').addClass('hidden');
    });

//Not-ready
    $('a.not-ready').click(function(e){
        e.preventDefault();
        alert('준비중입니다!');
    });
    
//Input FileCheck
    //업로드 체크 
    function fileCheck(fileValue)
    {
        //확장자 체크
        var src = getFileType(fileValue);
        if(!(src.toLowerCase() == "zip"))
        {
            alert("zip 파일로 압축하여 첨부해주세요.");
            return;
        }
        //사이즈체크
        var maxSize  = 31457280    //30MB
        var fielSize = Math.round(fileValue.fileSize);
        if(fileSize > maxSize)
        {
            alert("첨부파일 사이즈는 30MB 이내로 등록 가능합니다.    ");
            return;
        }
        form.submit();
    }
    
    //파일 확장자 확인
    function getFileType(filePath)
    {
        var index = -1;
            index = filePath.lastIndexOf('.');
        var type = "";
        if(index != -1)
        {
            type = filePath.substring(index+1, filePath.len);
        }
        else
        {
            type = "";
        }
        return type;
    }
