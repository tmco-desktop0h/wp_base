<?php get_header();
    //カスタム投稿全体アーカイブ
    $post_type = get_query_var('post_type');
?>

<div id="<?php echo $post_type; ?>CatList" class="catListPage">
	<div id="mainCnt">
   
       	<div class="container">
        	<section id="cnts">
             <?php if (have_posts()) : ?>
				<div class="pageTitlebox">
					<p class="pageTitle en">Blog</p>
					<span class="jp">ブログ</span>
				</div>
				<!--パンくず-->
					<?php if(is_plugin_active( 'tmco-breadcrumbs/index.php' )){    
                        get_gi_breadcrumbs();
                    };?>
				<!--パンくず-->
                <div class="post
				
                <div class="postListWrap">
                    <?php while (have_posts()) : the_post();?>

					<div class="postBox">
						<div class="thumbnail">
						<?php if( has_post_thumbnail()) :?>
						
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium_large');?></a>
						<?php else:?>
						
							<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt=""></a>
						<?php endif;?>
							
						</div>
						<time><?php the_time('Y.m.d');?></time>
						<div class="permalinkWrap">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</div>
					</div>

                    <?php endwhile;?>
                </div>
				
				<?php wp_pagenavi();?>					

            <?php endif; wp_reset_query();?>
                
        	</section>
        </div>
    </div>
</div>
<?php get_footer();?>
