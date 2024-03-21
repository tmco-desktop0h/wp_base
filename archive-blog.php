<?php get_header();
    //カスタム投稿全体アーカイブ
    $post = get_post_type_object($post_type);
?>

<div class="pageTitlebox">
    <div class="container">
        <p class="en roboto"><?php echo $post_type; ?></p>
        <span class="pageTitle"><?php echo $post->labels->name; ?></span>
    </div>
</div>
<div id="<?php echo $post_type; ?>CatList" class="catListPage postPage">
	<div id="mainCnt">
        <section id="cnts">
        	<div class="container">
                <h2 class="titleh2"><?php echo $post->labels->name; ?></h2>
                <?php if (have_posts()) : ?>
                    <div class="archive-postListWrap blog-postListWrap">
                        <?php while (have_posts()) : the_post();?>
                        <?php get_template_part( 'inc/post/post-blog' ); ?>
                        <?php endwhile;?>
                    </div>
                    <?php wp_pagenavi();?>

                    <!--<div class="btnWrap">
                        <a href="<?php echo esc_html(get_post_type_archive_link( $post_type )); ?>" class="btn btnCenter arrow">一覧へ</a>
                    </div>-->
                
                <?php endif; wp_reset_query();?>
            </div>
        </section>
    </div>
</div>
<?php get_footer();?>
