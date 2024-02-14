<?php


/********************************************
ショートコードで他の固定ページを呼び出し
[page pagepath] [page toppage/pagename]
********************************************/
function pageLoad( $atts ) {

	global $path;
    extract( shortcode_atts( array( 'page' => $atts[0] ), $atts ) );
    
    $page_data = get_page_by_path($page, OBJECT);

  	return do_shortcode($page_data->post_content);

}
add_shortcode('page', 'pageLoad');


/********************************************
ショートコードでインクルードファイルの呼び出し
呼び出し方:[inc filename(.phpは省く)]
********************************************/

function SectionInclude( $atts ) {

	extract( shortcode_atts( array( 'file' => $atts[0] ), $atts ) );
	ob_start();

	include(TEMPLATEPATH . "/inc/$file.php");
	return ob_get_clean();

}
add_shortcode('inc', 'SectionInclude');





