<?php

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
function get_page_head_script() {
    global $post; // $post変数を取得
    $head_script = ''; // 変数を初期化

    if ($post && get_field('common_head_script', 'option')) {
        $head_script = get_field('common_head_script', 'option') . "\n";
    }

    if ($post && get_field('page_head_script', $post->ID)) {
        $head_script .= get_field('page_head_script', $post->ID) . "\n";
    }

    return $head_script;
}

/* ---------------------- */
/* <body>後追記取得
/* ---------------------- */
function get_page_body1_script() {
    global $post;
    $body1_script = '';

    if ($post && get_field('common_body1_script', 'option')) {
        $body1_script = get_field('common_body1_script', 'option') . "\n";
    }

    if ($post && get_field('page_body1_script', $post->ID)) {
        $body1_script .= get_field('page_body1_script', $post->ID) . "\n";
    }

    return $body1_script;
}

/* ---------------------- */
/* </body>前追記取得
/* ---------------------- */
function get_page_body2_script() {
    global $post;
    $body2_script = '';

    if ($post && get_field('common_body2_script', 'option')) {
        $body2_script = get_field('common_body2_script', 'option') . "\n";
    }

    if ($post && get_field('page_body2_script', $post->ID)) {
        $body2_script .= get_field('page_body2_script', $post->ID) . "\n";
    }

    return $body2_script;
}

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
function get_page_heading() {
    global $post;

    $common_h1 = get_field('common_h1', 'option'); // 共通H1
    $page_h1 = get_field('page_h1', get_queried_object_id());

    if (is_home() || is_front_page()) { // トップ
        $text_h1 = $common_h1;
    } else if (is_page() || is_single()) { // ページ・シングル
        $text_h1 = $page_h1;

        if (!$page_h1 && is_single()) {
            $text_h1 = get_the_title(); // 詳細記事ページの場合、ページタイトルを H1 とする
        }
    } else if (is_category()) { // カテゴリーアーカイブ
        $cat = get_queried_object();

        if ($cat) {
            $catid = $cat->cat_ID;
            $post_id = 'category_' . $catid;
            $page_h1 = get_field('category_h1', $post_id);

            if ($page_h1) {
                $text_h1 = $page_h1;
            } else {
                $text_h1 = single_cat_title('', false);
            }
        } else {
            $text_h1 = ''; // カテゴリーオブジェクトがない場合、空の文字列をセット
        }
    } else if (is_tax()) { // カスタム投稿タクソノミーアーカイブ
        $taxonomy = get_query_var('taxonomy');
        $term_obj = get_queried_object();
        $term_id = $term_obj->term_id; // タームスラッグ
        $acf_get = $taxonomy . '_' . $term_id;
        $page_h1 = get_field('category_h1', $acf_get);

        if ($page_h1) {
            $text_h1 = $page_h1;
        }
    } else if (is_post_type_archive()) { // カスタム投稿アーカイブ
        $post_type = get_post_type();

        if ($post_type) {
            $text_h1 = get_post_type_object($post_type)->labels->name;
        } else {
            $text_h1 = ''; // カスタム投稿がない場合、空の文字列をセット
        }
    } else if (is_tag()) { // タグ
        // タグの処理を追加する
    } else if (is_404()) { // 404ページ
        $text_h1 = 'ページが見つかりませんでした。';
    }

    if ($text_h1 === null || $text_h1 === '') { // h1が空の場合
        $text_h1 = $common_h1;
    }

    return $text_h1;
}
