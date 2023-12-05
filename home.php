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
                   $alttxt = get_sub_field('alttxt');
				   $imgtxt = get_sub_field('imgtxt');
                ?>
			<div class="swiper-slide">
				<div class="slideimg_box">
					<img src="<?php echo $slider_img;?>" alt="<?php echo $alttxt;?>" width="100%" height="100%">
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
			<div class="tllbox pc">
				<h2 class="tllh2">サービス</h2>
				<span>Service</span>
			</div>
			<div class="tllbox sp">
				<span>Service</span>
				<h2 class="tllh2">サービス</h2>
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
				<div class="columnBox">
					<div class="service_imgbox service03">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home/service03.jpg" alt="サービスの見出し3"  width="100%" height="280">
					</div>
					<div class="service_txtbox">
						<h2>サービスの見出し3</h2>
						<p>いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。</p>
					</div>
				</div>
				<div class="columnBox">
					<div class="service_imgbox service04">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home/service04.jpg" alt="サービスの見出し4"  width="100%" height="280">
					</div>
					<div class="service_txtbox">
						<h2>サービスの見出し4</h2>
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
				<div class="tllbox pc">
					<h2 class="tllh2">スタッフ紹介・採用情報</h2>
					<span>Staff & Recruit</span>
				</div>
				<div class="tllbox sp">
					<span>Staff & Recruit</span>
					<h2 class="tllh2">スタッフ紹介・採用情報</h2>
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
			<div class="tllbox pc">
				<h2 class="tllh2">会社概要</h2>
				<span>Company</span>
			</div>
			<div class="tllbox sp">
				<span>Company</span>
				<h2 class="tllh2">会社概要</h2>
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
			<div class="tllbox pc">
				<h2 class="tllh2">ブログ</h2>
				<span>Blog</span>
			</div>
			<div class="tllbox sp">
				<span>Blog</span>
				<h2 class="tllh2">ブログ</h2>
			</div>
			<?php get_template_part( 'inc_blog' ); ?>
            
            <a href="<?php echo esc_html(get_post_type_archive_link( 'blog' )); ?>" class="btn btnCenter arrow border_btn">一覧へ</a>
			
		</div>
	</section>
	<!-- /#blogArea -->
	
	<!--  -->
	<section class="faqArea">
		<div class="container">
			<div class="tllbox tllbox_center pc">
				<h2 class="tllh2">よくある質問</h2>
				<span>FAQ</span>
			</div>
			<div class="tllbox tllbox_center sp">
				<span>FAQ</span>
				<h2 class="tllh2">よくある質問</h2>
			</div>
			<div class="accordion-container">
				<!---->
				<div class="accordion-list">
				  <div class="accordion-title js-accordion-title">いなかは、ほんとうにすてきでした。</div>
				  <div class="accordion-text">
				  	<p class="a_text">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。コウノトリは、おかあさんから、エジプト語をおそわっていたのでした。</p>
				  </div>
				</div>
				<!---->
				<div class="accordion-list">
				  <div class="accordion-title js-accordion-title">いなかは、ほんとうにすてきでした。</div>
				  <div class="accordion-text">
				 	 <p class="a_text">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。コウノトリは、おかあさんから、エジプト語をおそわっていたのでした。</p>
				  </div>
				</div>
				<!---->
				<div class="accordion-list">
				  <div class="accordion-title js-accordion-title">いなかは、ほんとうにすてきでした。</div>
				  <div class="accordion-text">
				 	 <p class="a_text">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。コウノトリは、おかあさんから、エジプト語をおそわっていたのでした。</p>
				  </div>
				</div>
				<!---->
				<div class="accordion-list">
				  <div class="accordion-title js-accordion-title">いなかは、ほんとうにすてきでした。</div>
				  <div class="accordion-text">
				 	 <p class="a_text">いなかは、ほんとうにすてきでした。夏のことです。コムギは黄色くみのっていますし、カラスムギは青々とのびて、緑の草地には、ほし草が高くつみ上げられていました。そこを、コウノトリが、長い赤い足で歩きまわっては、エジプト語でぺちゃくちゃと、おしゃべりをしていました。コウノトリは、おかあさんから、エジプト語をおそわっていたのでした。</p>
				  </div>
				</div>
				<!---->
			</div>
			<a href="<?php echo esc_url( get_page_link('238') ) ;?>" class="btn btnCenter arrow">よくある質問はこちら</a>
		</div>
	</section>
	<!--  -->
	
	<!-- #newsArea -->
	<section id="newsArea">
		<div class="container">
			<div class="tllbox pc">
				<h2 class="tllh2">お知らせ</h2>
				<span>News</span>
			</div>
			<div class="tllbox sp">
				<span>News</span>
				<h2 class="tllh2">お知らせ</h2>
			</div>
			<?php get_template_part( 'inc_news' ); ?>
            
			<a href="<?php echo esc_url( get_category_link( '1' ) ); ?>" class="btn btnCenter arrow">一覧はこちら</a>
		</div>
	</section>
	<!-- /#newsArea -->
	
	
</div>
<!-- /#indexPage -->
<?php get_footer();?>