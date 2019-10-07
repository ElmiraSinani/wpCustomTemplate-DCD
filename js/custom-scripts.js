jQuery(document).ready(function() {
    

    $('.bxslider').bxSlider({
      pagerCustom: '#bx-pager',
      controls: false,
      adaptiveHeight: true,
    });
    
    $('#bx-pager .inner').bxSlider({
        slideWidth: 230,
        
        maxSlides:4,
        pager: false,
        infiniteLoop: false
    });
    
    $('.toPageArrow a').click(function () {        
       var page = $(this).attr('data-page');
       console.log( $('#'+page).offset().top );
       $('html, body').animate({scrollTop: $('#'+page).offset().top}, 1000); 
    });
    
    $('.toTopIcon, .toHome').click(function () {       
       $('html, body').animate({scrollTop: $('.header').offset().top}, 1000); 
    });
    
    $('.open-mobile-menu').on( 'click', function(){
        $('.header-menu-block').show();
    });
    $('.close-mobile-menu').on( 'click', function(){
        $('.header-menu-block').hide();
    });
    
     /*Smoot scrolling on click menu items*/
    $('a[href*=#]:not([href=#])').click(function(event) {       
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          var url = this.hash;
          if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000, function () {           
                window.location.hash = url; 
            });       
            
            return false;
          }
        }
    });
    
    
    $(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage'],
				sectionsColor: ['#4A6FB1', '#939FAA', '#323539'],
				scrollOverflow: true,
                                fitToSection: false
			});

		});
    

});