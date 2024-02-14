<?php
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
/* ----------------
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
add_action( 'pre_get_posts', 'my_pre_get_posts' );------ */

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
function my_category_template( $template ) {
  $category = get_queried_object();
  if ( $category->parent != 0 && ( $template == "" || strpos( $template, "category.php" ) !== false ) ) {
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
add_filter( 'category_template', 'my_category_template' );
/* ---------------------- */
//条件分岐　子カテゴリーまで反映
/* ---------------------- */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}
/* ---------------------- */
/* カスタム投稿 絞り込み*/
/* ---------------------- */
add_action('restrict_manage_posts', function($post_type) {
    $taxonomy = [];
    if ( $post_type == 'blog' ) {
        $taxonomy['blog_cat'] = 'ブログカテゴリー';
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

