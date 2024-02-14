<?php


/* ---------------------- */
/* CSS・JS登録
/* ---------------------- */
if (!is_admin()) { //登録
    function my_scripts() {
    	$dir = get_template_directory_uri();

        //CSS
        wp_enqueue_style( 'font-awesome', $dir . '/css/font-awesome.min.css', array() , NULL , 'all' ); //fontIcon
        wp_enqueue_style( 'swiper', $dir . '/css/swiper.min.css', array() , NULL , 'all' ); //スライダー
		wp_enqueue_style( 'normalize', $dir . '/css/normalize.min.css', array() , NULL , 'all' ); //ブラウザリセット初期化
        wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), NULL , 'all' );

        //js
        wp_enqueue_script( 'swiperJs', $dir . '/js/swiper-bundle.min.js', array('jquery'), NULL , true); //スライダー
        wp_enqueue_script( 'commonjs', $dir . '/js/common.js', array('jquery'), NULL , true );
    }
    add_action( 'wp_enqueue_scripts', 'my_scripts' );
	
}

/* ---------------------- */
/* wp_headの整理 */
/* ---------------------- */
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 4 );
remove_action( 'wp_head', 'rsd_link' ); //リモート編集
remove_action( 'wp_head', 'wlwmanifest_link' ); //リモート編集
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); //ショートリンク
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); //親記事
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); //最初の記事
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //前後の記事リンク
remove_action( 'wp_head', 'wp_generator' ); //WPのバージョン
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles', 'print_emoji_styles');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0); //resatAPI
remove_filter( 'the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop');
remove_action( 'load-update-core.php', 'wp_update_themes');

remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //wp_headのtitleタグを削除

function remove_dns_prefetch($hints, $relation_type) {
    if ( 'dns-prefetch' === $relation_type ) {
    return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
   }
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);

/* ---------------------- */
/* タイトルタグ */
/* ---------------------- */
add_theme_support( 'title-tag' );

/* ---------------------- */
/* アイキャッチ有効化 */
/* ---------------------- */
add_theme_support( 'post-thumbnails' );

/* ------------------------------------------- */
/* メニュー登録 */
/* ------------------------------------------- */
register_nav_menu( 'global-menu','グローバルメニュー');
register_nav_menu( 'global-menu-sp','グローバルメニューSP');
register_nav_menu( 'footer-menu1','フッターメニュー1');
register_nav_menu( 'footer-menu2','フッターメニュー2');
register_nav_menu( 'footer-menu3','フッターメニュー3');
/* ---------------------- */
/* メニューclass削除 */
/* 子ページがあるときは'children'classを付与
/* ---------------------- */
add_filter( 'nav_menu_css_class', 'my_custom_nav', 10, 2 );
function my_custom_nav( $classes, $item ) {
    $children = in_array('menu-item-has-children', $classes);

    // $custom_class変数を定義
    $custom_class = ''; // ここに適切な値を代入する

    if ( count( $classes ) > 0 ) { // 配列$classesが空でないかを確認
        array_splice( $classes, 1 );
    } else {
        $classes = array();
    }
    if( $item->current == true ) {
        $classes[] = 'current';
    }
    if ( $children ) { // サブページ確認
        $classes[] = 'children';
    }
    if ( !empty( $custom_class ) ) {
        $classes[] = $custom_class;
    }
    return $classes;
}

/* -------------------------------------------- */
/* ACF */
/* -------------------------------------------- */
/* ---------------------- */
/* ACFオプションページを設定 */
/* ---------------------- */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'テーマ設定',
		'menu_title'	=> 'テーマ設定',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> '',
		'position'	=> '3',
		'redirect'	=> false,
	));
    acf_add_options_sub_page(array(
        'page_title' 	=> '共通設定',
        'menu_title'	=> '共通設定',
		'menu_slug' 	=> 'common_posts',
        'parent_slug'	=> 'theme-options',
    ));
};


/* ------------------------------------------- */
/* ログイン関連設定
/* ------------------------------------------- */
/* ---------------------- */
/* ログインロゴ変更 */
/* ---------------------- */
function custom_login_logo() { 
	echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/common/login.svg) 50% 50% no-repeat !important; width:320px !important; height: 53px !important;}</style>'; 
} 
add_action('login_head', 'custom_login_logo');

/* ---------------------- */
/* ログインロゴURL変更
/* ---------------------- */
function custom_login_logo_url() {
    $site_url = site_url();
return $site_url;
}
add_filter('login_headerurl', 'custom_login_logo_url');

/* ---------------------- */
/* ログインロゴ画像ALT変更
/* ---------------------- */
function custom_login_logo_title() {
return get_option( 'blogname' );
}
add_filter( 'login_headertext', 'custom_login_logo_title' );



