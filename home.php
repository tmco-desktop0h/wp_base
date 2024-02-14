<?php
   /* template name:HOME */ 
    get_header();
?>

<div id="indexPage">
	<!-- top-fvSwiper -->
	<div class="swiper-container top-fvSwiper">
		 <?php if(have_rows('fv_slider_img','option')): ?>
		<div class="swiper-wrapper">
			  <?php while(have_rows('fv_slider_img','option')): the_row();
                  $slider_img = get_sub_field('slider_img');
               ?>
			<div class="swiper-slide">
				<div class="slideimg_box">
					<img src="<?php echo esc_attr($slider_img['url']); ?>" alt="<?php echo esc_attr($slider_img['alt']); ?>" width="100%" height="100%">
				</div>
				<div class="slidetxt_box">
					<p><?php echo $imgtxt;?></p>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		 <?php endif; ?>
		<div class="swiper-button-prev"></div>
  		<div class="swiper-button-next"></div>
		<div class="swiper-pagination"></div>
	</div>
	<!-- top-fvSwiper -->
	
	<!-- aboutArea -->
	<section class="aboutArea">
		<div class="container">
			<div class="about_inner">
				<div class="about_tllbox">
					<h2 class="abouttll">DXによる<br>ビジネスの発達を<br>お手伝いします。</h2>
				</div>
				<div class="about_txtbox">
					<p>いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。コウノトリは、おかあさんから、エジプト語をおそわっていたのでした。</p>
				</div>
			</div>
			<a href="<?php echo esc_url( get_page_link('235') ) ;?>" class="btn btnCenter arrow">私たちについて</a>
		</div>
	</section>
	<!-- aboutArea -->
	
	<!-- serviceArea -->
	<section class="serviceArea">
		<div class="container">
			<div class="titleWrap">
                <span class="en bold">Service</span>
                <h2 class="titleh2">サービス</h2>
            </div>
			<p class="servicetxt mb60">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。</p>
			<div class="column2Wrap">
				<div class="columnBox">
					<div class="service_imgbox">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home/service01.png" alt="サービスの見出し1"  width="100%" height="280">
					</div>
					<div class="service_txtbox">
						<h2>サービスの見出し1</h2>
						<p>いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。</p>
					</div>
				</div>
				<div class="columnBox">
					<div class="service_imgbox service02">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home/service02.jpg" alt="サービスの見出し2"  width="100%" height="280">
					</div>
					<div class="service_txtbox">
						<h2>サービスの見出し2</h2>
						<p>いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。</p>
					</div>
				</div>
			</div>
			<a href="<?php echo esc_url( get_page_link('236') ) ;?>" class="btn btnCenter arrow">サービス一覧はこちら</a>
		</div>
	</section>
	<!-- serviceArea -->
	
	<!-- staffArea -->
	<section class="staffArea">
		<div class="container">
			<div class="staff_inner">
				<div class="titleWrap">
                    <span class="en bold">Staff & Recruit</span>
                    <h2 class="titleh2">スタッフ紹介・採用情報</h2>
                </div>
				<p class="mb60">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。</p>
				<a href="<?php echo esc_url( get_page_link('312') ) ;?>" class="btn btnLeft arrow">スタッフ紹介・採用情報</a>
				<div class="staff_box">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home/staff_recruit01.jpg" alt="スタッフ紹介・採用情報"  width="286" height="180" class="pc">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home/staff_recruit02.jpg" alt="スタッフ紹介・採用情報"  width="286" height="180"  class="pc">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home/staff_recruit03.jpg" alt="スタッフ紹介・採用情報"  width="286" height="180" class="staffimg03">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home/staff_recruit01.jpg" alt="スタッフ紹介・採用情報"  width="135" height="96" class="sp">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home/staff_recruit02.jpg" alt="スタッフ紹介・採用情報"  width="135" height="96"  class="sp">
				</div>
			</div>
		</div>
	</section>
	<!-- staffArea -->
	
	<!-- companyArea -->
	<section class="companyArea">
		<div class="container">
			<div class="titleWrap">
                <span class="en bold">Company</span>
                <h2 class="titleh2">会社概要</h2>
            </div>
			<h3 class="companytll">いなかは、ほんとうにすてきでした。</h3>
			<p class="mb35">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。</p>
			<a href="<?php echo esc_url( get_page_link('237') ) ;?>" class="btn btnLeft arrow">会社概要はこちら</a>
		</div>
	</section>
	<!-- companyArea -->
	
	<!-- #blogArea -->
	<section id="blogArea">
		<div class="container">
			<div class="titleWrap">
                <span class="en bold">Blog</span>
                <h2 class="titleh2">ブログ</h2>
            </div>
			<?php get_template_part( 'inc_blog' ); ?>
            
            <a href="<?php echo esc_html(get_post_type_archive_link( 'blog' )); ?>" class="btn btnCenter arrow border_btn">一覧へ</a>
			
		</div>
	</section>
	<!-- /#blogArea -->
	
	<!--  -->
	<?php get_template_part( 'inc/accordion' ); ?>
	<!--  -->
	
	<!-- #newsArea -->
	<section id="newsArea">
		<div class="container">
			<div class="titleWrap">
                <span class="en bold">Information</span>
                <h2 class="titleh2">お知らせ</h2>
            </div>
            <!--タブ切り替え-->
            <?php get_template_part( 'inc/tab_posts' ); ?>
            <!--タブ切り替え-->
            
			<a href="<?php echo esc_url( get_category_link( '1' ) ); ?>" class="btn btnCenter arrow">一覧はこちら</a>
		</div>
	</section>
	<!-- /#newsArea -->
	
	
</div>
<!-- /#indexPage -->
<?php get_footer();?>