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
                dataArr = $('input[type="email"]')  
                $.ajax({

                });
                if( confirm('다음 단계로 넘어가시겠습니까?') ){
                    $('div.step-wrap').animate(
                        { 
                            left: '-100%'
                        }
                    );
                }
            };
        }, 
        errorClass: 'error',
        errorElement: 'span',
        errorPlacement: function(error, element) {
            element.closest('div.form-group').addClass('error');
        }
    });

//Add items
    $('a.add-items').on('click', function(e){
        e.preventDefault();
        if( $(this).hasClass('video') ){
            $count = $('input[name="videos[]"]').length;
            if( $count < 3 ){
                $(this).prev('div.form-group').append('<div class="items bt-mrg"><input type="text" name="videos[]" class="required" placeholder="영상 주소 입력"/><a href="#" class="preview">등록</a></div>');
                $('div.preview-items ul li').eq($count).removeClass('hidden');
            }
        }else if( $(this).hasClass('photo') ){
            $count = $('input[name="photos[]"]').length;
            if( $count < 6 ){
                $(this).before('<input type="file" name="photos[]" class="required image items"/>');
                $('ul.photos-preview li').eq($count).removeClass('hidden');
            }
        }else if( $(this).hasClass('spec') ){
            if( $('input[name="spec-intro1[]"]').length < 5 ){
                $(this).parents('tr').before('<tr class="items"><td><input type="text" name="spec-intro1[]" class="intro" placeholder="ex)2017"/></td><td><input type="text" name="spec-intro2[]" class="intro" placeholder="부산영화제"/></td><td><input type="text" name="spec-intro3[]" class="intro"/></td></tr>');
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
                console.log('hihi');
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