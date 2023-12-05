<?php get_header(); 
	$terms = get_the_terms($post->ID,'blog_cat');
	
    foreach ( $terms as $term ) {
        
        $cat_id = $term->term_id; //タームID
        $cat_name = $term->name; //ターム名
        $cat_slug = $term->slug; //タームスラッグ
        $cat_description = $term->category_description; //説明文
        $cat_parent_id = $term->parent; //親ターム・タクソノミー
        $post_cat_id = 'category_'.$cat_id;
    }
?>


	<div id="singlePage" class="postPage">
        
		<div id="mainCnt">
			<div class="container">
                <div id="sideLayout">
                    <section id="cnts">
                    <?php if( have_posts() ): while ( have_posts() ) : the_post();?>

                        <div class="pageTitlebox">
							<p class="pageTitle en">Blog</p>
							<span class="jp"><?php the_title();?></span>
						</div>
						<!--パンくず-->
						<?php if(is_plugin_active( 'tmco-breadcrumbs/index.php' )){    
							get_gi_breadcrumbs();
						};?>
						<!--パンくず-->
                        <time><?php the_time('Y.m.d');?></time>
                        <div id="postCnt">

                            <?php the_content();?>

                        </div>
                        <div class="btnWrap">
                            <a href="<?php echo get_category_link( $cat_id ); ?>" class="btn arrow btnCenter"><?php echo $cat_name;?>一覧へ</a>
                        </div>
                    <?php endwhile; endif;?>

                    </section>
                    <?php get_sidebar();?>
                </div>
			</div>
		</div>
	</div>
<?php get_footer();?>