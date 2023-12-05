
	</main>
    <!-- /#main -->

	

    <!-- #footer -->
    <footer id="footer">
		<div class="container">
			<div id="pagetopArea">
				<a href="#header_top" id="pageTop" title="ページトップへ">Page Top</a>
			</div>
			<div class="footer_section">
				<a href="<?php echo esc_url( home_url() ); ?>" class="footer_Logo">
					ロゴ
					<!--<img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="<?php echo 	esc_html( bloginfo('name') );?>" width="120" height="40">-->
				</a>
				<p class="f_txt">DXに関するお困り事などお気軽にお問い合わせください。<br>オンラインによるご相談も可能です。</p>
				<div class="btnWrap">
					<a href="<?php echo esc_url( get_page_link('32') ) ;?>" class="d_contact">お問い合わせはこちら</a>
				</div>
			</div>
            <div id="footerCntWrap">
                <div id="footerNaviWrap">
                    <?php if( has_nav_menu( 'footer-menu1') ):?>

                        <div class="naviBox">
                            <nav class="footerNavi">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu1','items_wrap' => '<ul>%3$s</ul>', 'container' => false ) );?>

                            </nav>
                        </div>
                    <?php endif;?>


                    <?php if( has_nav_menu( 'footer-menu2') ):?>

                        <div class="naviBox">
                            <nav class="footerNavi">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu2','items_wrap' => '<ul>%3$s</ul>', 'container' => false ) );?>

                            </nav>
                        </div>
                    <?php endif;?>


                    <?php if( has_nav_menu( 'footer-menu3') ):?>

                        <div class="naviBox">
                            <nav class="footerNavi">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu3','items_wrap' => '<ul>%3$s</ul>', 'container' => false ) );?>

                            </nav>
                        </div>
                    <?php endif;?>


                    <?php if( has_nav_menu( 'footer-menu4') ):?>

                        <div class="naviBox">
                            <nav class="footerNavi">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu4','items_wrap' => '<ul>%3$s</ul>', 'container' => false ) );?>

                            </nav>
                        </div>
                    <?php endif;?>
                </div>
				 <div id="footerCnt">
           			<p class="f_time">受付時間 / 平日 10：00〜16：00(土日祝休み)</p>
								
					<?php if(have_rows('common-information','option')): ?>
					<!---tel--->
					<div class="footer_tel">
					<?php while(have_rows('common-information','option')): the_row();
					$tel_number = get_sub_field('tel-number');
						if (!empty($tel_number)) : // $tel_numberが空でない場合に表示
					?>
					<a href="tel:<?php echo $tel_number;?>"><?php echo $tel_number;?></a>
					<?php
						endif;
						endwhile;
					?>
					</div>
					<!---tel--->
					<!---adress--->
					<div class="footer_adress">
						<?php while(have_rows('common-information','option')): the_row();
						$address = get_sub_field('address');
						if (!empty($address)) : // $addressが空でない場合に表示
						?>
						<p class="fa_txt"><?php echo $address;?></p>
						<?php
							endif;
							endwhile;
						?>
					</div>
					<!---adress--->
					<?php endif; ?>
						<div class="footer_socials_networking">
							
						<?php get_template_part( 'inc/inc_snswrap' ); ?>
							
						</div>
                </div>
			</div>
		</div>
		<div id="copyright">
			<p>&copy; 2023 Tanoshi Media Company OKINAWA,LLC.</p>
		</div>
		
    </footer>
    <!-- /#footer -->

<?php wp_footer();?>
<?php echo get_page_body2_script();?>
<script>
    (function($) {
  var $nav   = jQuery('#drawerNaviWrap');
  var $bodyclass   = jQuery('body');
  var $btn   = jQuery('.drawerNaviBtnWrap');
  var $btnclose   = jQuery('.drawerNavClose');
  var $overlay  = jQuery('#overlay');
  var open   = 'open'; // class
  var openSpNavi   = 'openSpNavi'; // class

  // menu open close
  $btn.on( 'click', function() {
    if ( ! $nav.hasClass( open ) ) {
      $nav.addClass( open );
      $bodyclass.addClass( openSpNavi );
    } else {
      $nav.removeClass( open );
      $bodyclass.addClass( openSpNavi );
    }
  });
  // mask close
  $overlay.on('click', function() {
    $nav.removeClass( open );
    $bodyclass.removeClass( openSpNavi );
  });
  $btnclose.on('click', function() {
    $nav.removeClass( open );
    $bodyclass.removeClass( openSpNavi );
  });
} )(jQuery);

</script>
<script>
	var sliderfv = new Swiper('.top-fvSwiper', {
    loop: true,
    loopedSlides: 1000,
    slidesPerView: 1.8,
    slidesPerGroup: 1,
    spaceBetween: 50,
    autoplay:3000,
	 speed: 3000,
    centeredSlides: true,
    breakpoints: {
        1399: {
            slidesPerView: 1.5,
            slidesPerGroup: 1,
            spaceBetween: 20

        },
        767: {
            slidesPerView: 1.5,
            slidesPerGroup: 1,
            spaceBetween: 20
        },
        414: {
            slidesPerView: 1.2,
            slidesPerGroup: 1,
            spaceBetween: 20
        }
    },
	 navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
	  pagination: { // 丸のページネーションを使うなら書く
		  el: ".swiper-pagination",
		   clickable: true //クリックを有効化する
	  },
    autoplay: {
        delay: 6000,
        stopOnLastSlide: false,
        disableOnInteraction: false,
        reverseDirection: false
    },
});
</script>
<script>
jQuery(function ($) {
  $(".js-accordion-title").on("click", function() {
    $(".js-accordion-title").not(this).removeClass("open");
    $(".js-accordion-title").not(this).next().slideUp(200);
    $(this).toggleClass("open");
    $(this).next().slideToggle(200);
  });
});
</script>
</body>
</html>