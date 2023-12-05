//SPメニュー
jQuery(function($) {
	'use strict';
    $('.drawer-nav ul > li.children > a').after('<span class="childrenToggle"></span>');
    $('.drawer-nav ul > li.children > span').on('click', function() {
        $(this).toggleClass('active');
        $(this).parent('li').toggleClass('active');
        $(this).next('ul').toggleClass('active');
        $(this).next('ul').slideToggle();
	});
});
//globalmenu fixed
jQuery(function($) {
	'use strict';
	var windowWidth = $(window).width();
	var headerHeight = $('#header').height();
	var mainNaviFixed = $('#header');
	//console.log(headerHeight);
	
	if( windowWidth > 767 ) {
		$(window).scroll(function () {
			if ($(this).scrollTop() > headerHeight + 40) {
				mainNaviFixed.addClass('fixed');
			} else {
				mainNaviFixed.removeClass('fixed');
			}
		});
	}
});

//cta fixed
jQuery(function($) {
	'use strict';
	var ctaf = $('#fixedBtnSpArea');
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			ctaf.addClass('fixedsp');
		} else {
			ctaf.removeClass('fixedsp');
		}
	});
});

// ページ内スクロール
jQuery(document).ready(function($){
	'use strict';
  $('a[href^="#"]').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        $('html,body')
        .animate({scrollTop: targetOffset}, 500);
       return false;
      }
    }
  });
});

// toggle
/*
jQuery(function($) {
	'use strict';
	$(".toggleWrap dt").on("click", function() {
		$(this).next().slideToggle();
		$(this).next().toggleClass("active");
		$(this).toggleClass("active");
		return false;
	});
});
*/