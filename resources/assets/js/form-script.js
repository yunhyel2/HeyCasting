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


    