<?php
/* ---------------------- */
/* 目次
   42行　CSS・JS登録
   62行　wp_headの整理
   92行　タイトルタグ
   97行　エディター用css有効化
   102行　アイキャッチ有効化
   111行　ショートコード　ファイルインクルード　[myphp file="file-name"]投稿画面で外部PHPを読み込む場合は有効化
   126行　メニュー登録
   135行　メニューclass削除、子ページがあるときは'children'classを付与
   170行　日本語スラッグの場合 URLを変更する　データを移行するときはOFF
   184行　ACFオプションページを設定
   202行　ログインロゴ変更
   210行　ログインロゴURL変更
   219行　ログインロゴ画像ALT変更
   227行　管理バーにログアウトを追加
   243行　HOMEID取得
   251行　Google Tag Manager
   267行　head内追記取得
　　280行　<body>後追記取得
　　293行　</body>前追記取得
　　306行　ファビコン表示
　　320行　ポストタイプ取得
　　359行　H1テキスト取得
　　422行　アーカイブページの説明文を取得　All IN ONESEO必須
　　449行　アーカイブページのタイトルを取得　All IN ONESEO必須
　　491行　アーカイブ系ページ制御　表示件数指定
　　514行　アーカイブページで現在のカテゴリー・タグ・タームを取得する 
　　538行　アーカイブページで子カテゴリーにも親テンプレートを設定する
　　559行　エディタ関連
　　587行　TinyMCEがTableタグに「width」と「height」を勝手に設定する機能を無効にする
　　598行　画像のpタグ自動挿入禁止
　　606行　shortcodeがpタグに囲まれるfix
　　622行　コメントのPタグ削除
　　637行　カスタム投稿 絞り込み
　　658行　カスタム投稿並び順変更 
　　672行　【wordpress】投稿・固定ページ内にPHPファイルをインクルード(挿入/実行)させる
/* ---------------------- */
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
/* エディター用css有効化 */
/* ---------------------- */
add_editor_style('editor-style.css');

/* ---------------------- */
/* アイキャッチ有効化 */
/* ---------------------- */
add_theme_support( 'post-thumbnails' );

/* -------------------------------------------- */
/* 管理画面 */
/* -------------------------------------------- */

/* ---------------------- */
/* ショートコード　ファイルインクルード　[myphp file="file-name"]
/* 投稿画面で外部PHPを読み込む場合は有効化
/* ---------------------- */
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}  

add_shortcode('myphp', 'Include_my_php');
/* ------------------------------------------- */
/* メニュー登録 */
/* ------------------------------------------- */
register_nav_menu( 'global-menu','グローバルメニュー');
register_nav_menu( 'global-menu-sp','グローバルメニューSP');
register_nav_menu( 'footer-menu1','フッターメニュー1');
register_nav_menu( 'footer-menu2','フッターメニュー2');
register_nav_menu( 'footer-menu3','フッターメニュー3');

/* ---------------------- */
/* メニューID削除 */
/* https://blog-and-destroy.com/6842
/* ---------------------- */
function my_nav_menu_id( $menu_id ){
	// liタグのidを削除
	$id = NULL;
    return $id;
}
add_filter( 'nav_menu_item_id', 'my_nav_menu_id' );

/* ---------------------- */
/* メニューclass削除 */
/* 子ページがあるときは'children'classを付与
/* ---------------------- */
add_filter( 'nav_menu_css_class', 'my_custom_nav', 10, 2 );
function my_custom_nav( $classes, $item ) {
    $children = in_array('menu-item-has-children', $classes);
    
    if( $classes[0] ){
        array_splice( $classes, 1 );
    }else{
		$classes = array();
	}
    if( $item -> current == true ) {
        $classes[] = 'current';
    }
    if ( $children ) { //サブページ確認
        $classes[] = 'children';
    }
    if( !empty( $custom_class ) ){
        $classes[] = $custom_class;
    }
    return $classes;
}
/* ---------------------- */
/* 日本語スラッグの場合 URLを変更する */
/* データを移行するときはOFF */
/* ---------------------- */
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
};
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );
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
add_filter( 'login_headertitle', 'custom_login_logo_title' );

/* ---------------------- */
/* 管理バーにログアウトを追加
/* ---------------------- */
function add_new_item_in_admin_bar() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu(array(
	 'id' => 'new_item_in_admin_bar',
	 'title' => __('ログアウト'),
	 'href' => wp_logout_url()
	 ));
 }
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

/* -------------------------------------------- */
/* テンプレート用独自関数 */
/* -------------------------------------------- */
/* ---------------------- */
/* HOMEID取得 */
/* ---------------------- */
function get_home_ID() {
    $home_ID = get_page_by_path("home");
    $home_ID = $home_ID->ID;
    return $home_ID;
}
/* ---------------------- */
/* Google Tag Manager */
/* ---------------------- */
function get_gtm_script(){
    if(get_field('gtm_script','option')) {
        $gtm_script = get_field('gtm_script','option')."\n";
        return $gtm_script;
    }
};
function get_gtm_noscript(){
    if(get_field('gtm_noscript','option')) {
        $gtm_noscript = get_field('gtm_noscript','option')."\n";
        return $gtm_noscript;
    }
};

/* ---------------------- */
/* head内追記取得
/* ---------------------- */
function get_page_head_script(){
	if(get_field('common_head_script','option')){
		$head_script = get_field('common_head_script','option')."\n";
	}
	if(get_field('page_head_script',$post->ID)){
		$head_script .= get_field('page_head_script',$post->ID)."\n";
	}
    return $head_script;
};

/* ---------------------- */
/* <body>後追記取得
/* ---------------------- */
function get_page_body1_script(){
	if(get_field('common_body1_script','option')){
		$body1_script = get_field('common_body1_script','option')."\n";
	}
	if(get_field('page_body1_script',$post->ID)){
		$body1_script .= get_field('page_body1_script',$post->ID)."\n";
	}
    return $body1_script;
};

/* ---------------------- */
/* </body>前追記取得
/* ---------------------- */
function get_page_body2_script(){
	if(get_field('common_body2_script','option')){
		$body2_script = get_field('common_body2_script','option')."\n";
	}
	if(get_field('page_body2_script',$post->ID)){
		$body2_script .= get_field('page_body2_script',$post->ID)."\n";
	}
    return $body2_script;
};

/* ---------------------- */
/* ファビコン表示
/* ---------------------- */

function blog_favicon() {
    if(get_field('favicon','option')){
        $favicon = get_field('favicon','option');
        echo '<link rel="icon" type="image/x-icon" href="'. $favicon.'">';
        echo '<link rel="shortcut icon" type="image/x-icon" href="'. $favicon.'">';
    }
}
add_action('wp_head', 'blog_favicon'); 


/* -------------------------------------------- */
/* ポストタイプ取得 */
/* https://chaika.hatenablog.com/entry/2017/06/28/090000 */
/* -------------------------------------------- */
function get_current_post_type() {
  $post_type = get_post_type();
  
 if( empty( $post_type ) ) {
    // 投稿が 0 件の時
    if( is_category() ) {
      $tax = get_taxonomy('category');
      $post_type = $tax->object_type[0];
    } else
    if( is_tax() ) {
      // category, taxonomy get_query_var( 'post_type' ) は常に null
      // 投稿が 1件 でもあれば　get_post_type() で取得可能
      $term = get_query_var('taxonomy');
      $tax = get_taxonomy( $term );
      $post_type = $tax->object_type[0];
    } else
    if( is_archive() ) {
      // 投稿が 0 件の時 get_post_type() は false を返すので get_query_var() で取得する
      $post_type = get_query_var( 'post_type' );
    } else
    if( is_post_type_archive() ){
        $post_type = get_query_var( 'post_type' );
        if ( is_array( $post_type ) )
        $post_type = reset( $post_type );
        $post_type_obj = get_post_type_object( $post_type );
        $post_type = $post_type_obj->name;
    }
    if( is_home() ) {
      // 投稿の一覧で投稿が0件の時は 'post' を設定
      $post_type = 'post';
    }
  }
  return $post_type;
}

/* ---------------------- */
/* H1テキスト取得 */
/* ---------------------- */
function get_page_heading(){
    $post_type  = get_current_post_type();
    $common_h1  = get_field('common_h1','option'); //共通H1
	$page_h1    = get_field('page_h1',$post->ID);
    
    if( is_home() || is_front_page() ){ //トップ
    
        $text_h1 = $common_h1;    
    }else
    if( is_page() || is_single() ) { //ページ・シングル
		$text_h1 = $page_h1;
        
        if( ! $page_h1 ){
            $text_h1 = $common_h1;
        }
    }else
    if(is_category()) { //カテゴリーアーカイブ
        $cat_obj    =   get_the_category();
        $cat        =   $cat_obj[0];
        $catid      =   $cat->cat_ID ;
        $post_id    =  'category_'.$catid;
        $page_h1    = get_field('category_h1',$post_id);
        if( $page_h1 ){
            $text_h1 = $page_h1;
        }
    }else
    if( is_tax() ){ //カスタム投稿タクソノミーアーカイブ
        $taxonomy   = get_query_var( 'taxonomy' );
        $term_obj   = get_current_term();
        $term_id    = $term_obj->term_id; // タームスラッグ
        $acf_get    = $taxonomy.'_'.$term_id;
        $page_h1    = get_field('category_h1',$acf_get);
        
        if( $page_h1 ){
            $text_h1 = $page_h1;
        }
    }else
    if(is_post_type_archive()){ //カスタム投稿アーカイブ
        $post_type = get_current_post_type();
        

        /*
        if( $post_type === '') {
            $text_h1 = '';
        }
        */
    }else
    if( is_tag() ){ //タグ
        # code...
    }

    if($text_h1 == null){ //h1が空の場合
        $text_h1 = $common_h1;
    }
    return $text_h1;
};

/* -------------------------------------------- */
/* アーカイブ関連 */
/* -------------------------------------------- */
/* ---------------------- */
/* アーカイブページの説明文を取得
/* All IN ONESEO必須
/* ---------------------- */
function my_description( $description ){
    $post_type = get_current_post_type();

    if( is_category() ){
        //カテゴリーアーカイブ
        $description = category_description();
    }else
    if( is_tax() ){
        //カスタム投稿タクソノミーアーカイブ
        $description = term_description();
    }else
    if( is_post_type_archive() ){
        //カスタム投稿アーカイブ
        /*
        if( $post_type === 'blog') {
            $description = 'ブログ';
        }
        */
    }
    return $description;
}
add_filter('aioseop_description', 'my_description');

/* ---------------------- */
/* アーカイブページのタイトルを取得
/* All IN ONESEO必須
/* ---------------------- */
function custom_aioseop_title( $title ){
    $post_type = get_current_post_type();
    if( is_category() ){
        //カテゴリーアーカイブ
        $cat_obj    =   get_the_category();
        $cat        =   $cat_obj[0];
        $catid      =   $cat->cat_ID ;
        $post_id    =  'category_'.$catid;
        $seo_title  = get_field('seo_title',$post_id);
      
        if( $seo_title ){
            $title = $seo_title;
        }
    }else
    if( is_tax() ){
        //カスタム投稿タクソノミーアーカイブ
        $taxonomy       = get_query_var( 'taxonomy' );
        $term_obj       = get_current_term();
        $term_id        = $term_obj->term_id; // タームスラッグ
        $acf_get        = $taxonomy.'_'.$term_id;
        $seo_title = get_field('seo_title',$acf_get);
        
        if( $seo_title ){
            $title = $seo_title;
        }
    }else
    if( is_post_type_archive() ) {
        //カスタム投稿アーカイブ
        /*
        if( $post_type === 'blog') {
            $title = 'カスタム投稿ブログ一覧ページタイトル';
        }
        */
    }
    return $title;
}
add_filter('aioseop_title', 'custom_aioseop_title');

/* ---------------------- */
/* アーカイブ系ページ制御
/* 表示件数指定
/* ---------------------- */
function my_pre_get_posts( $query ) {
	if ( is_admin() || ! $query -> is_main_query() ) return;
    
    if ( $query -> is_category() || is_archive()){
		$query -> set( 'posts_per_page', '12' ); //カテゴリ一覧
	}
    //カスタム投稿
    if ( $query -> is_post_type_archive('blog') ){ //post_type
		$query -> set( 'posts_per_page', '24' ); //ブログ
	}
    //タクソノミー
    if ( $query -> is_tax('blog_category')){ //タクソノミー
		$query -> set( 'posts_per_page', '24' ); //ブログカテゴリー
        $query -> set( 'orderby', 'date' );
        $query -> set( 'order', 'desc' );
	}
}
add_action( 'pre_get_posts', 'my_pre_get_posts' );

/* ---------------------- */
/* アーカイブページで現在のカテゴリー・タグ・タームを取得する 
/* ---------------------- */
function get_current_term(){
	$id;
	$tax_slug;

	if(is_category()){
		$tax_slug = "category";
		$id = get_query_var('cat');	
	}else
    if(is_tag()){
		$tax_slug = "post_tag";
		$id = get_query_var('tag_id');	
	}else
    if(is_tax()){
		$tax_slug = get_query_var('taxonomy');	
		$term_slug = get_query_var('term');	
		$term = get_term_by("slug",$term_slug,$tax_slug);
		$id = $term->term_id;
	}
	return get_term($id,$tax_slug);
}

/* ---------------------- */
/* アーカイブページで子カテゴリーにも親テンプレートを設定する
/* ---------------------- */
add_filter( 'category_template', 'parent_category_template' );
function parent_category_template( $template ) {
    $category = get_queried_object();
    if ( $category->parent != 0 &&
        ( $template == "" || strpos( $template, "category.php" ) !== false ) ) {
        $templates = array();
        while ( $category->parent ) {
            $category = get_category( $category->parent );
            if ( !isset( $category->slug ) ) break;
            $templates[] = "category-{$category->slug}.php";
            $templates[] = "category-{$category->term_id}.php";
        }
        $templates[] = "category.php";
        $template = locate_template( $templates );
    }
    return $template;
}

/* -------------------------------------------- */
/* エディタ関連 */
/* -------------------------------------------- */
function override_mce_options( $init_array ) {
    global $allowedposttags;

    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
    $init_array['indent']                  = true;
    //$init_array['wpautop']                 = false;
    $init_array['force_p_newlines']        = false;

    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' );

//https://www.futaego.com/2017/%E5%9B%BA%E5%AE%9A%E3%83%9A%E3%83%BC%E3%82%B8%E3%81%AE%E3%81%BF%E3%83%93%E3%82%B8%E3%83%A5%E3%82%A2%E3%83%AB%E3%82%A8%E3%83%87%E3%82%A3%E3%82%BF%E3%81%AE%E4%BD%BF%E7%94%A8%E3%82%92%E4%B8%8D%E5%8F%AF//固定ページでビジュアルエディタを利用できないようにする
function disable_visual_editor_in_page() {
	global $typenow;
	if ($typenow == 'page') add_filter('user_can_richedit', 'disable_visual_editor_filter');
}
function disable_visual_editor_filter() {
	return false;
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

/* ---------------------- */
/* TinyMCEがTableタグに「width」と「height」を勝手に設定する機能を無効にする */
/* https://masshiro.blog/tinymce-table-resize/
/* ---------------------- */
function customize_tinymce_settings($mceInit) {
    $mceInit['table_resize_bars'] = false;
    $mceInit['object_resizing'] = "img";
    return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'customize_tinymce_settings' ,0);

/* ---------------------- */
/* 画像のpタグ自動挿入禁止
/* ---------------------- */
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

/* ---------------------- */
/* shortcodeがpタグに囲まれるfix
/* https://www.sitespiral.jp/information/406/
/* ---------------------- */
function shortcode_empty_paragraph_fix($content) {
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
 
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

/* ---------------------- */
/* コメントのPタグ削除
/* ---------------------- */
function coment_empty_paragraph_fix($content) {
    $array = array (
        '<p><!--' => '<!--',
        '--></p>' => '-->',
        '--><br />' => '-->'
    );
 
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'coment_empty_paragraph_fix');

/* ---------------------- */
/* カスタム投稿 絞り込み*/
/* ---------------------- */
add_action('restrict_manage_posts', function($post_type) {
    $taxonomy = [];
    if ( $post_type == 'blog' ) {
        $taxonomy['blog_category'] = 'ブログカテゴリー';
    }
    if ( empty($taxonomy) ) return;
    foreach ($taxonomy as $k => $v) {
        $selected = get_query_var($k);
        wp_dropdown_categories([
            'show_option_all' => "すべての{$v}",
            'selected' => $selected,
            'name' => $k,
            'taxonomy' => $k,
            'value_field' => 'slug'
        ]);
    }
}, 10, 2);

/* ---------------------- */
/* カスタム投稿並び順変更 */
/* ---------------------- */
function set_post_types_admin_order( $wp_query ) {
if (is_admin()) {
    $post_type = $wp_query->query['post_type'];
    if ( $post_type == 'blog' ) { //カスタム投稿名
            $wp_query->set('orderby', 'date');
            $wp_query->set('order', 'DESC');
        }
    }
}
add_filter('pre_get_posts', 'set_post_types_admin_order');

