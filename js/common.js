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
	var headerHeight = $('#header').height();
	var mainNaviFixed = $('#header');
	//console.log(headerHeight);
	
	$(window).scroll(function () {
        if ($(this).scrollTop() > headerHeight + 40) {
            mainNaviFixed.addClass('fixed');
        } else {
            mainNaviFixed.removeClass('fixed');
        }
    });
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
// accordion
jQuery(function ($) {
  $(".js-accordion-title").on("click", function() {
    $(".js-accordion-title").not(this).removeClass("open");
    $(".js-accordion-title").not(this).next().slideUp(200);
    $(this).toggleClass("open");
    $(this).next().slideToggle(200);
  });
});

// swiper-sub
jQuery(function(){
'use strict';
var swiper = new Swiper('.top-fvSwiper', {
    loop: true,
    speed: 2000,
    spaceBetween: 20,
    slidesPerView: 1.5,
    centeredSlides: true,
    breakpoints: {
        767: {
            slidesPerView: 1.5,
            slidesPerGroup: 1,
            spaceBetween: 20
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: 'progressbar',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 6000,
        stopOnLastSlide: false,
        disableOnInteraction: false,
        reverseDirection: false
    },
});
});

//タブ切り替え 複数設置対応
jQuery(function($) {
  $('.tab-btn').on('click', function() {
    var tabWrap = $(this).parents('.tab-wrap');
    var tabBtn = tabWrap.find(".tab-btn");
    var tabContents = tabWrap.find('.tab-contents');
    tabBtn.removeClass('show');
    $(this).addClass('show');
    var elmIndex = tabBtn.index(this);
    tabContents.removeClass('show');
    tabContents.eq(elmIndex).addClass('show');
  });
});