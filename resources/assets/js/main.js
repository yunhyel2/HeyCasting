//반응형Nav
    $('nav#main-nav a.tabmenu').on('click', function(){
        $(this).closest('ul').next().toggleClass('hidden');
    });
//Slide
    $('div#main-slide nav.arrow a').on('click',function(e){
        //PreventDoubleClick
        e.preventDefault();
        if (!$(this).data('isClicked')) {
            var link = $(this);
            // successful click
            mainSlide(this);
            // Set the isClicked value and set a timer
            link.data('isClicked', true);
            setTimeout(function() {
            link.removeData('isClicked')
            }, 1200);
        } else {
            // Anything you want to say 'Bad user!'
        };
    });
    function mainSlide(target){
        var width = $(target).closest('nav.arrow').siblings('ul.slide').find('li').outerWidth(true);
        var nth = $(target).closest('nav.arrow').siblings('nav.button').find('li.active').index();
        if( $(target).attr('name') == 'left' ){
            $(target).closest('nav.arrow').siblings('ul.slide').css('left', '-'+width+'px').prepend( $(target).closest('nav.arrow').siblings('ul.slide').find('li:last-child') );
            $(target).closest('nav.arrow').siblings('ul.slide').animate( {left : '+='+width+'px'}, 1000, function(){
            } );
            if( nth == 0 ){
                nth = 2;
            }else{
                nth = nth - 1;
            }
            
        }else{
            $(target).closest('nav.arrow').siblings('ul.slide').find('li:first-child').clone().appendTo( $(target).closest('nav.arrow').siblings('ul.slide') );
            $(target).closest('nav.arrow').siblings('ul.slide').animate( {left : '-='+width+'px'}, 1000, function(){
                $(target).closest('nav.arrow').siblings('ul.slide').css('left', '0').find('li:first-child').remove();
            } );
            if( nth == 2 ){
                nth = 0;
            }else{
                nth = nth + 1;
            }
        }
        $('nav.button li').eq(nth).addClass('active').siblings().removeClass('active');
    }
    $('div.section nav.arrow a').on('click', function(e){
        //PreventDoubleClick
        e.preventDefault();
        if (!$(this).data('isClicked')) {
            var link = $(this);
            // successful click
            Slide(this);
            // Set the isClicked value and set a timer
            link.data('isClicked', true);
            setTimeout(function() {
            link.removeData('isClicked')
            }, 800);
        } else {
            // Anything you want to say 'Bad user!'
        };
    });
    function Slide(target){
        if( $(target).closest('nav.arrow').next('div.slide-wrap').children('ul.slider').children('li').length == 1 ){
            return false;
        }
        var width = $(target).closest('nav.arrow').next().find('ul.slider').find('li').outerWidth(true);
        if( $(target).attr('name') == 'left' ){
            $(target).closest('nav.arrow').next().find('ul.slider').css('left', '-'+width+'px').prepend( $(target).closest('nav.arrow').next().find('ul.slider').find('li:last-child') );
            $(target).closest('nav.arrow').next().find('ul.slider').animate( {left : '+='+width+'px'}, 800, function(){
            } );
        }else{
            $(target).closest('nav.arrow').next().find('ul.slider').animate( {left : '-='+width+'px'}, 800, function(){
                $(target).closest('nav.arrow').next().find('ul.slider').css('left', '0').find('li:first-child').remove();
                $(target).closest('nav.arrow').next().find('ul.slider').find('li:first-child').clone().appendTo( $(target).closest('nav.arrow').next().find('ul.slider') );
            } );
        }
    }