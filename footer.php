
	</main>
    <!-- /#main -->

	

    <!-- #footer -->
    <footer id="footer">
		<div class="container">
			<div id="pagetopArea">
				<a href="#main" id="pageTop" title="ページトップへ">Page Top</a>
			</div>
			<div class="footer_section">
				<a href="<?php echo esc_url( home_url() ); ?>" class="footer_Logo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" alt="<?php echo 	esc_html( bloginfo('name') );?>" width="120" height="40">
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
                </div>
				 <div id="footerCnt">
           			<p class="f_time">受付時間 / 平日 10：00〜16：00(土日祝休み)</p>
					<!---tel--->
					<div class="footer_tel">
					<a href="tel:<?php the_field('tel-number', 'option'); ?>">TEL.<?php the_field('tel-number', 'option'); ?></a>
					</div>
					<!---tel--->
					<!---adress--->
					<div class="footer_adress">
						<?php $address = get_field('address', 'option');
                            if (!empty($address)) {
                            echo '<address>' . $address . '</address>';
                        } ?>
					</div>
					<!---adress--->
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
    
    <?php get_template_part( 'inc/inc_fixedbtn' ); ?>


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
</body>
</html>