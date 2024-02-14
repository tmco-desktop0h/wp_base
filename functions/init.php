<?php



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

/********************************************
wpautop 無効
********************************************/
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'the_content', 'wpautop' );

/********************************************************************************
* 固定ページはビジュアルエディタ禁止
*********************************************************************************/
function disable_visual_editor_in_page() {
    global $typenow;
    if( $typenow == 'page' ){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    }
}

function disable_visual_editor_filter(){
    return false;
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

/********************************************************************************
/*【管理画面】メディアを追加で挿入されるimgタグから不要な属性を削除 
*********************************************************************************/

add_filter('image_send_to_editor', 'remove_image_attribute', 10);
add_filter('post_thumbnail_html', 'remove_image_attribute', 10);
function remove_image_attribute($html){
  $html = preg_replace('/(width|height)="\d*"\s/', '', $html); // width と heifht を削除
  return $html;
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}
// discordにワードプレスのURLはるとユーザ名非表示
add_filter( 'oembed_response_data' , function($data, $post, $width, $height){
    $data['author_name'] = '';
    $data['author_url'] = '';

    return $data;
},10,4);