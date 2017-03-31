//Device height에 맞추기
    function sizeMatching(){
        $winHeight = $(window).height();
        $('body').css('height', $winHeight);
        if( $winHeight < 800 ){
            $('div.join-form').css('margin', '0 auto');
            $('form[name="join-form"]').not('.complete').css('height', $winHeight-47+'px' );
            $('form[name="join-form"].complete').css('height', $winHeight+5+'px' );
        }else{
            $('div.join-form').css('margin', '5% auto');  
            $marginTop = $('form[name="join-form"]').offset().top;
            $('form[name="join-form"]').not('.complete').css('height', $winHeight-(2*$marginTop)+47+'px' );
            $('form[name="join-form"].complete').css('height', $winHeight-(2*$marginTop)+'px' );
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
                            console.log(data);
                            if( confirm('다음 단계로 넘어가시겠습니까?') ){
                                $('div#user-contents').removeClass('hidden').parent().animate(
                                    { 
                                        left: '-100%'
                                    },{ 
                                        complete:function(){
                                            $('div#user-account').find('input.next').remove();
                                        }
                                    }
                                );
                                $('body.join').css('background', 'url("/img/background/03_back.jpg") no-repeat').css('background-size', 'cover');
                                $('nav.join-nav').find('li:first-child').removeClass('active').next().addClass('active');
                            }
                        }
                    },error:function(){

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
            $count = $('input[name="videos[]"]').length;
            if( $count < 3 ){
                $(this).prev('div.form-group').append('<div class="items bt-mrg"><input type="text" name="videos[]" id="video'+($count+1)+'" class="required no-pad" placeholder="Youtube 주소 입력"/><a href="#" class="preview">등록</a></div>');
                $(this).prev('div.form-group').find('ul.video').css('width', 160*($count+1)+'px');
                $(this).prev('div.form-group').find('ul.video li').eq($count).removeClass('hidden');
            }
        }else if( $(this).hasClass('spec') ){
            if( $('input[name="spec-intro1[]"]').length < 5 ){
                $(this).parents('tr').before('<tr class="items"><td><input type="text" name="spec-intro1[]" class="intro" placeholder="ex)2017"/></td><td><input type="text" name="spec-intro2[]" class="intro" placeholder="부산영화제"/></td><td><input type="text" name="spec-intro3[]" class="intro"/></td></tr>');
            }
        }
    });

//Delete item
    $(document).on('click', 'a.delete' , function(e){
        e.preventDefault();
        if( $(this).parent().parent().parent().hasClass('sns') ){
            $(this).parent().addClass('hidden');
            $name = $(this).prev().attr('name').replace('social_', '');
            $('ul.select').find('li[name="'+$name+'"]').removeClass('hidden');
        }else{
            console.log('onono');
        }
    });
//Folder item
    $('a.toggle-folder').on('click',function(){
        $(this).parent().next().toggleClass('hidden');
        if( $(this).find('i').hasClass('fa-angle-down') ){
            $(this).html('<i class="fa fa-angle-up" aria-hidden="true"></i>접기');
        }else{
            $(this).html('<i class="fa fa-angle-down" aria-hidden="true"></i>더보기');
        }
    });
//Select
    $('select').on('click', function(e){
        e.preventDefault();
        if( !$(this).hasClass('disable') ){
            $(this).toggleClass('active').next('ul.select').toggleClass('hidden');
        }
    });
    $('ul.select').on('click', 'li', function(){
        $value = $(this).attr('name');
        if( $(this).parent('ul.select').hasClass('sns') ){
            $('div#social_'+$value).removeClass('hidden');
            $(this).parent('ul.select').addClass('hidden').prev('select').removeClass('active');
            $(this).parent('ul.select').find('li[name="'+$value+'"]').addClass('hidden');
        }else{
            $(this).parent('ul.select').prev('select').find('option[value="'+$value+'"]').prop("selected", true);
            $(this).parent('ul.select').addClass('hidden').prev('select').removeClass('active');
            if( $(this).parent('ul.select').prev('select').attr('name') == 'user-job' ){
                $('select[name="user-job2"], select[name="user-job3"]').removeClass('disable');
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
                        $('select[name="user-job2"]').next('ul.select').html(msg); 
                    }, error:function(){

                    }
                }); 
                jQuery.ajax({ 
                    type:"POST", 
                    url:"/php/detailJob2_ul.php", 
                    data:"Name="+$this.val(), 
                    success:function(msg){ 
                        $('select[name="user-job3"]').next('ul.select').html(msg); 
                    }, error:function(){

                    }
                }); 
            }
            if( $(this).parent('ul.select').prev('select').attr('name') == 'user-job2' ){
                $selected = $(this).attr('name');
                $('select[name="user-job3"]').next('ul.select').children('li').not('[name="'+$selected+'"]').removeClass('hidden');
                $('select[name="user-job3"]').next('ul.select').find('li[name="'+$selected+'"]').addClass('hidden');
            }
            if( $(this).parent('ul.select').prev('select').attr('name') == 'user-job3' ){
                $selected = $(this).attr('name');
                $('select[name="user-job2"]').next('ul.select').children('li').not('[name="'+$selected+'"]').removeClass('hidden');
                $('select[name="user-job2"]').next('ul.select').find('li[name="'+$selected+'"]').addClass('hidden');
            }
        }
    });

//메인프로필
    $('div.preview.button').on('click', function(){
        $(this).next().click();
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
    $(document).on('focusout', 'input[name="videos[]"]', function(){
        $src = $(this).val().replace('=','/')
        if( $src=='' ){
            return false;
        }
        if( $src.indexOf('youtube') != -1 ){
            $imgSrc = $src.split('/');
            var i = $imgSrc.length;
            $preview = 'http://img.youtube.com/vi/'+$imgSrc[i-1]+'/0.jpg';       
            $('li[name="'+$(this).attr('id')+'"]').attr('style', 'background-image:url(\"'+$preview+'\"); background-size:cover;');
        }else{
            
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