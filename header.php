<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php echo get_gtm_script();?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;500;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
<?php if ( is_404() ) : ?>
<title>404エラー｜ページが見つかりませんでした</title>
<meta name="description" content="お探しのページは移動したか削除された可能性があります。">
<?php else:?>
<title><?php wp_title('|', true, 'right'); ?></title>
<?php endif; ?>
	
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>">
<?php wp_head();?>
<?php echo get_page_head_script();?>
</head>
    
<?php if( is_home() || is_front_page() ):?>
<body <?php body_class('drawer drawer--right'); ?>>
<?php else:?>
<body <?php body_class('sub_page drawer drawer--right'); ?>>
<?php endif;?>
<?php 
    echo get_gtm_noscript();
    echo get_page_body1_script();
?>

	<!-- header -->
	<header id="header">
		<div id="headerCnt">
			<div id="logoArea">
				<h1 id="logo">
					<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.svg" alt="<?php echo get_page_heading();?>" width="262" height="49.5">
					</a>
				</h1>
            </div>
			<div id="headerContact">
				<div id="mainNaviArea">
					<nav id="mainNavi">
						<?php if( has_nav_menu('global-menu') ){
								wp_nav_menu( array('theme_location' => 'global-menu','items_wrap' => '<ul>%3$s</ul>', 'container' => false ));
						};?>
					</nav>
				</div>
				
				<div class="header_contact">
					
					
					<?php if(have_rows('common-information','option')): ?>
					<div class="hc_col">
						<?php while(have_rows('common-information','option')): the_row();
						$tel_number = get_sub_field('tel-number');
						 if (!empty($tel_number)) : // $tel_numberが空でない場合に表示
						?>
						<a href="tel:<?php echo $tel_number;?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/home/tel.svg" alt="<?php echo $tel_number;?>" width="50" height="50" class="h_tel">
							
							</a>
						<?php
							endif;
						endwhile;
						?>
					</div>
					<?php endif; ?>
					<div class="hc_col2">
						<a href="<?php echo esc_url( get_page_link('32') ) ;?>" class="h_contact"><span>お問合わせ</span></a>
					</div>
				</div>
				
			</div>
            <div id="drawerNaviWrap">
				<div class="drawerNaviBtnWrap">
					<div class="drawerNaviBtn">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<nav class="drawer-nav notosans_font">
					<div class="drawerInner">
						<div class="drawerNavClose">
							<span>×</span>
						</div>
						<div class="drawer_content">
							<div class="drawer_Logo">
								<a href="<?php echo esc_url( home_url() ); ?>">
									ロゴ
									<!--<img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="<?php echo 	esc_html( bloginfo('name') );?>" width="120" height="40">-->
								</a>
							</div>
							
							<div class="drawer_information">
								<p class="d_time">受付時間 / 平日 10：00〜16：00(土日祝休み)</p>
								
								<?php if(have_rows('common-information','option')): ?>
								<!---tel--->
								<div class="drawer_tel">
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
								<div class="drawer_adress">
									<?php while(have_rows('common-information','option')): the_row();
									$address = get_sub_field('address');
									 if (!empty($address)) : // $addressが空でない場合に表示
									?>
									<p class="ad_txt"><?php echo $address;?></p>
									<?php
										endif;
									endwhile;
									?>
								</div>
								<!---adress--->
								<?php endif; ?>
								
								<a href="<?php echo esc_url( get_page_link('32') ) ;?>" class="d_contact">お問い合わせはこちら</a>
								
							</div>
							
						</div>
						<?php if( has_nav_menu('global-menu-sp') ){
							wp_nav_menu( array('theme_location' => 'global-menu-sp','items_wrap' => '<ul>%3$s</ul>', 'container' => false,'echo' => 'true' ));
						};?>
						
						<div class="drawer_socials_networking">
							
							<ul>
								<!---->
								<?php if(have_rows('link_wrap','option')): ?>
								<!---->
								<li>
									<?php while(have_rows('link_wrap','option')): the_row();
									$instagram_url = get_sub_field('instagram_url');
									 if (!empty($instagram_url)) : // $instagram_urlが空でない場合に表示
									?>
									<a href="<?php echo $instagram_url;?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/home/instagram.svg" alt="instagram" width="30" height="30">
									</a>
									<?php
										endif;
									endwhile;
									?>
								</li>
								<!---->
								<!---->
								<li>
									<?php while(have_rows('link_wrap','option')): the_row();
									$facebook_url = get_sub_field('facebook_url');
									 if (!empty($facebook_url)) : // $facebook_urlが空でない場合に表示
									?>
									<a href="<?php echo $facebook_url;?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/home/facebook.svg" alt="facebook" width="14" height="28">
									</a>
									<?php
										endif;
									endwhile;
									?>
								</li>
								<!---->
								<!---->
								<li>
									<?php while(have_rows('link_wrap','option')): the_row();
									$youtube_url = get_sub_field('youtube_url');
									 if (!empty($youtube_url)) : // $youtube_urlが空でない場合に表示
									?>
									<a href="<?php echo $youtube_url;?>">
										<img src="<?php echo get_template_directory_uri(); ?>/images/home/youtube.svg" alt="youtube" width="35" height="35">
									</a>
									<?php
										endif;
									endwhile;
									?>
								</li>
								<!---->
								<?php endif; ?>
							</ul>
							
						</div>
					</div>
				</nav>
				
				<div id="overlay"></div>
			</div>
            
		</div>
    </header>
	<!-- / #header -->
	<div id="header_top"></div>
	
	
    <main id="main">

		