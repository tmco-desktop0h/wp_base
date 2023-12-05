<?php get_header();
//カスタム投稿 blog
//タクソノミー blog_cat

    $taxonomy       = get_query_var( 'taxonomy' );
    $post_type      = get_taxonomy( $taxonomy )->object_type[0];

    $term_obj       = get_current_term();
    $term_id        = $term_obj->term_id; // タームスラッグ
    $term_slug      = $term_obj->slug; // タームスラッグ
    $term_name      = $term_obj->name; // タームタイトル
    $term_desc      = $term_obj->description; // タームディスクリプション
    $term_parent_id = $term_obj->parent; // 親

    //ACFでタクソノミー関連を設定してる場合
	$acf_get_tax = $taxonomy.'_'.$term_id;
?>

<div id="<?php echo $post_type; ?>CatList" class="catListPage">
	<div id="mainCnt">
       	<div class="container">
             <h2><?php echo $term_name;?>一覧</h2>
 
                 <section id="cnts">
                
                 <?php if (have_posts()) : ?>

                     <div class="blogBoxWrap">
                        <?php while (have_posts()) : the_post();?>


                        <div class="blogBox">
                            <div class="thumbnail">
                            <?php if( has_post_thumbnail()) :?>

                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium_large');?></a>
                            <?php else:?>

                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt=""></a>
                            <?php endif;?>

                            </div>
                            <div class="blogCnt">
                                <div class="permaLinkWrap">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </div>
                            </div>
                        </div>

                        <?php endwhile;?>
                    </div>
				
                    <?php wp_pagenavi();?>

                    <div class="btnWrap">
                        <a href="<?php echo esc_html(get_post_type_archive_link( $post_type )); ?>" class="btn btnCenter arrow">一覧へ</a>
                    </div>				

            <?php endif; wp_reset_query();?>
                
             
                
        	    </section>
            <?php get_sidebar();?>

        </div>
    </div>
</div>
<?php get_footer();?>
